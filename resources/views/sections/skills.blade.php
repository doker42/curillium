@extends('layouts.basic_skill')

@section('content')

    <div class="container" style="margin: 104px 0 0 0; background-color: white">
        <div class="text-center"><h3>My little projects</h3></div>
        <div class="row">
            <div class="col-sm-12">

                @if(isset($projects))

                    @foreach($projects as $item)
                        {{--      FIRST          --}}
                        <div class="container project" style="margin: 50px 0">
                            <div class="row">

                                <div class="card" style="width: 100%;">
                                    <div class="row no-gutters">
                                        <div class="col-md-4">
                                            <a href="{{ $item->link }}">
                                                @if(isset($item->img_path))
                                                    <img src="/public/storage/{{ $item->img_path }}" class="card-img" alt="..." style="padding: 30px">
                                                @else
                                                    <img src="public/img/guru.jpg" class="card-img" alt="..." style="padding: 30px">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $item->name }}</h5>
                                                <p class="card-text">{{ $item->skills }}</p>
                                                <p class="card-text">{{ $item->description }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach

                @endif

                {{--                          FIRST--}}
                <div class="container project" style="margin: 50px 0">
                    <div class="row">

                        <div class="card" style="max-width: 100%;">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="{{env('SUB')}}/public/img/guru.jpg" class="card-img" alt="..." style="padding: 30px">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Название карточки</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>

    @include('blocks.copyright')

@endsection
