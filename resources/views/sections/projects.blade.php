
<!-- Apps Section-->
<section class="page-section mb-0 bg-grey1" id="myapps">

    <div class="container" style="">

        <h2 class="page-section-heading text-center text-uppercase text-grey">My little old training apps</h2>

        <div class="row">
            <div class="col-sm-12">

                @if(isset($projects))

                    @foreach($projects as $item)
                        <div class="container project">
                                <div class="row">
                                    <div class="card text-grey card-project">
                                        <div class="row no-gutters">
                                            <div class="col-md-4">
                                                <a href="{{ $item->link }}">
                                                    @if(isset($item->img_path))
                                                        <img src="{{ asset('storage/app/public/'.$item->img_path) }}" class="card-img" alt="..." style="padding: 30px">
                                                    @else
                                                        <img src="{{env('SUB')}}/public/img/guru.jpg" class="card-img" alt="..." style="padding: 30px">
                                                    @endif
                                                </a>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $item->name }}</h5>
                                                    <p class="card-text">{{ $item->skills }}</p>
                                                    <p class="card-text">{{ $item->description }}</p>
                                                    <div class="text-right">
                                                        @if($item->git_link)
                                                            <a class="btn btn-outline-secondary btn_white btn-white-mob" href="{{ $item->git_link }}">GitHub Link</a>
                                                        @else
                                                            <a class="btn btn-outline-secondary disabled btn-blue btn-white-mob" href="#" >GitHub Link</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach

                @endif

            </div>
        </div>
    </div>

</section>
