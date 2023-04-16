@extends('__layouts.frontend')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                {{--                <li class="breadcrumb-item active">{{$posts[0]->category->name}}</li>--}}
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Single News Start-->
    <div class="single-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">


                    <div class="sn-related">
{{--                        <h2>{{$posts[0]->category->name}}</h2>--}}
                        <div class="row">

                            @foreach($posts as $post)
                                <div class="col-md-4">
                                    <div class="sn-img">
                                        @if($post->thumbnail)
                                            <img style="height: 240px;width: 340px" src="{{\Illuminate\Support\Facades\Storage::url($post->thumbnail)}}"/>
                                        @else
                                            <img style="height: 240px;width: 340px" src="{{asset('img/noimage.png')}}"/>
                                        @endif
                                        <div class="sn-title">
                                            <a href="{{route('frontend.show',$post->slug)}}">{{$post->title}}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

@endsection
