@extends('site.layouts.app', [])
@section('content')

    @include('site.includes.header')

    <div class="industries_banner">
    @if (isset($categoryDetails) && $categoryDetails->image != null)
        @if (file_exists(public_path('/images/uploads/'.$categoryStorage.'/'.$categoryDetails->image)))
            <img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$categoryStorage.'/'.$categoryDetails->image) }}" alt="{!! $categoryDetails->title !!}">
        @elseif ($cmsDetails->banner_image != null)
            @if (file_exists(public_path('/images/uploads/'.$cmsStorage.'/'.$cmsDetails->banner_image)))
                <img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$cmsStorage.'/'.$cmsDetails->banner_image) }}" alt="{!! $cmsDetails->title !!}">
            @endif
        @endif
    @elseif ($cmsDetails->banner_image != null)
        @if (file_exists(public_path('/images/uploads/'.$cmsStorage.'/'.$cmsDetails->banner_image)))
            <img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$cmsStorage.'/'.$cmsDetails->banner_image) }}" alt="{!! $cmsDetails->title !!}">
        @endif
    @endif
        <div class="psabs-container">
            <div class="container">
                @if ($postDetails && $postDetails->title != null)
                <h1>{!! $postDetails->title !!}</h1>
                @elseif ($categoryDetails && $categoryDetails->title != null)
                <h1>{!! $categoryDetails->title !!}</h1>
                @endif
            </div>
        </div>
    </div>
    
    <!-- News details start -->
    <div class="industries">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-xl-9">
        @if ($postDetails)
            @if ($postDetails && $postDetails->image != null)
                @if (file_exists(public_path('/images/uploads/'.$postStorage.'/'.$postDetails->image)))
                    <div class="left_img">
                        <img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$postStorage.'/'.$postDetails->image) }}" alt="{!! $postDetails->title !!}" class="img-fluid">
                    </div>
                @endif
            @endif
                    <div class="left_text">
                    @if ($postDetails && $postDetails->title)
                        <h4>{!! $postDetails->title !!}</h4>
                    @endif
                    @if ($postDetails && $postDetails->description)
                        {!! $postDetails->description !!}
                    @endif
                    </div>

                    <!-- ShareThis BEGIN -->
                    {{-- <div class="sharethis-inline-share-buttons"></div> --}}
                    <!-- ShareThis END -->
        @else
                    @lang('custom.message_no_records_found')
        @endif
                </div>
                <div class="col-lg-4 col-xl-3">
                    @include('site.includes.latest_news_side_menu')
                    @include('site.includes.categories_side_menu')
                </div>
            </div>
        </div>
    </div>
    <!-- News details end -->
    
    @include('site.includes.footer')

@endsection