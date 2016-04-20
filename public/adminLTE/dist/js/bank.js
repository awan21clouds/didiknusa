var dt_bank;

function bank(){
    dt_bank= $('#dt-bank').DataTable({
        ajax : getBaseURL()+'bank',
        columnDefs:[{"title":"Bank","targets":0, "width":"200px"}, {"title":"No. Rekening","targets":1, "width":"250px"},{"title":"","targets":2, "width":"50px"}],
        columns : [{
            "data" : "detail"
        },{
            "data" : "account"
        }, {
            "data" : "bank_id",
            "render" : function (data, type, row) {
                var html = '<center><div class="btn-group">';
                html += '<button type="button" class="detail btn btn-warning" value="' + data + '" onclick="updateBank(this);"><i class="fa fa-pencil-square-o"></i> Edit</button>';
                html += '<button type="button" class="detail btn btn-danger" value="' + data + '" onclick="deleteBank(this);"><i class="fa fa-trash-o"></i> Delete</button>';
                html += '</div></center>';
                return html;
            }
        }
        ],
        aLengthMenu : [[5, 10, -1], [5, 10, "All"]],
        pageLength : 5
    });
}

function addBank(){
    $('#form-bank').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: '',
            invalid: '',
            validating: ''
        },
        fields: {
            detail: {
                message: 'Invalid value',
                validators: {
                    notEmpty: {
                        message: 'Required'
                    }
                }
            },
            account: {
                message: 'Invalid value',
                validators: {
                    notEmpty: {
                        message: 'Required'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        $('#form-bank').submit(function (event) {
            event.preventDefault();
            var id_length = $('#form-bank input[name=bank_id]').val().split('').length;
            var formData = new FormData($(this)[0]);
            id_length>0 ? edit(formData) : insertBank(formData);
            return false;
        });
    });
}


function insertBank(formData){
    var d = new Date();
    var bank_id = '112'+d.getFullYear() + concatString((d.getMonth() + 1)) + concatString(d.getDate()) + concatString(d.getHours()) + concatString(d.getMinutes()) + concatString(d.getSeconds()) + (Math.floor(Math.random() * (99 - 10) + 10));
    formData.append('bank_id', bank_id);
    formData.append('status', 0);
    ajaxPro('POST', getBaseURL()+'bank', formData, 'html', false, false, false, false, success, error, null);
    function success(output) {
        dt_bank.ajax.reload();
        notify('info', 'Bank Berhasil Ditambahkan!', 'Silahkan Lihat di menu data', 'glyphicon glyphicon-warning-sign');
        $("#form-bank")[0].reset();
        $("#form-bank").bootstrapValidator('resetForm', true);
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
        url: getBaseURL()+'bank/'+formData.get("bank_id"),
        type: 'PUT',
        data: {
            _token: formData.get("_token"),
            bank_id:formData.get("bank_id"),
            detail:formData.get("detail"),
            account:formData.get("account"),
            status:0
        },
        dataType: 'HTML',
        success: success,
        error: error
    });

    function success(output) {
        dt_bank.ajax.reload();
        notify('info', 'Lokasi Berhasil Diubah!', 'Silahkan Lihat di menu data', 'glyphicon glyphicon-warning-sign');
        $("#form-bank")[0].reset();
        $("#form-bank").bootstrapValidator('resetForm', true);
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

function updateBank(i){
    var bank_id = $(i).val();
    var CSRF_TOKEN = $("meta[name='token']").attr('content');
    $.ajax({
        url: getBaseURL()+'bank/'+bank_id+'/edit',
        type: 'GET',
        data: {_token: CSRF_TOKEN},
        dataType: 'json',
        success: function(output){
            $("#form-bank").bootstrapValidator('resetForm', true);
            $('#form-bank .form-group').each(function(i, v){
                var element_tag = $(this).children().eq('1').prop("tagName").toString().toLowerCase();
                var element_name = $(this).children().eq('1').prop("name").toString().toLowerCase();
                var key = Object.keys(output.data);
                $(key).each(function(j, w){
                    if(key[j]===element_name){
                        var value = output.data[key[j]];
                        $('#form-bank .form-group '+element_tag+'[name='+key[j]+']').val(value);
                        return false;
                    }
                });
            });
            $('#tab-new-trigger').click();
        }
    });
}


function deleteBank(i){
    var bank_id = $(i).val();
    var CSRF_TOKEN = $("meta[name='token']").attr('content');
    $.ajax({
        url: getBaseURL()+'bank/'+bank_id,
        type: 'DELETE',
        data: {_token: CSRF_TOKEN},
        dataType: 'HTML',
        success: success,
        error:error
    });
    function success(output) {
        dt_bank.ajax.reload();
        notify('info', 'Bank Berhasil Dihapus!', 'Silahkan Lihat di menu data', 'glyphicon glyphicon-warning-sign');
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