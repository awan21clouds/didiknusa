@extends('layout.master')

@section('content')
    <div class="container">
        <!-- Main content -->
        <section class="content" id="scholarship-page">
            <div class="row wow animated bounceIn" id="content"></div>

            <div class="row wow animated bounceIn">
                <div class="col-lg-12">
                    @if(count($scholarships))
                        <ul id="pagination" class="pagination"></ul>
                    @endif
                </div>
            </div>


            @if(!Session::has('member'))
                @include('layout.login')
            @endif
        </section><!-- /.content -->
    </div><!-- /.container -->
    <script src="../adminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../adminLTE/dist/js/home.js"></script>
    @include('layout.script')
@endsection