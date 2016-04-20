<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="{{ url('/') }}/home" class="navbar-brand">
                    {{--<img src="../adminLTE/dist/img/logo.png" class="user-image img-sm" id="brand-logo"  alt="User Image">--}}
                    <b>DidikBangsa</b>.com
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active" alt="home"><a href="{{ url('/') }}/{{ Session::get('member')->status == 1 ?  "member/profil/00fb9a11afb139bec093f26de55f6a48" : "home" }}" class="animsition-link">Beranda <span class="sr-only">(current)</span></a></li>
                    @if(Session::get('member')->status == 1)
                        <li><a href="javascript:;" class="profil-content-loader" alt="admin-donation"> Donasi </a></li>
                        <li><a href="javascript:;" class="profil-content-loader" alt="locate"> Beasiswa</a></li>
                        <li><a href="javascript:;" class="profil-content-loader" alt="bank"> Kredit </a></li>
                    @else
                        <li alt="-"><a href="#" id="scholarship-link" data-toggle="modal" data-target="#scholarship-modal">Usulkan Beasiswa </a></li>
                        <li alt="scholarship"><a href="{{ url('/') }}/scholarship" class="animsition-link">Berikan Beasiswa</a></li>
                    @endif
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
                    <!-- Messages: style can be found in dropdown.less-->
                    {{--<li class="dropdown messages-menu full-nav">--}}
                        {{--<!-- Menu toggle button -->--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-heart"></i>--}}
                            {{--<span class="label label-success">4</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="header">You have 4 messages</li>--}}
                            {{--<li>--}}
                                {{--<!-- inner menu: contains the messages -->--}}
                                {{--<ul class="menu">--}}
                                    {{--<li><!-- start message -->--}}
                                        {{--<a href="#">--}}
                                            {{--<div class="pull-left">--}}
                                                {{--<!-- User Image -->--}}
                                                {{--<img src="../adminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">--}}
                                            {{--</div>--}}
                                            {{--<!-- Message title and timestamp -->--}}
                                            {{--<h4>--}}
                                                {{--Support Team--}}
                                                {{--<small><i class="fa fa-clock-o"></i> 5 mins</small>--}}
                                            {{--</h4>--}}
                                            {{--<!-- The message -->--}}
                                            {{--<p>Why not buy a new awesome theme?</p>--}}
                                        {{--</a>--}}
                                    {{--</li><!-- end message -->--}}
                                {{--</ul><!-- /.menu -->--}}
                            {{--</li>--}}
                            {{--<li class="footer"><a href="#">See All Messages</a></li>--}}
                        {{--</ul>--}}
                    {{--</li><!-- /.messages-menu -->--}}

                    {{--<!-- Notifications Menu -->--}}
                    {{--<li class="dropdown notifications-menu full-nav">--}}
                        {{--<!-- Menu toggle button -->--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-graduation-cap"></i>--}}
                            {{--<span class="label label-warning">10</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="header">You have 10 notifications</li>--}}
                            {{--<li>--}}
                                {{--<!-- Inner Menu: contains the notifications -->--}}
                                {{--<ul class="menu">--}}
                                    {{--<li><!-- start notification -->--}}
                                        {{--<a href="#">--}}
                                            {{--<i class="fa fa-users text-aqua"></i> 5 new members joined today--}}
                                        {{--</a>--}}
                                    {{--</li><!-- end notification -->--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="footer"><a href="#">View all</a></li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<!-- Tasks Menu -->--}}
                    {{--<li class="dropdown tasks-menu full-nav">--}}
                        {{--<!-- Menu Toggle Button -->--}}
                        {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">--}}
                            {{--<i class="fa fa-credit-card"></i>--}}
                            {{--<span class="label label-danger">9</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu">--}}
                            {{--<li class="header">You have 9 tasks</li>--}}
                            {{--<li>--}}
                                {{--<!-- Inner menu: contains the tasks -->--}}
                                {{--<ul class="menu">--}}
                                    {{--<li><!-- Task item -->--}}
                                        {{--<a href="#">--}}
                                            {{--<!-- Task title and progress text -->--}}
                                            {{--<h3>--}}
                                                {{--Design some buttons--}}
                                                {{--<small class="pull-right">20%</small>--}}
                                            {{--</h3>--}}
                                            {{--<!-- The progress bar -->--}}
                                            {{--<div class="progress xs">--}}
                                                {{--<!-- Change the css width attribute to simulate progress -->--}}
                                                {{--<div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">--}}
                                                    {{--<span class="sr-only">20% Complete</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</a>--}}
                                    {{--</li><!-- end task item -->--}}
                                {{--</ul>--}}
                            {{--</li>--}}
                            {{--<li class="footer">--}}
                                {{--<a href="#">View all tasks</a>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="" class="user-image" alt="User-Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs" alt="User-Name"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header" id="header-profil">
                                <img src="" class="img-circle" alt="User-Image">
                                <p>
                                    <span alt="User-Name"></span>
                                    <small id="member_id" class="hide">{{Session::get('member')->member_id}}</small>
                                    <small>Terdaftar pada {{Session::get('member')->register_date}}</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                @if(Session::get('member')->status == 1)
                                    <div class="col-xs-4 text-center">
                                        <a href="{{ url('/') }}/profil/{{md5('locate')}}" class="animsition-link">Lokasi</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="{{ url('/') }}/profil/{{md5('bank')}}" class="animsition-link">Bank</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="{{ url('/') }}/profil/{{md5('user')}}" class="animsition-link">Pengguna</a>
                                    </div>
                                @else
                                    <div class="col-xs-4 text-center">
                                        <a href="{{ url('/') }}/profil/{{md5('my-donation')}}" class="animsition-link">Donasi</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="{{ url('/') }}/profil/{{md5('my-scholarship')}}" class="animsition-link">Beasiswa</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="{{ url('/') }}/profil/{{md5('my-kredit')}}" class="animsition-link">Kredit</a>
                                    </div>
                                @endif
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{ url('/') }}/profil/{{ md5('my-profil') }}" class="btn btn-default btn-flat animsition-link">Profil</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/') }}/member/logout" class="btn btn-default btn-flat">Keluar</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-custom-menu -->
        </div><!-- /.container-fluid -->
    </nav>
</header>