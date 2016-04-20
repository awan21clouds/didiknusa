var dt_kredit, dt_locate, gmap;

$(document).ready(function(){
    loadContent();
    if ( $( "#map" ).length ) {
        map();
    }
    getProfil();
    updateMyPhoto();
    getProfilInfo();
});

function loadContent(){
    var url = window.location.href;
    url = url.split('/')[url.split('/').length-1];
    $('#default-content li').each(function (i, v) {
        if($(this).html()==url){
            var page = $(this).attr('alt');
            $("#profil-content").load(getBaseURL()+'member/'+page, function(){
                switch (page){
                    case 'my-profil' :
                        selectLocate('#form-personal select[name=location_id]');
                        getMyProfil();
                        updateMyProfil();
                        updateMyPassword();
                        break;
                    case 'my-donation' :
                        donation();
                        paymentDate();
                        insertConfirmation();
                        selectBank('#form-confirmation select[name=bank_id]');
                        $('.currency').autoNumeric('init');
                        break;
                    case 'my-scholarship' :
                        initReadmore();
                        pagination();
                        scholarshipRupiah();
                        break;
                    case 'my-kredit' : kredit(); break;
                    case 'locate' : addLocate(); locate(); break;
                    case 'bank' : addBank(); bank();  break;
                    case 'admin-donation' :
                        adminDonation();
                        break;
                }
            });
            $('#profil-navigation li').removeClass('active');
            //$('#profil-navigation li:eq('+i+')').addClass('active');
            $('#profil-navigation li').find('a[alt='+page+']').parent().addClass('active');
            return false;
        }
    });

    $('.profil-content-loader').click(function(){
        var page = $(this).attr("alt");
        $("#profil-content").load( getBaseURL()+'member/'+page, function() {
            switch (page){
                case 'my-profil' :
                    selectLocate('#form-personal select[name=location_id]');
                    getMyProfil();
                    updateMyProfil();
                    updateMyPassword();
                    break;
                case 'my-donation' :
                    donation();
                    paymentDate();
                    insertConfirmation();
                    selectBank('#form-confirmation select[name=bank_id]');
                    $('.currency').autoNumeric('init');
                    break;
                case 'my-scholarship' :
                    initReadmore();
                    pagination();
                    scholarshipRupiah();
                    break;
                case 'my-kredit' : kredit(); break;
                case 'locate' : addLocate(); locate();  break;
                case 'bank' : addBank(); bank();  break;
                case 'admin-donation' :
                    adminDonation();
                    break;
            }
        });

        $(this).parent().parent().find('li').removeClass('active');
        $(this).parent().addClass('active');
        $(this).css('background-color', 'transparent');
        $(this).css('color', '#000000');

    });
}

function getProfil(){
    var member_id = $('#member_id').html();
    var CSRF_TOKEN = $("meta[name='token']").attr('content');
    $.ajax({
        url: getBaseURL()+'member/'+member_id,
        type: 'GET',
        data: {_token: CSRF_TOKEN},
        dataType: 'json',
        success: function(output){
            var data = output.data;
            $('#profil').find('dd[alt=member_id]').html(data.member_id);
            $('#profil').find('dd[alt=name]').html(data.name);
            $('#profil').find('dd[alt=phone]').html(data.phone);
            $('#profil').find('dd[alt=email]').html(data.email);
            $('#profil').find('dd[alt=biography]').html(data.biography);
            $('#profil').find('dd[alt=register_date]').html(data.register_date);
            profilFileInput(data.photo);
        }
    });
}

function pagination(){
    var items = $("#content .col-md-4");
    var numItems = items.length;
    var perPage = 3;
    items.slice(perPage).hide();

    $('#pagination').pagination({
        items: numItems,
        itemsOnPage: perPage,
        cssStyle: "pagination",
        onPageClick: function(pageNumber) { // this is where the magic happens
            // someone changed page, lets hide/show trs appropriately
            var showFrom = perPage * (pageNumber - 1);
            var showTo = showFrom + perPage;

            items.hide() // first hide everything, then show for the new page
                .slice(showFrom, showTo).fadeIn('slow');
        }
    });
}

function kredit(){
    var member_id = $('#member_id').html();
    dt_kredit = $('#dt-kredit').DataTable({
        ajax : getBaseURL()+'credit/'+member_id,
        columnDefs:[
            {"title":"Transaksi","targets":0},
            {"title":"Total Donasi","targets":1},
            {"title":"Tanggal Transaksi","targets":2}
        ],
        columns : [{
            "data" : "transaction_detail"
        },{
            "data" : "total",
            "render" : function (data, type, row) {
                return toRp(data);
            }
        },{
            "data" : "transaction_created"
        }],
        aLengthMenu : [[5, 10, -1], [5, 10, "All"]],
        pageLength : 5
    });
}

function locate(){
    dt_locate= $('#dt-locate').DataTable({
        ajax : getBaseURL()+'locate',
        columnDefs:[{"title":"Lokasi","targets":0, "width":"500px"},{"title":"","targets":1}],
        columns : [{
                "data" : "detail"
            }, {
                "data" : "location_id",
                "render" : function (data, type, row) {
                    var html = '<center><div class="btn-group">';
                    html += '<button type="button" class="detail btn btn-warning" value="' + data + '" onclick="updateLocate(this);"><i class="fa fa-pencil-square-o"></i> Edit</button>';
                    html += '<button type="button" class="detail btn btn-danger" value="' + data + '" onclick="deleteLocate(this);"><i class="fa fa-trash-o"></i> Delete</button>';
                    html += '</div></center>';
                    return html;
                }
            }
        ],
        aLengthMenu : [[5, 10, -1], [5, 10, "All"]],
        pageLength : 5
    });
}

function map(){
    gmap = new GMaps({
        el: '#map',
        lat: -6.914744,
        lng: 107.609810,
        zoomControl : true,
        zoomControlOpt: {
            style : 'SMALL',
            position: 'TOP_LEFT'
        },
        panControl : false,
        streetViewControl : false,
        mapTypeControl: false,
        overviewMapControl: false
    });
    addMarkers();
}

function addLocate(){
    $('#form-locate').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            detail: {
                message: 'Invalid value',
                validators: {
                    notEmpty: {
                        message: 'Required'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        $('#form-locate').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            geocode(formData);
            return false;
        });
    });
}

function addMarkers(){
    ajaxPro('GET', getBaseURL()+'locate', null, 'json', false, false, false, false, success, success, null);
    function success(output) {
        $(output.data).each(function(i, v){
            gmap.addMarker({
                lat: v.lat,
                lng: v.lng
            });
        });
    }
}

function updateLocate(i){
    var location_id = $(i).val();
    var CSRF_TOKEN = $("meta[name='token']").attr('content');
    $.ajax({
        url: getBaseURL()+'locate/'+location_id+'/edit',
        type: 'GET',
        data: {_token: CSRF_TOKEN},
        dataType: 'json',
        success: function(output){
            $("#form-locate").bootstrapValidator('resetForm', true);
            $('#form-locate .form-group').each(function(i, v){
                var element_tag = $(this).children().eq('1').prop("tagName").toString().toLowerCase();
                var element_name = $(this).children().eq('1').prop("name").toString().toLowerCase();
                var key = Object.keys(output.data);
                $(key).each(function(j, w){
                   if(key[j]===element_name){
                        var value = output.data[key[j]];
                        $('#form-locate .form-group '+element_tag+'[name='+key[j]+']').val(value);
                        return false;
                    }
                });
            });
            $('#tab-new-trigger').click();
        }
    });
}

function deleteLocate(i){
    var location_id = $(i).val();
    var CSRF_TOKEN = $("meta[name='token']").attr('content');
    $.ajax({
        url: getBaseURL()+'locate/'+location_id,
        type: 'DELETE',
        data: {_token: CSRF_TOKEN},
        dataType: 'HTML',
        success: success,
        error:error
    });
    function success(output) {
        gmap.removeMarkers();
        addMarkers();
        dt_locate.ajax.reload();
        notify('info', 'Lokasi Berhasil Dihapus!', 'Silahkan Lihat di menu data', 'glyphicon glyphicon-warning-sign');
    }
    function error(jqXHR, textStatus, errorThrown) {
        alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');

        $('#result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
        console.log('jqXHR:');
        console.log(jqXHR);
        console.log('textStatus:');
        console.log(textStatus);
        console.log('errorThrown:');
        console.log(errorThrown);
    }
}

function geocode(formData){
    var id_length = $('#form-locate input[name=location_id]').val().split('').length;
    var detail = $('#form-locate input[name=detail]').val();
    GMaps.geocode({
        address: detail,
        callback: function(results, status){
            if(status=='OK'){
                var latlng = results[0].geometry.location;
                formData.append('lat', latlng.lat());
                formData.append('lng', latlng.lng());
                gmap.setCenter(latlng.lat(), latlng.lng());
                gmap.addMarker({
                    lat: latlng.lat(),
                    lng: latlng.lng()
                });
                if(id_length>0){
                    edit(formData);
                }else{
                    insert(formData);
                }

            }
        }
    });
    $("#form-locate")[0].reset();
}


function insert(formData){
    var d = new Date();
    var location_id = '111'+d.getFullYear() + concatString((d.getMonth() + 1)) + concatString(d.getDate()) + concatString(d.getHours()) + concatString(d.getMinutes()) + concatString(d.getSeconds()) + (Math.floor(Math.random() * (99 - 10) + 10));
    formData.append('location_id', location_id);
    ajaxPro('POST', getBaseURL()+'locate', formData, 'html', false, false, false, false, success, error, null);
    function success(output) {
        dt_locate.ajax.reload();
        notify('info', 'Lokasi Berhasil Ditambahkan!', 'Silahkan Lihat di menu data', 'glyphicon glyphicon-warning-sign');
        $("#form-locate")[0].reset();
        $("#form-locate").bootstrapValidator('resetForm', true);
    }
    function error(jqXHR, textStatus, errorThrown) {
        alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
        $('#result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
        console.log('jqXHR:');
        console.log(jqXHR);
        console.log('textStatus:');
        console.log(textStatus);
        console.log('errorThrown:');
        console.log(errorThrown);
    }
}

function edit(formData){
    $.ajax({
        url: getBaseURL()+'locate/'+formData.get("location_id"),
        type: 'PUT',
        data: {
            _token: formData.get("_token"),
            location_id:formData.get("location_id"),
            detail:formData.get("detail"),
            lat:formData.get("lat"),
            lng:formData.get("lng")
        },
        dataType: 'HTML',
        success: success,
        error: error
    });

    function success(output) {
        dt_locate.ajax.reload();
        notify('info', 'Lokasi Berhasil Diubah!', 'Silahkan Lihat di menu data', 'glyphicon glyphicon-warning-sign');
        $("#form-locate")[0].reset();
        $("#form-locate").bootstrapValidator('resetForm', true);
        $('#tab-data-trigger').click();
    }
    function error(jqXHR, textStatus, errorThrown) {
        alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
        $('#result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
        console.log('jqXHR:');
        console.log(jqXHR);
        console.log('textStatus:');
        console.log(textStatus);
        console.log('errorThrown:');
        console.log(errorThrown);
    }
}



function profilFileInput(url){
    var btnCust = '<button type="submit" class="btn btn-default" title="Add picture tags">' +
        '<i class="fa fa-upload"></i>' +
        '</button>';
    $('#avatar').fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        browseLabel: '',
        removeLabel: '',
        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors',
        msgErrorClass: 'alert alert-block alert-danger',
        defaultPreviewContent: '<img src="'+getBaseURL()+'/'+url+'" alt="Your Avatar" id="img-preview" class="img-thumbnail img-circle">',
        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
}

function getProfilInfo(){
    ajaxPro('GET', getBaseURL()+'member', null, 'json', false, false, false, false, success, error, null);
    function success(output) {
        var key = Object.keys(output.data);
        $(key).each(function(j, w){
            var value = output.data[key[j]];
            key[j]=="credit_count" ? $('#'+key[j]).html(toRp(value)) : $('#'+key[j]).html(value);
        });
    }
    function error(jqXHR, textStatus, errorThrown) {
        alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
        $('#result').html('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
        console.log('jqXHR:');
        console.log(jqXHR);
        console.log('textStatus:');
        console.log(textStatus);
        console.log('errorThrown:');
        console.log(errorThrown);
    }
}