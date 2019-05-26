@extends('layouts.frontEnd')

@section('content')
    <!-- Stunning Header -->

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">{{$title}}</h1>
        </div>
    </div>
    
    <!-- End Stunning Header -->

    <!-- Post Details -->


    <div class="container">
            <div class="row medium-padding120">
                <main class="main">

                    <div class="row">
                        <div class="case-item-wrap">
                            @if ($posts->count() > 0)
                                @foreach ($posts as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                        <div class="case-item">
                                            <div class="case-item__thumb">
                                                <img src="{{$post->post_image}}" alt="our case">
                                            </div>
                                            <h6 class="case-item__title"><a href="{{ route('singlePost', ['slug' => $post->slug]) }}">{{$post->title}}</a></h6>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <h1 class="h1 text-center">No Results Found.</h1>
                            @endif
                        </div>
                    </div>
        
                    <!-- End Post Details -->
                    <br>
                    <br>
                    <br>
                    <!-- Sidebar-->
        
                    <!-- End Sidebar-->
        
                </main>
            </div>
        </div>

@endsection