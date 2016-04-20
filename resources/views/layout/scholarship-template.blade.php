@if(count($scholarships))
    @foreach ($scholarships as $scholarship)
        <div class="col-md-4">
            <div class="box box-widget">
                <div class="box-header with-border">
                    <div class="user-block">
                        <img class="img-circle" src="{{ url('/') }}/{{ $scholarship->photo }}" alt="user image">
                        <span class="username"><a href="#">{{ $scholarship->name }}</a></span>
                        <span class="description created">{{ $scholarship->created }}</span>
                    </div><!-- /.user-block -->
                    <div class="box-tools">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
                    @if(isset($scholarship->picture))
                        <img class="img-responsive pad" src="{{ url('/') }}/{{ $scholarship->picture }}" alt="Photo" style="margin: 0 auto; height:200px; width:auto;">
                    @else
                        <img class="img-responsive pad" src="http://placehold.it/1100x500/f3f3f3/ffffff&amp;text=Tidak+ada+gambar" alt="Photo" style="margin: 0 auto; height:200px; width:auto;">
                    @endif
                </div><!-- /.box-body -->
                <div class="box-footer box-comments">
                    <div class="box-comment">
                            <span class="username">
                                {{ $scholarship->student_name }}
                                <span class="text-muted pull-right"><a href="{{ url('/') }}/scholarship/detail/{{ $scholarship->scholarship_id }}">Detail</a></span>
                            </span><!-- /.username -->
                            <span class="readmore">
                                {{--{{ $scholarship->scholarship_target }} <br/>--}}
                                {{ $scholarship->short_description }}
                             </span>
                    </div><!-- /.box-comment -->
                </div><!-- /.box-footer -->
                <div class="box-footer text-black">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Progress bars -->
                            <div class="clearfix">
                                <span class="pull-left">Terkumpul</span>
                                <small class="pull-right scholarship-currency">{{ $scholarship->donation_total }}</small>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-green" style="width: {{ round((($scholarship->donation_total/$scholarship->scholarship_target)*100),2).'%' }};">{{ round((($scholarship->donation_total/$scholarship->scholarship_target)*100),2) }}%</div>
                            </div>
                            <div class="clearfix">
                                <small class="pull-left">@if(Session::has('member'))<a href="javascript:;" onclick="scholarshipDonation(this);" class="btn btn-success btn-sm" alt="{{$scholarship->scholarship_id}}">Berikan Beasiswa</a>@endif</small>
                                <small class="pull-right"><i class="fa fa-clock-o"></i> <span data-livestamp="{{ $scholarship->created }}"></span></small>
                            </div>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
            </div><!-- /.box -->
        </div>
    @endforeach
@endif