@extends('layout.master')

@section('content')
    <div class="container">
        <!-- Main content -->
        <section class="content">
            A
            @if(!Session::has('member'))
                @include('layout.login')
            @endif
        </section><!-- /.content -->
    </div><!-- /.container -->
    <script src="../adminLTE/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="../adminLTE/dist/js/home.js"></script>
    <script src="../adminLTE/dist/js/scholarship_detail.js"></script>
    @include('layout.script')
@endsection