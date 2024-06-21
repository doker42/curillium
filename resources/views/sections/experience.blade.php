

<section class="page-section bg-blue1 text-white mb-0" id="experience">
    <div class="container-fluid">
        <h2 class="page-section-heading text-center text-uppercase text-white">My Experience</h2>

        @if(isset($jobs))

            @php $i=0; @endphp

            @foreach($jobs as $item)

                <div class="container-fluid job">
                    <div class="row job-row">

                        @if($i%2)
                            @php $first ='bg-grey1-job blue-main-job'; $second=''; $btn_style = 'btn-white';@endphp
                        @else
                            @php $first=''; $second='bg-grey1-job blue-main-job'; $btn_style ='btn-blue'; @endphp
                        @endif

                        <div class="border-bottom col-sm-5 text-center d-flex justify-content-center align-items-center {{ $first }} bg-grey1-mob blue-main-mob">
                            <h3>{{ $item->dateRange }}</h3>
                        </div>

                        <div class="border-top col-sm-7 {{ $second }}">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->companyName }}</h5>
                                    <h6 class="card-title">{{ $item->position }}</h6>
                                    <h6 class="card-title">{{ $item->typeJob }}</h6>
                                    <h6 class="card-title">{{ $item->langs }}</h6>
                                    <h6 class="card-title">{{ $item->library }}</h6>
                                    <h6 class="card-title">{{ $item->stack }}</h6>
                                    <h6 class="card-title">{{ $item->additions }}</h6>
                                    <div class="text-right">
                                        @if($item->companyLink)
                                            <a class="btn btn-outline-secondary {{ $btn_style }} btn-white-mob" href="{{ $item->companyLink }}">Company Link</a>
                                        @else
                                            <a class="btn btn-outline-secondary disabled {{ $btn_style }} btn-white-mob" href="#" >Company Link</a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @php $i++; @endphp

            @endforeach

        @else
            <h3>DATA ERROR</h3>
        @endif

        <div id="cv-btn" class="text-center mt-4">
            @if($letter)
                <a class="btn btn-xl btn-outline-light btn-download" href="{{url($letter->url())}}" target="_blank">
            @else
                <a class="btn btn-xl btn-outline-light btn-download" href= "{{url(asset('/files/CV%20letter.pdf'))}}" target="_blank">
            @endif
                    <i class="fas fa-download mr-2"></i>
                    Download MY CV
                </a>
        </div>

    </div>

</section>
