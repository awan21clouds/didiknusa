/**
/**
 * Created by RizqyFahmi on 07/04/2016.
 */



$(document).ready(function(){

    var base_url = window.location.origin;
    $(".animsition").animsition({
        inClass: 'fade-in-down-sm',
        outClass: 'fade-out-down-sm',
        inDuration: 500,
        outDuration: 500,
        linkElement: '.animsition-link',
        // e.g. linkElement: 'a:not([target="_blank"]):not([href^=#])'
        loading: true,
        loadingParentElement: 'body', //animsition wrapper element
        loadingClass: 'animsition-loading',
        //loadingInner: '<img src="'+getBaseURL()+'/public/adminLTE/dist/img/ripple.svg" />', // e.g '<img src="loading.svg" />'
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        // "browser" option allows you to disable the "animsition" in case the css property in the array is not supported by your browser.
        // The default setting is to disable the "animsition" in a browser that does not support "animation-duration".
        //overlay : false,
        //overlayClass : 'animsition-overlay-slide',
        //overlayParentElement : 'body',
        transition: function(url){ window.location.href = url; }
    });

    $('#testimonials').slick({
        arrows:false,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000
    });

    $('#navbar-search-input').typeahead({
        //ajax: {
        //    url:getBaseURL()+'scholarship/allScholarshipJson',
        //    method: 'get'
        //},
        displayField: 'student_name',
        //valueField:'scholarship_id',
        loadingClass: "loading-circle",
        source: function ( query, process ) {
            ajaxPro('GET', getBaseURL()+'scholarship/allScholarshipJson', null, 'json', false, false, false, false, success, null, null);
            function success(output) {
                var items = [];
                $(output).each(function(i, v){
                    items.push(v.scholarship_id+'+'+v.student_name+'+'+v.picture+'+'+v.scholarship_target+'+'+v.donation_total+'+'+v.scholarship_deadline);
                });
                process(items);
            }
        },
        matcher: function (item) {
            item = item.split('+')[1];
            if (item.toLowerCase().indexOf(this.query.trim().toLowerCase()) != -1) {
                return true;
            }
        },
        highlighter: function(item) {
            item = item.split('+');
            var src = 'http://placehold.it/500x500/f3f3f3/ffffff&amp;text=Tidak+ada+gambar'
            if(item[2]!=null && item[2]!="null") src = getBaseURL()+item[2];

            var itm = ''
                + '<div class="typeahead_wrapper">'
                + '<img class="typeahead_photo" src="'+src+'" />'
                + '<div class="typeahead_labels">'
                + "<div class='typeahead_primary'>" + item[1] + "</div>"
                + "<div class='typeahead_secondary'> Terkumpul :" + toRp(item[4]) + "</div>"
                + "<div class='typeahead_secondary'> Target :" + toRp(item[3]) + "</div>"
                + "<div class='typeahead_secondary'> Batas Waktu :" + item[5] + "</div>"
                + "</div>"
                + "</div>";
            return itm;

        },
        afterSelect:function(item){
            item = item.split('+');
            window.location = getBaseURL()+'scholarship-detail/'+item[0];
            $('#navbar-search-input').val('');
        }
    });

    $('.currency').autoNumeric('init');

    setActiveMenu();
    initCloneya();
    selectLocate('#form-scholarship select[name=location_id]', 'locate/getAllRowsForScholarship');
    getHeaderProfil();
    initDeadline();
    insertScholarship();
    insertDonation();
    loadHomeScholarship();
    loadAllScholarhip();
    bank_show();
});

new WOW().init();

function noHover(i){
    $('#scholarship-modal').modal('show');
    $(i).focus(function(){
        $(this).css('background-color', 'transparent');
    });
}

function disableButton(){
    //var progress = .html();
    $('.progress-bar-green').each(function(i, v){
        var progress = parseFloat($(this).html().replace(/\%/g,'').trim());
        var currentDate = new Date();
        var deadline = new Date($(this).attr('alt'));

        if((progress >= 100) || (currentDate>deadline)){
            $(this).parent().parent().find('.btn-success').attr('disabled', true);
            $("#DateCountdown").TimeCircles().stop();
        }
    });
}

function initPaginator(){
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

function initCloneya(){
    //$('#simple-clone').cloneya({
    //    cloneThis: '.toclone',
    //    cloneButton: '.clone',
    //    deleteButton: '.delete'
    //});
}

function scholarshipDonation(i){
    $('#form-donation').find('input[name=scholarship_id]').val($(i).attr('alt'));
    $('#donation-modal').modal('show');
}

function initReadmore(){
    $('.readmore').readmore({
        speed: 75,
        collapsedHeight: 20,
        heightMargin: 16,
        moreLink: '<a href="#">Selengkapnya</a>',
        lessLink: '<a href="#">Sederhanakan</a>'
    });
}

function selectLocate(element, url){
    ajaxPro('GET', getBaseURL()+url, null, 'json', false, false, false, false, success, null, null);
    function success(output) {
        var html = '';
        $(output.data).each(function(i, v){
            html += '<option value="'+v.location_id+'">'+v.detail+'</option>';
        });
        $(element).html(html);
    }
}

function selectBank(element){
    ajaxPro('GET', getBaseURL()+'bank', null, 'json', false, false, false, false, success, null, null);
    function success(output) {
        var html = '';
        $(output.data).each(function(i, v){
            html += '<option value="'+v.bank_id+'">'+v.detail+'</option>';
        });
        $(element).html(html);
    }
}

function bank_show(){
    ajaxPro('GET', getBaseURL()+'bank', null, 'json', false, false, false, false, success, error, null);
    function success(output) {
        $('#dt-bank').DataTable({
            //ajax : getBaseURL()+'bank',
            data:output.data,
            columnDefs:[{"title":"Bank","targets":0}, {"title":"No. Rekening","targets":1}],
            columns : [{
                "data" : "detail"
            },{
                "data" : "account"
            }],
            aLengthMenu : [[5, 10, -1], [5, 10, "All"]],
            pageLength : 5
        });
    }
    function error(jqXHR, textStatus, errorThrown) {
        bank_show();
    }



    //$('#donation-modal').on('hidden.bs.modal', function () {
    //    alert(1);
    //});
}


function initDeadline(){
    $('input[name="deadline"]').daterangepicker({
        singleDatePicker: true,
        showWeekNumbers: true,
        drops: "up",
        "locale": {
            "format": "DD-MM-YYYY"
        }
        //showDropdowns: true
    });
}

function getHeaderProfil(){
    var member_id = $('#member_id').html();
    var CSRF_TOKEN = $("meta[name='token']").attr('content');
    $.ajax({
        url: getBaseURL()+'member/'+member_id,
        type: 'GET',
        data: {_token: CSRF_TOKEN},
        dataType: 'json',
        success: function(output){
            var data = output.data;
            $('.user-menu').find('img[alt=User-Image]').attr("src", getBaseURL()+data.photo);
            $('.user-menu').find('span[alt=User-Name]').html(data.name);
        }
    });
}

function setActiveMenu(){
    var path = window.location.href;
    var partsOfStr = path.split('/');
    var last = partsOfStr[partsOfStr.length-1];
    $('#navbar-collapse ul li').removeClass('active');
    $('#navbar-collapse ul li[alt='+last+']').addClass('active');
}

function scholarshipBeforLogin(i){
    notify('info', 'Peringatan!', 'Silahkan login terlebih dahulu', 'glyphicon glyphicon-warning-sign');
    $(i).css("background-color", 'transparent');
    $('#login').animatescroll({scrollSpeed:2000,easing:'easeInOutBack'});
}

function loadHomeScholarship(){
    $("#home-scholarship").load(getBaseURL()+'scholarship/homeScholarship', function(){
        initReadmore();
        scholarshipRupiah();
        disableButton();
    });
}

function loadAllScholarhip(){
    $("#scholarship-page #content").load(getBaseURL()+'scholarship/allScholarship', function(){
        initReadmore();
        initPaginator();
        scholarshipRupiah();
        disableButton();
    });
}

function scholarshipRupiah(){
    $('.scholarship-currency').html(function(){
        $(this).html(toRp($(this).html().toString().trim()));
    });
}


function initFIPicture(){
    $('#form-scholarship input[name=picture]').fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showUpload: false,
        browseClass: 'btn btn-default',
        //        showCaption: false,
        //        browseStaff: '',
        //        removeStaff: '',
        //        browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
        //        removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
        //        removeTitle: 'Cancel or reset changes',
        //        elErrorContainer: '#kv-avatar-errors',
        //        msgErrorClass: 'alert alert-block alert-danger',
        //        defaultPreviewContent: '<img src="assets/dist/img/default-50x50.gif" alt="Your Avatar" style="width:160px">',
        //        layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
}

function addScholarshipVariable(){
    $('.clone').click(function(){
        var html = '<a href="javascript:;" class="delete btn btn-danger" onclick="removeScholarshipVariable(this);">Hapus</a>';
        var el = $(this).parent().clone().insertAfter("div.toclone:last");
        var label = el.find('input[name="label[]"]').val('');
        var total = el.find('input[name="total[]"]').val('');
        el.find('.clone').remove();
        el.append(html);
        $('#form-scholarship').bootstrapValidator('addField', label);
        $('#form-scholarship').bootstrapValidator('addField', total);
        $("#form-scholarship").bootstrapValidator('resetField', label);
        $("#form-scholarship").bootstrapValidator('resetField', total);
        $('.currency').autoNumeric('init');
    });
}

function removeScholarshipVariable(i){
    var label = $(i).parent().find('input[name="label[]"]');
    var total = $(i).parent().find('input[name="total[]"]');
    $('#form-scholarship').bootstrapValidator('removeField', label);
    $('#form-scholarship').bootstrapValidator('removeField', total);
    $(i).parent().remove();
}

function insertScholarship(){
    initFIPicture();
    addScholarshipVariable();

    $('#form-scholarship').bootstrapValidator({
        //container: 'tooltip',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            'student_name': {
                message: 'Invalid value',
                validators: {
                    notEmpty: {
                        message: 'Required'
                    }
                }
            },
            'video' : {
                message: 'Invalid value',
                validators: {
                    uri: {
                        message: 'Invalid uri'
                    }
                }
            },
            'short_description' : {
                message: 'Invalid value',
                validators: {
                    notEmpty: {
                        message: 'Required'
                    },
                    stringLength: {
                        min: 30,
                        max: 10000,
                        message: 'The username must be more than 30 and less than 10000 characters long'
                    }
                }
            },
            'long_description' : {
                message: 'Invalid value',
                validators: {
                    notEmpty: {
                        message: 'Required'
                    }
                }
            },
            'label[]' :{
                message: 'Invalid value',
                validators: {
                    regexp: {
                        regexp: /^[a-zA-Z-, ]+$/,
                        message: 'The value can contain only letters'
                    },
                    notEmpty: {
                        message: 'Required'
                    }
                }
            },
            'total[]' :{
                message: 'Invalid value',
                validators: {
                    //digits: {
                    //    message: 'The value can contain only digits'
                    //},
                    notEmpty: {
                        message: 'Required'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        $('#form-scholarship').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            var d = new Date();
            var scholarship_id = '113'+d.getFullYear() + concatString((d.getMonth() + 1)) + concatString(d.getDate()) + concatString(d.getHours()) + concatString(d.getMinutes()) + concatString(d.getSeconds()) + (Math.floor(Math.random() * (99 - 10) + 10));
            formData.append('scholarship_id', scholarship_id);
            formData.append('member_id', $('#member_id').html());
            formData.append('created', d.getFullYear() +'-'+ concatString((d.getMonth() + 1)) +'-'+ concatString(d.getDate()) +' '+ concatString(d.getHours()) +':'+ concatString(d.getMinutes()) +':'+ concatString(d.getSeconds()));
            ajaxPro('POST', getBaseURL()+'scholarship', formData, 'html', false, false, false, false, success, error, null);
            function success(output) {
                $('#form-scholarship input[name="label[]"]').each(function(i, v){
                    //console.log($(v).val());
                    var scholarship_variable_id = '114'+d.getFullYear() + concatString((d.getMonth() + 1)) + concatString(d.getDate()) + concatString(d.getHours()) + concatString(d.getMinutes()) + concatString(d.getSeconds()) + (Math.floor(Math.random() * (99 - 10) + 10));
                    var label = $('#form-scholarship input[name="label[]"]').eq(i).val()
                    var total = parseInt($('#form-scholarship input[name="total[]"]').eq(i).val().replace(/\./g,''));
                    formData.append('scholarship_variable_id', scholarship_variable_id);
                    formData.append('label', label);
                    formData.append('total', total);
                    if(label!=null && total > 0){
                        ajaxPro('POST', getBaseURL()+'ScholarshipVariable', formData, 'html', false, false, false, false, successVariable, error, null);
                        function successVariable(output){
                            console.log(output);
                        }
                    }
                });

                $('#scholarship-modal').modal('hide');
                notify('info', 'Beasiswa Berhasil Ditambahkan!', 'Silahkan Lihat di menu profil', 'glyphicon glyphicon-warning-sign');
                $("#form-scholarship")[0].reset();
                $("#form-scholarship").bootstrapValidator('resetForm', true);
                loadHomeScholarship();
                loadAllScholarhip();
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
            return false;
        });
    });
}

function insertDonation(){
    $('#form-donation').bootstrapValidator({
        //container: 'tooltip',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            'total': {
                message: 'Invalid value',
                validators: {
                    notEmpty: {
                        message: 'Required'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        $('#form-donation').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            var d = new Date();
            var transaction_id = '115'+d.getFullYear() + concatString((d.getMonth() + 1)) + concatString(d.getDate()) + concatString(d.getHours()) + concatString(d.getMinutes()) + concatString(d.getSeconds()) + (Math.floor(Math.random() * (99 - 10) + 10));
            formData.append('transaction_id', transaction_id);
            formData.append('member_id', $('#member_id').html());
            formData.append('transaction_detail_id', '0');
            formData.append('transaction_status_id', '0');
            formData.append('created', getCurrentDateTime());
            formData.set('total', formData.get('total').replace(/\./g,''));
            //formData.set('deadline', toMySQLDate($(this).find('input[name=deadline]').val()));
            //formData.set('deadline', toMySQLDate(formData.get('deadline')));
            console.log(formData.get('deadline'));
            console.log(toMySQLDate(formData.get('deadline')));

            console.log($(this).find('input[name=deadline]').val());
            console.log(toMySQLDate($(this).find('input[name=deadline]').val()));
            ajaxPro('POST', getBaseURL()+'transaction', formData, 'html', false, false, false, false, success, error, null);
            function success(output) {
                var donation_id = '116'+d.getFullYear() + concatString((d.getMonth() + 1)) + concatString(d.getDate()) + concatString(d.getHours()) + concatString(d.getMinutes()) + concatString(d.getSeconds()) + (Math.floor(Math.random() * (99 - 10) + 10));
                var random = (Math.floor(Math.random() * (999 - 100) + 100));
                formData.append('donation_id', donation_id);
                formData.append('random', random);
                ajaxPro('POST', getBaseURL()+'donation', formData, 'html', false, false, false, false, null, error, null);
                $('#donation-modal').modal('hide');
                notify('info', 'Donasi Berhasil Ditambahkan!', 'Silahkan lihat detail donasi dan konfirmasi pembayaran di menu donasi', 'glyphicon glyphicon-warning-sign');
                $("#form-donation")[0].reset();
                $("#form-donation").bootstrapValidator('resetForm', true);
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
            return false;
        });
    });
}
function notify(type, title, message, icon) {
    $.notify({
        // options
        icon : icon,
        title: title,
        message : message
        //        url: 'https://github.com/mouse0270/bootstrap-notify',
        //        target: '_blank'
    }, {
        // settings
        element : 'body',
        position : null,
        //type : type,
        allow_dismiss : true,
        newest_on_top : false,
        showProgressbar : false,
        placement : {
            from : "top",
            align : "right"
        },
        offset : 20,
        spacing : 10,
        z_index : 1031,
        delay : 3000,
        timer : 1000,
        //        url_target: '_blank',
        //        mouse_over: null,
        animate : {
            enter : 'animated bounceIn',
            exit : 'animated bounceOut'
        },
        onShow: null,
        onShown: null,
        onClose: null,
        onClosed: null,
        icon_type: 'class',
        template: '<div class="notif '+type+'"><h2><span data-notify="icon"></span> {1}</h2><p>{2}</p></div>'
    });
}

function getCurrentDateTime() {
    var d = new Date();
    return d.getFullYear() + '-' + concatString((d.getMonth() + 1)) + '-' + concatString(d.getDate()) + ' ' + concatString(d.getHours()) + ':' + concatString(d.getMinutes()) + ':' + concatString(d.getSeconds());
}
//
//function generateRandom(){
//    var temp = '';
//    for(var i=0;i<3;i++){
//        temp += Math.floor(Math.random() * (9 - 0) + 0);
//    }
//    return temp;
//}
function toRp(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return 'Rp. ' + rev2.split('').reverse().join('');
}

function toRp2(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return rev2.split('').reverse().join('');
}