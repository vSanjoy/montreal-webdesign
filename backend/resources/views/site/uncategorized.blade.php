@extends('site.layouts.app', [])
@section('content')

    @include('site.includes.header')

    <div class="industries_banner">
    @if ($categoryDetails->image != null)
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
                @if ($categoryDetails->title != null)
                <h1>{!! $categoryDetails->title !!}</h1>
                @else
                <h1>{!! $cmsDetails->title !!}</h1>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Industries start -->
    <div class="industries">        
        <div class="container">
            <div class="row">                
                <div class="col-lg-8 col-xl-9">
                @if ($postList && $postList->count())
                    <div class="row">
                    @foreach ($postList as $keyPost => $itemPost)
                        @php
                        $imageUrl = asset('/images/'.config('global.POST_NO_IMAGE'));
                        if ($keyPost == 0) {
                            $divClass = 'col-lg-12'; $imageClass = 'industry_left_pannel_image';
                            if ($itemPost->image != null) {
                                if (file_exists(public_path('/images/uploads/'.$postStorage.'/'.$itemPost->image))) {
                                    $imageUrl = asset('/images/uploads/'.$postStorage.'/'.$itemPost->image);
                                }
                            }
                        } else {
                            $divClass = 'col-lg-6'; $imageClass = 'industry_left_pannel_image_small';
                            if ($itemPost->image != null) {
                                if (file_exists(public_path('/images/uploads/'.$postStorage.'/'.$itemPost->image))) {
                                    $imageUrl = asset('/images/uploads/'.$postStorage.'/thumbs/'.$itemPost->image);
                                }
                            }
                        }
                        @endphp
                        <div class="col-12 col-md-12 {{$divClass}} indu_bx">
                            <div class="industry_left_pannel">
                                <div class="{{$imageClass}}">
                            @if ($imageUrl != '')
                                <img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ $imageUrl }}" alt="{!! $itemPost->title !!}">
                            @endif
                                </div>
                                <div class="industry_left_pannel_text">
                                    <span><i class="far fa-calendar-alt"></i> {!! \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $itemPost->date)->format('F d, Y') !!}</span>
                                    <h5>{!! $itemPost->title !!}</h5>
                                    <p>
                                    @if ($language != 'ar')
                                        {!! excerpts($itemPost->short_description, 20, 'frontend') !!}...
                                    @else
                                        {!! excerpts($itemPost->short_description, 50, 'frontend') !!}...
                                    @endif
                                        <a href="{{ route('site.'.$language.'.uncategorized-details', $itemPost->slug) }}" class="theme-color"> @lang('custom.label_read_more')</a>
                                    </p>
                                    <small>@lang('custom.label_in') <a href="{{ route('site.'.$language.'.uncategorized') }}" class="category-small">{!! $categoryDetails->title !!}</a></small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <nav aria-label="Page navigation example pagination">
                        {!! $postList->appends(Request::all())->links() !!}
                    </nav>
                @else
                    <p>@lang('custom.message_no_records_found')</p>
                @endif	 
                </div>
                
                <div class="col-lg-4 col-xl-3">
                    @include('site.includes.latest_news_side_menu')
                    @include('site.includes.categories_side_menu')
                </div>
            </div>
        </div>
    </div>
    <!-- Industries end -->
    
    @include('site.includes.footer')

@endsection