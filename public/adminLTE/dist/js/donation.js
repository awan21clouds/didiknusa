/**
 * Created by RizqyFahmi on 18/04/2016.
 */
var dt_donation, dt_admin_donation;

function donation(){
    var member_id = $('#member_id').html();
    dt_donation = $('#dt-donation').DataTable({
        ajax:getBaseURL()+'donation/'+member_id,
        columnDefs:[
            {"title":"Nama Siswa","targets":0},
            {"title":"Total Donasi","targets":1},
            {"title":"Status","targets":2},
            {"title":"","targets":3, "width":3}
        ],
        columns : [{
            "data" : "student_name",
            "render" : function (data, type, row) {
                return '<a href="'+getBaseURL()+'scholarship-detail/'+row['scholarship_id']+'">'+data+'</a>';
            }
        },{
            "data" : "total",
            "render" : function (data, type, row) {
                return toRp(data);
            }
        },{
            "data" : "transaction_status"
        },{
            "data" : "transaction_id",
            "render" : function (data, type, row) {
                var disabled = '';
                if(row['transaction_status_id']>0){
                    disabled = 'disabled';
                }

                var html = '';
                html += '<div class="btn-group text-center">';
                html += '<button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-wrench"></i></button>';
                html += '<ul class="dropdown-menu" role="menu">';
                html += '<li><a href="javascript:;" class="details-control"><i class="fa fa-search"></i> detail</a></li>';
                html += '<li><a href="javascript:;" alt="' + data+'+'+(row['total']+row['random'])+ '" onclick="confirmation(this);" '+disabled+'><i class="fa fa-pencil-square-o"></i> Konfirmasi</a></li>';
                html += '<li class="divider"></li>';
                html += '<li><a href="#" alt="' + data + '" onclick="deleteTransaction(this);" '+disabled+'><i class="fa fa-trash-o"></i> Batal</a></li>';
                html += '</ul>';
                html += '</div>';
                //html += '<center><div class="btn-group">';
                //html += '<button type="button" class="details-control btn btn-primary"></button>';
                //html += '<button type="button" class="btn btn-warning" ></button>';
                //html += '<button type="button" class="btn btn-danger" value="' + data + '" onclick="deleteTransaction(this);" '+disabled+'></button>';
                //html += '</div></center>';
                return html;
            }
        }],
        aLengthMenu : [[5, 10, -1], [5, 10, "All"]],
        pageLength : 5
    });

    var detailRows = [];
    //$('#dt-donation tbody').on( 'click', 'tr td.details-control, .details-control', function () {
    $('#dt-donation tbody').on( 'click', '.btn-group .details-control', function () {
        var tr = $(this).closest('tr');
        var row = dt_donation.row( tr );
        var idx = $.inArray( tr.attr('id'), detailRows );

        if ( row.child.isShown() ) {
            tr.removeClass( 'details' );
            row.child.hide();

            // Remove from the 'open' array
            detailRows.splice( idx, 1 );
        }
        else {
            tr.addClass( 'details' );
            row.child( format( row.data() ) ).show();

            // Add to the 'open' array
            if ( idx === -1 ) {
                detailRows.push( tr.attr('id') );
            }
        }
    } );

    // On each draw, loop over the `detailRows` array and show any child rows
    dt_donation.on( 'draw', function () {
        $.each( detailRows, function ( i, id ) {
            $('#'+id+' td.details-control').trigger( 'click' );
        } );
    } );

    function format ( d ) {
        return 'Full name: <br>Salary:  child row can contain any data you wish, including links, images, inner tables etc.';
    }
}


function confirmation(i){
    var v = $(i).attr('alt').split('+');
    //var v = $(i).val().split('+');
    $('#form-confirmation').find('input[name=transaction_id]').val(v[0]);
    $('#form-confirmation').find('#bill').val(toRp2(v[1]));
    $('#tab-new-trigger').click();
}

function deleteTransaction(i){
    var transaction_id = $(i).val();
    var CSRF_TOKEN = $("meta[name='token']").attr('content');
    $.ajax({
        url: getBaseURL()+'transaction/'+transaction_id,
        type: 'DELETE',
        data: {_token: CSRF_TOKEN},
        dataType: 'HTML',
        success: success,
        error:error
    });
    function success(output) {

        dt_donation.ajax.reload();
        notify('info', 'Transaksi Berhasil Dihapus!', 'Silahkan Lihat di menu data', 'glyphicon glyphicon-warning-sign');
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

function insertConfirmation(){
    $('#form-confirmation').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: '',
            invalid: '',
            validating: ''
        },
        fields: {
            account: {
                message: 'Invalid value',
                validators: {
                    notEmpty: {
                        message: 'Required'
                    }
                }
            },
            name: {
                message: 'Invalid value',
                validators: {
                    notEmpty: {
                        message: 'Required'
                    }
                }
            },
            bank: {
                message: 'Invalid value',
                validators: {
                    notEmpty: {
                        message: 'Required'
                    }
                }
            },
            payment_date: {
                message: 'Invalid value',
                validators: {
                    notEmpty: {
                        message: 'Required'
                    }
                }
            },
            total: {
                message: 'Invalid value',
                validators: {
                    notEmpty: {
                        message: 'Required'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        $('#form-confirmation').submit(function (event) {
            event.preventDefault();
            var d = new Date();
            var formData = new FormData($(this)[0]);
            var confirmation_id = '117'+d.getFullYear() + concatString((d.getMonth() + 1)) + concatString(d.getDate()) + concatString(d.getHours()) + concatString(d.getMinutes()) + concatString(d.getSeconds()) + (Math.floor(Math.random() * (99 - 10) + 10));
            formData.append('confirmation_id', confirmation_id);
            formData.append('created', getCurrentDateTime());
            formData.set('total', formData.get('total').replace(/\./g,''));
            formData.set('payment_date', toMySQLDate(formData.get('payment_date')));
            ajaxPro('POST', getBaseURL()+'confirmation', formData, 'html', false, false, false, false, success, error, null);
            function success(output) {
                confirmedTransaction(formData);
                $("#form-confirmation")[0].reset();
                $("#form-confirmation").bootstrapValidator('resetForm', true);
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
            return false;
        });
    });
}

function confirmedTransaction(formData){
    $.ajax({
        url: getBaseURL()+'transaction/confirm/'+formData.get('transaction_id'),
        type: 'PUT',
        data: {
            _token: formData.get("_token"),
            transaction_id:formData.get('transaction_id'),
            transaction_status_id: 1
        },
        dataType: 'HTML',
        success: success,
        error: error
    });

    function success(output) {
        dt_donation.ajax.reload();
        notify('info', 'Konfirmasi Berhasil!', 'Silahkan tunggu proses verifikasi dari admin', 'glyphicon glyphicon-warning-sign');
    }
    function error(jqXHR, textStatus, errorThrown) {
        confirmedTransaction(formData);
    }

}

function paymentDate(){
    $('input[name="payment_date"]').daterangepicker({
        singleDatePicker: true,
        showWeekNumbers: true,
        drops: "up",
        "locale": {
            "format": "DD-MM-YYYY"
        }
        //showDropdowns: true
    });
}


function initRupiah(){
    $(".rupiah").keypress(function() {
        $(this).val(toRp($(this).val())+'');
    });
}

function adminDonation(){
    dt_admin_donation = $('#dt-admin-donation').DataTable({
        ajax : getBaseURL()+'donation',
        columnDefs:[
            {"title":"Nama Siswa","targets":0},
            {"title":"Total Donasi","targets":1},
            {"title":"Status","targets":2},
            {"title":"","targets":3}
        ],
        columns : [{
            "data" : "student_name",
            "render" : function (data, type, row) {
                return '<a href="'+getBaseURL()+'scholarship/detail/'+row['scholarship_id']+'">'+data+'</a>';
            }
        },{
            "data" : "total",
            "render" : function (data, type, row) {
                return toRp(data);
            }
        },{
            "data" : "transaction_status"
        },{
            "data" : "transaction_id",
            "render" : function (data, type, row) {
                var disabled = '';
                if(row['transaction_status_id']==2){
                    disabled = 'disabled';
                }

                var html = '';
                html += '<center><div class="btn-group">';
                html += '<button type="button" class="detail btn btn-success" value="' + row['transaction_id']+'+'+row['random']+'+'+row['transaction_member_id'] + '" onclick="verifyTransaction(this);" '+disabled+'><i class="fa fa-check-square-o" aria-hidden="true"></i> Verifikasi</button>';
                html += '</div></center>';
                return html;
            }
        }],
        aLengthMenu : [[5, 10, -1], [5, 10, "All"]],
        pageLength : 5
    });
}

function verifyTransaction(i){
    var temp = $(i).val().split('+');
    var transaction_id = temp[0];
    var random = temp[1];
    var member_id = temp[2];
    var CSRF_TOKEN = $("meta[name='token']").attr('content');
    console.log(member_id);
    $.ajax({
        url: getBaseURL()+'transaction/confirm/'+transaction_id,
        type: 'PUT',
        data: {
            _token: CSRF_TOKEN,
            transaction_id:transaction_id,
            transaction_status_id: 2
        },
        dataType: 'HTML',
        success: success,
        error: error
    });

    function success(output) {
        insertTransactionByConfirm(CSRF_TOKEN, random, member_id);
        dt_admin_donation.ajax.reload();
        notify('info', 'Verifikasi Berhasil!', 'Silahkan tunggu proses verifikasi dari admin', 'glyphicon glyphicon-warning-sign');
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

function insertCreditByConfirm(formData){
    var d = new Date();
    var credit_id = '118'+d.getFullYear() + concatString((d.getMonth() + 1)) + concatString(d.getDate()) + concatString(d.getHours()) + concatString(d.getMinutes()) + concatString(d.getSeconds()) + (Math.floor(Math.random() * (99 - 10) + 10));
    formData.append('credit_id', credit_id);
    ajaxPro('POST', getBaseURL()+'credit', formData, 'html', false, false, false, false, success, error, null);

    function success(output){
        console.log('success');
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

function insertTransactionByConfirm(token, random, member_id){
    var formData = new FormData();
    var d = new Date();
    var transaction_id = '115'+d.getFullYear() + concatString((d.getMonth() + 1)) + concatString(d.getDate()) + concatString(d.getHours()) + concatString(d.getMinutes()) + concatString(d.getSeconds()) + (Math.floor(Math.random() * (99 - 10) + 10));
    formData.append('_token', token);
    formData.append('transaction_id', transaction_id);
    formData.append('member_id', member_id);
    formData.set('transaction_detail_id', '1');
    formData.append('transaction_status_id', '2');
    formData.append('created', getCurrentDateTime());
    formData.append('total', random);
    ajaxPro('POST', getBaseURL()+'transaction', formData, 'html', false, false, false, false, success, error, null);
    function success(output){

        insertCreditByConfirm(formData);
    }

    function error(jqXHR, textStatus, errorThrown) {
        insertTransactionByConfirm(token, random);
    }
}