
/**
 * Created by RizqyFahmi on 08/04/2016.
 */
$(document).ready(function(){
    forgetPassword();
    registration();
    login();
});
//
function registration(){
    $('#form-registration').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            name:{
                validators: {
                    notEmpty: {
                        message: 'Required'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'Required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    },
                    remote: {
                        type: 'GET',
                        url: getBaseURL()+'member/emailValidator',
                        data: function(validator) {
                            return {
                                email: validator.getFieldElements('email').val()
                                //period_id: validator.getFieldElements('period_id').val(),
                                //status : 1
                            };
                        }
                    }
                }
            },
            phone: {
                message: 'The phone number is not valid',
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
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    },
                    identical: {
                        field: 'confirm_password',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'name',
                        message: 'The password cannot be the same as username'
                    }
                }
            },
            confirm_password: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required and cannot be empty'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    },
                    different: {
                        field: 'name',
                        message: 'The password cannot be the same as username'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        $('#form-registration').submit(function (event) {
            event.preventDefault();
            var d = new Date();
            var member_id = '124'+d.getFullYear() + concatString((d.getMonth() + 1)) + concatString(d.getDate()) + concatString(d.getHours()) + concatString(d.getMinutes()) + concatString(d.getSeconds()) + (Math.floor(Math.random() * (99 - 10) + 10));
            var formData = new FormData($(this)[0]);
            formData.append('member_id', member_id);
            formData.append('status', 0);
            formData.append('location_id', 0);
			formData.append('photo', 'adminLTE/dist/img/default.png');			
            ajaxPro('POST', getBaseURL()+'member', formData, 'html', false, false, false, false, success, error, null);
            function success(output) {
                notify('info', 'Registrasi Berhasil!', 'Silahkan masuk', 'glyphicon glyphicon-warning-sign');
                //$(i).css("background-color", 'transparent');
                //$('#login').animatescroll({scrollSpeed:2000,easing:'easeInOutBack'});
                $("#form-registration").bootstrapValidator('resetForm', true);
                $("#form-registration")[0].reset();
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

function login(){
    $('#form-login').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        $('#form-login').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            ajaxPro('POST', getBaseURL()+'member/login', formData, 'json', false, false, false, false, success, error, null);
            function success(output) {
                //output.status==1 ? window.location = "../../home" : window.location = "../../member/error";
                switch (output.status){
                    case 0 : window.location = getBaseURL()+"home"; break;
                    case 1 : window.location = getBaseURL()+"profil/00fb9a11afb139bec093f26de55f6a48"; break;
                    default : window.location = getBaseURL()+"member/error"; break;
                }
                //if(output.status==0){
                //
                //}else if(output.status==1){
                //    window.location = getBaseURL()+"profil/00fb9a11afb139bec093f26de55f6a48";
                //}else {
                //    window.location = getBaseURL()+"member/error";
                //}
                $("#form-login").bootstrapValidator('resetForm', true);
                $("#form-login")[0].reset();
            }
            function error(jqXHR, textStatus, errorThrown) {
                alert('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
            }
            return false;
        });
    });
}

function forgetPassword(){
    $('#form-password').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'Required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    }
                }
            }
        }
    }).on('success.form.bv', function (e) {
        $('#form-password').submit(function (event) {
            event.preventDefault();
            var formData = new FormData($(this)[0]);
            ajaxPro('POST', getBaseURL()+'member/forgetPassword', formData, 'html', false, false, false, false, success, error, null);
            function success(output) {
                notify('info', 'Reset password berhasil!', 'Silahkan cek email anda', 'glyphicon glyphicon-warning-sign');
                $(i).css("background-color", 'transparent');
                $('#login').animatescroll({scrollSpeed:2000,easing:'easeInOutBack'});
                $("#form-password").bootstrapValidator('resetForm', true);
                $("#form-password")[0].reset();
            }
            function error(jqXHR, textStatus, errorThrown) {
                alert('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
            }
            return false;
        });
    });
}

///member/updatePassword