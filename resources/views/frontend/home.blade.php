@extends('__layouts.frontend')

@section('content')

    <!-- Category News Start-->

    <div class="cat-news">
        <div class="container">
            <div class="row">
                @foreach($postsByGroup as $keys=>$values)
                    <div class="col-md-6">
                        <h2>{{$values[0]->category->name}}</h2>
                        <div class="row cn-slider">
                            @foreach($values as $v)
                                <div class="col-md-6">
                                    <div class="cn-img">
                                        @if($v->thumbnail)
                                            <img style="width: 400px; height: 160px"
                                                 src="{{\Illuminate\Support\Facades\Storage::url($v->thumbnail)}}"/>
                                        @else
                                            <img style="width: 300px; height: 160px"
                                                 src="{{asset('img/noimage.png')}}"/>
                                        @endif
                                        <div class="cn-title">
                                            <a href="{{route('frontend.show',$v->slug)}}">{{$v->title}}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Category News End-->


    <!-- Main News Start-->
    <div class="main-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row">

                        @foreach($latestPosts as $latest)
                            <div class="col-md-4">
                                <div class="mn-img">
                                    @if($latest->thumbnail)
                                        <img style="height: 200px;width: 300px" src="{{\Illuminate\Support\Facades\Storage::url($latest->thumbnail)}}"/>
                                    @else
                                        <img style="height: 200px;width: 300px"  src="{{asset('img/noimage.png')}}"/>
                                    @endif
                                    <div class="mn-title">
                                        <a href="{{route('frontend.show',$latest->slug)}}">{{$latest->title}}</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="mn-list">
                        <h2>Read More</h2>
                        <ul>
                            @foreach($readMore as $more)
                                <li>
                                    <a href="{{route('frontend.show',$more->slug)}}">{{implode(' ', array_slice(str_word_count($more->title, 2), 0, 3));}}
                                        ...</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
