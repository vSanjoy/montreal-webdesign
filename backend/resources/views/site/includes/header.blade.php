<header>
    <div class="plusminsarea"><span class="plus-btn">+</span> <span class="minus-btn">-</span></div>
    <div class="upperheader">
        <div class="uphederbx keep">
            <h6><i class="fas fa-mobile-alt"></i> @lang('custom.label_keep_in_touch'):<a class="header-phone" href="tel:{!! $settingData->phone_no !!}"> {!! $settingData->phone_no !!}</a></h6>
        </div>
        <div class="uphederbx srch">
        {{ Form::open([
            'method'=> 'GET',
            'class' => '',
            'route' => ['site.'.$language.'.search'],
            'name'  => 'searchForm',
            'id'    => 'searchForm',
            'files' => true,
            'novalidate' => true]) }}
            {{ Form::text('q', null, [
                                    'id' => 'q',
                                    'placeholder' => trans('custom.label_search').'.....',
                                    'class' => '',
                                    'required' => true,
                                ]) }}
            <input type="submit">
        {{ Form::close() }}
        </div>
        @if ($settingData->employee_gateway != null)
        <div class="uphederbx emplyee">
            <a href="{{ $settingData->employee_gateway }}" target="_blank">
                <span class="prfile"><i class="fas fa-user"></i></span>
                <span class="emplytxt">@lang('custom.label_employee_gateway')</span>
            </a>
        </div>
        @endif
    </div>
    <div class="clearfix"></div>
    <div class="downheader">
        <div class="container position-relative">
            <div class="row align-items-center">
                <div class="col-lg-3">
            @if ($settingData->logo != null)
                @if (file_exists(public_path('/images/uploads/'.$accountStorage.'/'.$settingData->logo)))
                    <a href="{{ getBaseUrl() }}" class="logo">
                        <img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$accountStorage.'/'.$settingData->logo) }}" alt="{!! $settingData->website_title !!}">
                    </a>
                @endif
            @endif
                </div>
                <div class="col-lg-9  text-lg-right">
                    <div class="navigation navgtin1">
                        <nav>
                            <ul>
                                <li @if(Route::current()->getName() == 'site.'.$language.'.home')class="current-menu-item" @endif><a href="{{ getBaseUrl() }}">@lang('custom.label_home')</a></li>
                                <li @if(Route::current()->getName() == 'site.'.$language.'.about-us')class="current-menu-item" @endif><a href="{{ route('site.'.$language.'.about-us') }}">@lang('custom.label_about_us')</a></li>
                                <li class="service @if ($serviceSlug != '')current-menu-item @endif">
                                    <a href="{{ route('site.'.$language.'.services') }}">@lang('custom.label_services')</a>
                                </li>
                                @if ($industriesMenu->count())
                                <li @if ($industrySlug != '')class="current-menu-item" @endif>
                                    <a href="{{ route('site.'.$language.'.industries') }}">@lang('custom.label_industries')</a>
                                    <ul>
                                    @foreach ($industriesMenu as $industry)
                                        <li><a href="{{ route('site.'.$language.'.industry-details', $industry->slug) }}">{{ $industry->title }}</a></li>
                                    @endforeach
                                    </ul>
                                </li>
                                @endif
                                <li @if(Route::current()->getName() == 'site.'.$language.'.careers')class="current-menu-item" @endif><a href="{{ route('site.'.$language.'.careers') }}">@lang('custom.label_careers')</a></li>
                                <li @if(Route::current()->getName() == 'site.'.$language.'.contact-us')class="current-menu-item" @endif><a href="{{ route('site.'.$language.'.contact-us') }}">@lang('custom.label_contact_us')</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="navigation-new navgtin2">
                        <nav>
                            <ul>
                                <li><a href="{{ getBaseUrl() }}">@lang('custom.label_home')</a></li>
                                <li><a href="{{ route('site.'.$language.'.about-us') }}">@lang('custom.label_about_us')</a></li>
                                @if (count($servicesMenu))
                                <li>
                                    <a href="{{ route('site.'.$language.'.services') }}">@lang('custom.label_services')</a>
                                    <ul>
                                    @foreach ($servicesMenu as $keyService => $itemService)
                                        <li>
                                            <a href="{{ route('site.'.$language.'.service-category', $itemService['slug']) }}">
                                                {!! $itemService['title'] !!}
                                            </a>
                                            @if (count($itemService['post']))
                                            <ul>
                                                @foreach ($itemService['post'] as $keyServicePost => $itemServicePost)
                                                <li>
                                                    <a href="{{ route('site.'.$language.'.service-details', $itemServicePost['slug']) }}">
                                                        {{ $itemServicePost['title'] }}
                                                    </a>
                                                </li>
                                                @endforeach
                                            </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                                @endif
                                @if ($industriesMenu->count())
                                <li>
                                    <a href="{{ route('site.'.$language.'.industries') }}">@lang('custom.label_industries')</a>
                                    <ul>
                                    @foreach ($industriesMenu as $industry)
                                        <li>
                                            <a href="{{ route('site.'.$language.'.industry-details', $industry->slug) }}">{{ $industry->title }}</a>
                                        </li>
                                    @endforeach
                                    </ul>
                                </li>
                                @endif
                                <li><a href="{{ route('site.'.$language.'.careers') }}">@lang('custom.label_careers')</a></li>
                                <li><a href="{{ route('site.'.$language.'.contact-us') }}">@lang('custom.label_contact_us')</a></li>
                            </ul>
                        </nav>
                        <div class="small_nav"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            @if (count($servicesMenu))
            <div class="megamenu">
                <div class="menubox-holder">
                    @php $i = 1; @endphp
                @foreach ($servicesMenu as $keyService => $itemService)
                    <div class="menubox @if($i % 2 == 0)for-not-breaking-text @endif">
                        <h3>
                            <a href="{{ route('site.'.$language.'.service-category', $itemService['slug']) }}" @if($itemService['slug'] == $serviceSlug)class="active" @endif>{{ $itemService['title'] }}</a>
                        </h3>
                        @if (count($itemService['post']))
                        <ul>
                        @foreach ($itemService['post'] as $keyServicePost => $itemServicePost)
                            <li>
                                <a href="{{ route('site.'.$language.'.service-details', $itemServicePost['slug']) }}" @if($itemServicePost['slug'] == $postSlug)class="active" @endif>
                                    {!! $itemServicePost['title'] !!}
                                </a>
                            </li>
                        @endforeach
                        </ul>
                        @endif
                    </div>
                    @php $i++; @endphp
                @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</header>
<div class="tt_language">
    <span class="tt_lang">
        <figure class="flags"><img src="{{ asset('images/site/blank.gif') }}" class="langF langF-{{ $language }}" alt=""></figure>
    </span>
    <ul class="tt_lang_opt">
        <li @if ($language == 'en') class="active" @endif>
            <span class="website_language" data-lang="en">
                <figure class="flags"><img src="{{ asset('images/site/blank.gif') }}" class="langF langF-en" alt="@lang('custom.lang_english')"></figure>
                <span>@lang('custom.lang_english')</span>
            </span>
        </li>
        <li @if ($language == 'ar') class="active" @endif>
            <span class="website_language" data-lang="ar">
                <figure class="flags"><img src="{{ asset('images/site/blank.gif') }}" class="langF langF-ar" alt="@lang('custom.lang_arabic')"></figure>
                <span>@lang('custom.lang_arabic')</span>
            </span>
        </li>
    </ul>
</div>