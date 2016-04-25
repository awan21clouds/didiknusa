<html>
    <head>
        <title>DidikNusa.com</title>
        <link rel="shortcut icon" media="all" href="http://placehold.it/1100x500/f39c12/ffffff&amp;text=Comming+Soon"/>
        <link media="all" type="text/css" rel="stylesheet" href="../adminLTE/bootstrap/css/custom-bootstrap.css"/>
        <link media="all" type="text/css" rel="stylesheet" href="../adminLTE/plugins/notify/animate.css"/>
        <link media="all" type="text/css" rel="stylesheet" href="../adminLTE/plugins/font-awesome-4.5.0/css/font-awesome.min.css"/>
        <link media="all" type="text/css" rel="stylesheet" href="../adminLTE/plugins/ionicons-master/css/ionicons.min.css"/>
        <link media="all" type="text/css" rel="stylesheet" href="../adminLTE/dist/css/login.css"/>
    </head>
    <body class="align">

    <div class="site__container">

        <div class="grid__container">
            <h1 class="text--center">DidikNusa.com</h1>
            <h3 class="text--center">Silahkan isi kolom pada form berikut</h3>

            <form class="form form--login" id="form-registration">
                <input type="hide" name="_token" value="{{csrf_token()}}" style="display: none;"/>
                <div class="form__field">
                    <label class="fa fa-user" for="login__username"><span class="hidden">Nama</span></label>
                    <input type="text" class="form__input" placeholder="Masukkan nama anda" name="name" required title="Silahkan isi kolom ini dengan nama yang valid"/>
                </div>

                <div class="form__field">
                    <label class="fa fa-phone" for="login__password"><span class="hidden">Nomor Telepon</span></label>
                    <input type="text" class="form__input" placeholder="Masukkan nomor telepon anda" name="phone" required pattern="[0-9]{1,15}" title="Silahkan isi kolom ini dengan  nomor telepon yang valid"/>
                </div>

                <div class="form__field">
                    <label class="fa fa-envelope" for="login__password"><span class="hidden">Email</span></label>
                    <input type="email" class="form__input" placeholder="Masukkan alamat email anda" name="email" required title="Silahkan isi kolom ini dengan  alamat email yang valid" />
                </div>

                <div class="form__field">
                    <label class="fa fa-lock" for="login__password"><span class="hidden">Password</span></label>
                    <input type="password" class="form__input" placeholder="Masukkan password anda" name="password" id="password1" required title="Silahkan isi kolom ini dengan password yang valid"/>
                </div>

                <div class="form__field">
                    <label class="fa fa-lock" for="login__password"><span class="hidden">Konfirmasi Password</span></label>
                    <input type="password" class="form__input" placeholder="Masukkan kembali password anda" name="confirm_password" id="password2" required title="Silahkan isi kolom ini dengan password yang valid">
                </div>

                <div class="form__field">
                    <button type="submit">Daftar</button>
                </div>

            </form>

            <p class="text--center">Sudah terdaftar? <a href="login">Silahkan masuk</a> <span class="fontawesome-arrow-right"></span></p>

        </div>

    </div>
    <script type="text/javascript">
        window.onload = function () {
            document.getElementById("password1").onchange = validatePassword;
            document.getElementById("password2").onchange = validatePassword;
        }
        function validatePassword(){
            var pass2=document.getElementById("password2").value;
            var pass1=document.getElementById("password1").value;
            if(pass1!=pass2)
                document.getElementById("password2").setCustomValidity("Passwords Don't Match");
            else
                document.getElementById("password2").setCustomValidity('');
//empty string means no validation error
        }
    </script>

    <script src="../adminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../adminLTE/dist/js/home.js"></script>
    @include('layout.script')
    </body>
</html>
