<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="{{ url('/') }}/home" class="navbar-brand">
                    <img src="../adminLTE/dist/img/logo.png" class="user-image img-sm" id="brand-logo"  alt="User Image">
                    <b>DidikBangsa</b>.com
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active" alt="home"><a href="{{ url('/') }}/home" class="animsition-link">Beranda <span class="sr-only">(current)</span></a></li>
                    <li alt="-"><a href="javascript:;" onclick="scholarshipBeforLogin(this);">Usulkan Beasiswa </a></li>
                    <li alt="scholarship"><a href="{{ url('/') }}/scholarship" class="animsition-link">Berikan Beasiswa</a></li>
{{--                    <li alt="scholarship"><a href="{{ url('/') }}/scholarship" class="animsition-link">{{\Illuminate\Support\Facades\Session::get('member')}}</a></li>--}}
                </ul>
                <form class="navbar-form navbar-left" role="search">
                    <div class="form-group" >
                        <input type="text" class="form-control" id="navbar-search-input" placeholder="Cari">
                    </div>
                </form>
            </div><!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav" id="navbar-right">
                    <li><a href="javascript:;" onclick="$('#register').animatescroll({scrollSpeed:2000,easing:'easeInOutBack'});" class="no-hover">Belum terdaftar? <span class="dashed-underline">Registrasi disini</span></a></li>
                    <li><a href="javascript:;" onclick="$('#login').animatescroll({scrollSpeed:2000,easing:'easeInOutBack'});" class="no-hover"><span class="dashed-underline">Masuk</span></a></li>
                </ul>
            </div><!-- /.navbar-custom-menu -->
        </div><!-- /.container-fluid -->
    </nav>
</header>