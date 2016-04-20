@extends('layout.master')

@section('content')
    <div class="container">
        <!-- Main content -->
        <section class="content" id="scholarship-page">
            <div class="row wow animated bounceIn" id="content"></div>

            <div class="row wow animated bounceIn">
                <div class="col-lg-12">
                    <ul id="pagination" class="pagination"></ul>
                </div>
            </div>


            @if(!Session::has('member'))
                @include('layout.login')
            @endif
        </section><!-- /.content -->
    </div><!-- /.container -->
    {!!Html::script('public/adminLTE/plugins/jQuery/jQuery-2.1.4.min.js')!!}
    {!!Html::script('public/adminLTE/dist/js/home.js')!!}
    @include('layout.script')
@endsection