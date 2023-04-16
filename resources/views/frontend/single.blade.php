@extends('__layouts.frontend')
@section('content')
    <!-- Breadcrumb Start -->
    <div class="breadcrumb-wrap">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">{{$post->category->name}}</li>
            </ul>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Single News Start-->
    <div class="single-news">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="sn-container">
                        <div class="sn-img">
                            @if($post->thumbnail)
                                <img style="height: 40px;width: 40px" src="{{\Illuminate\Support\Facades\Storage::url($post->thumbnail)}}"/>
                            @else
                                <img style="height: 40px;width: 40px" src="{{asset('img/noimage.png')}}"/>
                            @endif
                        </div>
                        <div class="sn-content">
                            <h1 class="sn-title">{!! $post->title !!}</h1>
                            <p>{!! $post->content !!}</p>
                        </div>
                    </div>

                </div>

                <div class="col-lg-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h2 class="sw-title">In This Category</h2>
                            <div class="news-list">

                                @foreach($inThisCategory as $inthis)
                                <div class="nl-item">
                                    <div class="nl-img">
                                        @if($post->thumbnail)
                                        <img style="height: 40px;width: 40px" src="{{\Illuminate\Support\Facades\Storage::url($post->thumbnail)}}"/>
                                        @else
                                           <img style="height: 40px;width: 40px" src="{{asset('/img/noimage.png')}}"/>
                                        @endif
                                    </div>
                                    <div class="nl-title">
                                        <a href="{{route('frontend.show',$post->slug)}}">{!! $inthis->title !!}</a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>




                        <div class="sidebar-widget">
                            <h2 class="sw-title">Category</h2>
                            <div class="category">
                                <ul>
                                    @foreach($allCategory as $cat)
                                    <li><a href="{{route('frontend.category',$cat->name)}}">{{$cat->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <div class="sidebar-widget">
                            <h2 class="sw-title">Tags</h2>
                            <div class="tags">
                                @foreach($post->tags as $tag)
                                <a href="{{route('frontend.tags',$tag->name)}}">{{$tag->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
