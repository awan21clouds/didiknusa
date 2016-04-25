
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
    $('#form-registration').submit(function (event) {
        event.preventDefault();
        var d = new Date();
        var member_id = '124'+d.getFullYear() + concatString((d.getMonth() + 1)) + concatString(d.getDate()) + concatString(d.getHours()) + concatString(d.getMinutes()) + concatString(d.getSeconds()) + (Math.floor(Math.random() * (99 - 10) + 10));
        var formData = new FormData($(this)[0]);
        formData.append('member_id', member_id);
        formData.append('status', 0);
        formData.append('location_id', 0);
        formData.append('biography', '-');
        formData.append('photo', 'adminLTE/dist/img/default.png');
        formData.append('register_date', getCurrentDateTime());
        //console.log(getCurrentDateTime());
        ajaxPro('POST', getBaseURL()+'member', formData, 'html', false, false, false, false, success, error, null);
        function success(output) {
            notify('info', 'Registrasi Berhasil!', 'Silahkan masuk', 'fa fa-exclamation-triangle');
            loginAjax(formData);
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

function login(){
    $('#form-login').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        loginAjax(formData);
        return false;
    });
}


function loginAjax(formData){
    ajaxPro('POST', getBaseURL()+'member/login', formData, 'json', false, false, false, false, success, error, null);
    function success(output) {
        //output.status==1 ? window.location = "../../home" : window.location = "../../member/error";
        switch (output.status){
            case 0 : window.location = getBaseURL()+"home"; break;
            case 1 : window.location = getBaseURL()+"profil/00fb9a11afb139bec093f26de55f6a48"; break;
            default : window.location = getBaseURL()+"member/error"; break;
        }

    }
    function error(jqXHR, textStatus, errorThrown) {
        alert('<p>status code: '+jqXHR.status+'</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>'+jqXHR.responseText + '</div>');
    }
}

function forgetPassword(){
    $('#form-password').submit(function (event) {
        event.preventDefault();
        var formData = new FormData($(this)[0]);
        ajaxPro('POST', getBaseURL()+'member/forgetPassword', formData, 'html', false, false, false, false, success, error, null);
        function success(output) {
            notify('info', 'Reset password berhasil!', 'Silahkan cek email anda', 'glyphicon glyphicon-warning-sign');
            $('#form-password')[0].reset();
        }
        function error(jqXHR, textStatus, errorThrown) {
            notify('error', 'Reset Password Gagal!', 'Email yang anda masukkan tidak terdaftar', 'fa fa-times');
            $('#form-password')[0].reset();
        }
        return false;
    });
}

///member/updatePassword