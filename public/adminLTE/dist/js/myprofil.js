/**
 * Created by RizqyFahmi on 15/04/2016.
 */

function getMyProfil(){
    var member_id = $('#member_id').html();
    var CSRF_TOKEN = $("meta[name='token']").attr('content');
    $.ajax({
        url: getBaseURL()+'member/'+member_id,
        type: 'GET',
        data: {_token: CSRF_TOKEN},
        dataType: 'json',
        success: function(output){
            $('#form-personal .form-group').each(function(i, v){
                var element_tag = $(this).children().eq('1').prop("tagName").toString().toLowerCase();
                var element_name = $(this).children().eq('1').prop("name").toString().toLowerCase();
                var key = Object.keys(output.data);
                $(key).each(function(j, w){
                    if(key[j]===element_name){
                        var value = output.data[key[j]];
                        $('#form-personal .form-group '+element_tag+'[name='+key[j]+']').val(value);
                        return false;
                    }
                });
            });
        }
    });
}

function updateMyProfil(){
    $('#form-personal').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: '',
            invalid: '',
            validating: ''
        },
        fields: {
            name: {
                message: 'Invalid value',
                validators: {
                    notEmpty: {
                        message: 'Required'
                    }
                }
            },
            phone: {
                message: 'Invalid value',
                validators: {
                    regexp: {
                        regexp: /^[0-9]/,
                        message: 'The value can contain only letters'
                    },
                    notEmpty: {
                        message: 'The phone number is required'
                    }
                }
            },
            email: {
                message: 'Invalid value',
                validators: {
                    notEmpty: {
                        message: 'Required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            location_id: {
                message: 'Invalid value',
                validators: {
                    notEmpty: {
                        message: 'Required'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        $('#form-personal').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: getBaseURL()+'member/'+formData.get("member_id"),
                type: 'PUT',
                data: {
                    _token: formData.get("_token"),
                    member_id:formData.get("member_id"),
                    name:formData.get("name"),
                    phone:formData.get("phone"),
                    email:formData.get("email"),
                    location_id:formData.get("location_id"),
                    biography:formData.get("biography")
                },
                dataType: 'HTML',
                success: success,
                error: error
            });

            function success(output) {
                selectLocate('#form-personal select[name=location_id]');
                getMyProfil();
                getProfil();
                getHeaderProfil();
                notify('info', 'Profil Berhasil Diubah!', 'Silahkan Lihat di menu profil', 'glyphicon glyphicon-warning-sign');
                $("#form-personal")[0].reset();
                $("#form-personal").bootstrapValidator('resetForm', true);
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


function updateMyPassword(){
    $('#form-password').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            old_password: {
                message: 'Invalid value',
                validators: {
                    notEmpty: {
                        message: 'Required'
                    },
                    remote: {
                        type: 'GET',
                        url: getBaseURL()+'member/passwordValidator',
                        data: function(validator) {
                            return {
                                member_id: $('#member_id').html(),
                                password: validator.getFieldElements('old_password').val()
                                //period_id: validator.getFieldElements('period_id').val(),
                                //status : 1
                            };
                        }
                    }
                }
            },
            password: {
                message: 'Invalid value',
                validators: {
                    notEmpty: {
                        message: 'The phone number is required'
                    },
                    identical: {
                        field: 'confirm_password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            },
            confirm_password: {
                message: 'Invalid value',
                validators: {
                    notEmpty: {
                        message: 'Required'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        $('#form-password').submit(function (event) {
            event.preventDefault();

            var formData = new FormData($(this)[0]);
            $.ajax({
                url: getBaseURL()+'member/updatePassword/'+$('#member_id').html(),
                type: 'PUT',
                data: {
                    _token: formData.get("_token"),
                    member_id:$('#member_id').html(),
                    password:formData.get("password")
                },
                dataType: 'HTML',
                success: success,
                error: error
            });

            function success(output) {
                console.log(output);
                notify('info', 'Password Berhasil Diubah!', 'Untuk memastikannya silahkan login menggunakan password baru', 'glyphicon glyphicon-warning-sign');
                $("#form-password")[0].reset();
                $("#form-password").bootstrapValidator('resetForm', true);
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

function updateMyPhoto(){
    $('#form-photo').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        formData.append('member_id', $('#member_id').html());
        ajaxPro('POST', getBaseURL()+'member/updatePhoto', formData, 'html', false, false, false, false, success, error, null);
        function success(output) {
            console.log(output);
            notify('info', 'Foto Berhasil Diubah!', 'Silahkan lihat di sidebar', 'glyphicon glyphicon-warning-sign');
            $('#avatar').fileinput('destroy');
            getProfil();
            getHeaderProfil();
            $("#form-photo")[0].reset();
            $("#form-photo").bootstrapValidator('resetForm', true);
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
}