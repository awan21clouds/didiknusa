<html>
    <head>
        <title>DidikNusa.com</title>
        <link media="all" type="text/css" rel="stylesheet" href="../adminLTE/plugins/font-awesome-4.5.0/css/font-awesome.min.css"/>
        <link media="all" type="text/css" rel="stylesheet" href="../adminLTE/plugins/ionicons-master/css/ionicons.min.css"/>
        <link media="all" type="text/css" rel="stylesheet" href="../adminLTE/dist/css/login.css"/>
    </head>
    <body class="align">

    <div class="site__container">

        <div class="grid__container">
            <h1 class="text--center">DidikNusa.com</h1>
            <h3 class="text--center">Silahkan isi kolom pada form berikut</h3>

            <form action="" method="post" class="form form--login">
                <input type="hide" name="_token" value="{{csrf_token()}}"/>
                <div class="form__field">
                    <label class="fa fa-envelope" for="login__password"><span class="hidden">Email</span></label>
                    <input type="email" class="form__input" placeholder="Masukkan alamat email anda" name="email" required title="Silahkan isi kolom ini dengan  alamat email yang valid" />
                </div>

                <div class="form__field">
                    <button type="submit">Kirim password baru ke email</button>
                </div>


            </form>

            <p class="text--center">Ingat Password? <a href="login">Silahkan masuk</a> <span class="fontawesome-arrow-right"></span></p>

        </div>

    </div>
    <script src="../adminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../adminLTE/dist/js/home.js"></script>
    @include('layout.script')
    </body>
</html>
