@extends('site.layouts.app', [])
@section('content')

    @include('site.includes.header')

    @if ($bannerList->count())
    <div class="banner position-relative">
        <div class="banner-inner owl-carousel owl-theme">
            @foreach ($bannerList as $keyBanner => $itemBanner)
            <div class="item">
                @if ($itemBanner->image != null)
                    @if (file_exists(public_path('/images/uploads/'.$bannerStorage.'/'.$itemBanner->image)))
                        <div class="banner-inner-img">
                            <img class="owl-lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$bannerStorage.'/'.$itemBanner->image) }}" alt="{{$itemBanner->title}}">
                        </div>
                    @endif
                @endif
                <div class="psabs">
                    <div class="container">
                        <h2>{!! $itemBanner->title !!}</h2>
                        <p>{!! $itemBanner->short_title !!}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <a href="#firstsec" class="downimg smoothScroll"><img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('images/site/downimg.png') }}" alt=""></a>
    </div>
    @endif    
    <div class="firstsec" id="firstsec">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-4 pr-lg-5">
                    <div class="imgbox position-relative wow fadeIn">
                    @if ($cmsDetails[0]->featured_image != null)
                        @if (file_exists(public_path('/images/uploads/'.$cmsStorage.'/'.$cmsDetails[0]->featured_image)))
                            <img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$cmsStorage.'/'.$cmsDetails[0]->featured_image) }}" alt="{!! $cmsDetails[0]->title !!}">
                        @endif
                    @endif
                    @if ($cmsDetails[0]->other_image != null)
                        <div class="absimg">
                        @if (file_exists(public_path('/images/uploads/'.$cmsStorage.'/'.$cmsDetails[0]->other_image)))
                            <img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$cmsStorage.'/'.$cmsDetails[0]->other_image) }}" alt="{!! $cmsDetails[0]->title !!}">
                        @endif
                        </div>
                    </div>
                    @endif
                </div>
                <div class="col-lg-8 pl-lg-5">
                    {!! $cmsDetails[0]->short_description !!}
                    <div class="line">	</div>
                    <div class="clear"></div>
                    <div class="textbox">
                        {!! $cmsDetails[0]->description !!}
                        <a href="{{ route('site.'.$language.'.about-us') }}" class="read"><img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('images/site/plus.png') }}" alt="@lang('custom.label_read_more')">@lang('custom.label_read_more')</a>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured service start -->
    <div class="secondsec">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-6">
                    <div class="headsec">
                    @if ($cmsDetails[1]->short_title != null)
                        {!! $cmsDetails[1]->short_title !!}
                    @endif
                    </div>
                </div>
                <div class="col-lg-5 right-sec-second">
                    @if ($cmsDetails[1]->short_description != null)
                        <p>{!! $cmsDetails[1]->short_description !!}</p>
                    @endif
                    <div class="line mb-0 mt-0">	</div>
                </div>
            </div>
            @if ($featuredServiceList->count())
            <div class="service-inner owl-carousel owl-theme">
                @foreach ($featuredServiceList as $keyFeaturedService => $itemFeaturedService)
                <div class="item">
                    <div class="zakarbx wow fadeIn wow @if ($keyFeaturedService % 2 == 0)fadeInUp @else fadeInDown @endif">
                        <h3>{{ $itemFeaturedService->title }}</h3>
                        <div class="zakrimg">
                        @if ($itemFeaturedService->image != null)
                            @if (file_exists(public_path('/images/uploads/'.$postStorage.'/thumbs/'.$itemFeaturedService->image)))
                                <img class="owl-lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$postStorage.'/thumbs/'.$itemFeaturedService->image) }}" alt="{!! $itemFeaturedService->title !!}">
                            @endif
                        @endif
                            <a href="{{ route('site.'.$language.'.service-details', $itemFeaturedService->slug) }}" class="pls-sign">
                                <img class="owl-lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('images/site/pls-sign.png') }}" alt="">
                            </a>
                        </div>
                        <p>
                        @if ($itemFeaturedService->short_description != null)
                            @if ($language != 'ar')
                                {{ excerpts($itemFeaturedService->short_description, 20, 'frontend') }}...
                            @else
                                {{ $itemFeaturedService->short_description }}...
                            @endif
                        @endif
                        </p>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
    <!-- Featured service end -->
    <!-- Why choose us start -->
    <div class="thrdsec">
        <div class="container">
            <div class="headsec text-center">
                @if ($cmsDetails[2]->short_title != null)
                <h2>{!! $cmsDetails[2]->short_title !!}</h2>
                @endif
                @if ($cmsDetails[2]->short_description != null)
                <p>{!! $cmsDetails[2]->short_description !!}</p>
                @endif
            </div>
            <div class="line black-line">	</div>
            @if ($whyChooseUsList->count())
            <div class="row">
                @foreach ($whyChooseUsList as $keyWhyChooseUs => $itemWhyChooseUs)
                <div class="col-lg-6 col-xl-3">
                    <div class="specbx wow @if ($keyWhyChooseUs % 2 == 0)fadeInUp @else fadeInDown @endif">
                        <div class="speccrcl">
                            <div class="specwhte">
                            @if ($itemWhyChooseUs->image != null)
                                @if (file_exists(public_path('/images/uploads/'.$whyChooseUsStorage.'/'.$itemWhyChooseUs->image)))
                                    <img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$whyChooseUsStorage.'/'.$itemWhyChooseUs->image) }}" alt="{!! $itemWhyChooseUs->title !!}">
                                @endif
                            @endif
                                <div class="ngpsa"></div>
                            </div>
                        </div>
                        <h3>{!! $itemWhyChooseUs->title !!}</h3>
                        <p>{!! $itemWhyChooseUs->short_description !!}</p>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
    <!-- Why choose us end -->
    <!-- Latest news start -->
    <div class="latest_news">
        <div class="greenbox">
            <a href="{{ route('site.'.$language.'.news') }}" class="read">
                <img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('images/site/plus.png') }}" alt="@lang('custom.label_all_news')">@lang('custom.label_all_news')
            </a>
        </div>
        <div class="latest_news_container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7">
                    @if ($cmsDetails[3]->short_title != null)
                        <h1>{!! $cmsDetails[3]->short_title !!}</h1>
                    @endif
                    @if ($cmsDetails[3]->short_description != null)
                        <p>{!! $cmsDetails[3]->short_description !!}</p>
                    @endif
                    </div>
                </div>
                @if ($latestNewsList->count())
                <div class="news-crsl owl-carousel owl-theme" id="latest_news">
                    @foreach ($latestNewsList as $keyLatestNews => $itemLatestNews)
                    <div class="item">
                        <div class="news_caro wow @if ($keyLatestNews % 2 == 0)fadeInUp @else fadeInDown @endif">
                            <div class="date">
                                <h3>{!! \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $itemLatestNews->date)->format('d') !!}</h3>
                                <p>{!! \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $itemLatestNews->date)->format('M') !!}</p>
                            </div>
                            <h5>{{ excerpts($itemLatestNews->title, 5, 'frontend') }}...</h5>
                            <hr>
                            <div class="same">
                                <p>
                                @if ($itemLatestNews->short_description != null)
                                    {{ excerpts($itemLatestNews->short_description, 15, 'frontend') }}...
                                @endif
                                </p>
                            </div>
                            <a href="{{ route('site.'.$language.'.news-details', $itemLatestNews->slug) }}">
                                @lang('custom.label_read_more') <img src="{{ asset('images/site/arrw.png') }}" alt="{!! $itemLatestNews->title !!}">
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Latest news end -->
    <!-- Our team start -->
    <div class="our_team">
        <div class="container">
            @if ($cmsDetails[4]->short_title != null)
            <h1 class="text-center">{{ $cmsDetails[4]->short_title }}</h1>
            @endif
            @if ($cmsDetails[4]->short_description != null)
            <p class="text-center">{!! $cmsDetails[4]->short_description !!}</p>
            @endif
            @if ($teamList->count())
            <div class="our_team_carousel owl-carousel owl-theme">
                @foreach ($teamList as $keyTeam => $itemTeam)
                <div class="item">
                    <div class="our_team_inner wow @if ($keyTeam % 2 == 0)fadeInDown @else fadeInUp @endif">
                    @if ($itemTeam->image != null)
                        @if (file_exists(public_path('/images/uploads/'.$teamMemberStorage.'/thumbs/'.$itemTeam->image)))
                            <div class="team_img">
                                <img class="owl-lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$teamMemberStorage.'/thumbs/'.$itemTeam->image) }}" alt="{!! $itemTeam->name !!}">
                            </div>
                        @endif
                    @endif
                        <h5>{{ $itemTeam->name }}</h5>
                        @if ($itemTeam->designation != null)
                        <p>{!! $itemTeam->designation !!}</p>
                        @endif
                        <div class="our_team_icons d-flex">
                        @if ($itemTeam->facebook_link != null)
                            <a href="{{ $itemTeam->facebook_link }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if ($itemTeam->twitter_link != null)
                            <a href="{{ $itemTeam->twitter_link }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if ($itemTeam->instagram_link != null)
                            <a href="{{ $itemTeam->instagram_link }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if ($itemTeam->pinterest_link != null)
                            <a href="{{ $itemTeam->pinterest_link }}" target="_blank"><i class="fab fa-pinterest"></i></a>
                        @endif
                        @if ($itemTeam->be_link != null)
                            <a href="{{ $itemTeam->be_link }}" target="_blank"><i class="fab fa-behance"></i></a>
                        @endif
                        @if ($itemTeam->linkedin_link != null)
                            <a href="{{ $itemTeam->linkedin_link }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                        @if ($itemTeam->github_link != null)
                            <a href="{{ $itemTeam->github_link }}" target="_blank"><i class="fab fa-github-alt"></i></a>
                        @endif
                        @if ($itemTeam->youtube_link != null)
                            <a href="{{ $itemTeam->youtube_link }}" target="_blank"><i class="fab fa-youtube"></i></a>
                        @endif
                        </div>
                        @if ($itemTeam->description != null)
                        <div class="same">
                            @if ($language != 'ar')
                                {!! excerpts($itemTeam->description, 20, 'frontend') !!}...
                            @else
                                {!! excerpts($itemTeam->description, 150, 'frontend') !!}
                            @endif
                        </div>
                        @endif
                        <a href="{{ route('site.'.$language.'.about-us') }}" class="rm">
                            @lang('custom.label_read_more') <img src="{{ asset('images/site/arrw.png') }}" alt="@lang('custom.label_read_more')">
                        </a>
                    </div>
                </div>    
                @endforeach
            </div>
            @endif
        </div>
    </div>
    <!-- Our team end -->

    @include('site.includes.footer')

@endsection