<div class="preloader" style="display: none;">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>
<!-- footer start -->
<footer>
    <div class="footer_icons wow fadeInDown position-relative">
        <p>@lang('custom.label_follow_us_on') :</p>
        @if ($settingData->facebook_link != null)
        <a href="{{ $settingData->facebook_link }}" target="_blank" class="facebook-foot"><i class="fab fa-facebook-f"></i></a>
        @endif
        @if ($settingData->twitter_link != null)
        <a href="{{ $settingData->twitter_link }}" target="_blank" class="twitter-foot"><i class="fab fa-twitter"></i></a>
        @endif
        @if ($settingData->linkedin_link != null)
        <a href="{{ $settingData->linkedin_link }}" target="_blank" class="linkdin-foot"><i class="fab fa-linkedin-in"></i></a>
        @endif
        @if ($settingData->googleplus_link != null)
        <a href="{{ $settingData->googleplus_link }}" target="_blank" class="google-foot"><i class="fab fa-google-plus-g"></i></a>
        @endif
        @if ($settingData->to_email != null)
        <a href="mailto:{{ $settingData->to_email }}" class="envelope-foot"><i class="fa fa-envelope"></i></a>
        @endif
        <div class="marker-wrapper">
            <div class="marker-in"> <img src="{{ asset('images/site/uparw.png') }}" alt=""></div>
            <div class="marker-out"></div>
            <div class="marker-ring"></div>
        </div>
    </div>
    <div class="container">
        <div class="row footer_row justify-content-between">
            <div class="col-6 col-md-6 col-xl-2 wow fadeInDown">
                <h3>@lang('custom.label_quick_links')</h3>
                <ul>
                    <li><a href="{{ getBaseUrl() }}" @if(Route::current()->getName() == 'site.'.$language.'.home')class="active" @endif>@lang('custom.label_home')</a></li>
                    <li><a href="{{ route('site.'.$language.'.about-us') }}" @if(Route::current()->getName() == 'site.'.$language.'.about-us')class="active" @endif>@lang('custom.label_about_us')</a></li>
                    <li><a href="{{ route('site.'.$language.'.services') }}" @if ($serviceSlug != '')class="active" @endif>@lang('custom.label_services')</a></li>
                    <li><a href="{{ route('site.'.$language.'.industries') }}" @if ($industrySlug != '')class="active" @endif>@lang('custom.label_industries')</a></li>
                    <li><a href="{{ route('site.'.$language.'.careers') }}" @if(Route::current()->getName() == 'site.'.$language.'.careers')class="active" @endif>@lang('custom.label_careers')</a></li>
                    <li><a href="{{ route('site.'.$language.'.contact-us') }}" @if(Route::current()->getName() == 'site.'.$language.'.contact-us')class="active" @endif>@lang('custom.label_contact_us')</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-6 col-xl-3 wow fadeInUp">
                <h3>@lang('custom.label_service_catagories')</h3>
                @if (count($servicesMenu))
                <ul>
                    @foreach ($servicesMenu as $keyService => $itemService)
                    <li><a href="{{ route('site.'.$language.'.service-category', $itemService['slug']) }}" @if ($itemService['slug'] == $postSlug)class="active" @endif>{!! $itemService['title'] !!}</a></li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="col-12 col-md-6 col-xl-3 footer_icon_lower_container wow fadeInDown">
                <h3>@lang('custom.label_contact_us')</h3>
                <ul>
                @if ($settingData->address != null)
                    <li>
                        <a>
                            <div class="footer_icon_lower d-flex align-items-center">
                                <i class="fas fa-map-marker-alt footer-marker-map"></i>
                                <div>
                                    {!! $settingData->address !!}
                                </div>
                            </div>
                        </a>
                    </li>
                @endif
                @if ($settingData->phone_no != null)
                    <li>
                        <a>
                            <div class="footer_icon_lower phone-number d-flex align-items-center">
                                <i class="fa fa-mobile footer-mobile"></i>
                                <div>
                                    <p class="eml">@lang('custom.label_phone')</p>
                                    <p><a href="tel:{{$settingData->phone_no}}" class="footer-telphone">{!! $settingData->phone_no !!}</a></p>
                                </div>
                            </div>
                        </a>
                    </li>
                @endif
                @if ($settingData->fax != null)
                    <li>
                        <a>
                            <div class="footer_icon_lower fax d-flex align-items-center">
                                <i class="fas fa-fax"></i>
                                <div>
                                    <p class="eml">@lang('custom.label_fax')</p>
                                    <p>{!! $settingData->fax !!}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                @endif
                @if ($settingData->to_email != null)
                    <li>
                        <div class="footer_icon_lower d-flex align-items-center">
                            <i class="fa fa-envelope"></i>
                            <div>
                                <p class="eml">@lang('custom.label_email')</p>
                                <p><a href="mailto:{{$settingData->to_email}}" class="footer-mailto">{!! $settingData->to_email !!}</a></p>
                            </div>
                        </div>
                    </li>
                @endif
                </ul>
            </div>
            @if ($settingData->map != null)
            <div class="col-12 col-md-6 col-xl-4 wow fadeInUp">
                {!! $settingData->map !!}
            </div>
            @endif
        </div>
        @if ($settingData->copyright_text != null)
        <div class="text-center copyright">
            <p>{!! $settingData->copyright_text !!}</p>
        </div>
        @endif
    </div>
    <!--<a class="scrollup" href="javascript:void(0);" ><i class="fas fa-arrow-up"></i></a>-->
    <input type="hidden" name="website_link" id="website_link" value="{{ url('/') }}" />
    <input type="hidden" name="website_lang" id="website_lang" value="{{ $language }}" />
</footer>
<!-- footer end -->