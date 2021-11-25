@extends('site.layouts.app', [])
@section('content')

    @include('site.includes.header')

    <div class="industries_banner">
    @if ($cmsDetails->banner_image != null)
        @if (file_exists(public_path('/images/uploads/'.$cmsStorage.'/'.$cmsDetails->banner_image)))
            <img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$cmsStorage.'/'.$cmsDetails->banner_image) }}" alt="{!! $cmsDetails->title !!}">
        @endif
    @endif
        <div class="psabs-container">
            <div class="container">
                @if ($cmsDetails->banner_title != null)
                <h1>{!! $cmsDetails->banner_title !!}</h1>
                @endif
            </div>
        </div>
    </div>
    <!-- contact start -->
    <div class="contact">    
        <div class="send_us_mail">
            <div class="container">
                <div class="row m-0">
                    <div class="col-md-12 col-lg-6">
                        <div class="cont_form_area">
                            <div class="send_us_mail_inside">
                            @if ($cmsDetails->other_description != null)
                            {!! $cmsDetails->other_description !!}
                            @endif

                            {{ Form::open(['name' => 'contactForm', 'id' => 'contactForm', 'files' => true, 'novalidate' => true]) }}
                                <div class="form-floating">
                                    <label>@lang('custom.label_name')*</label>
                                    {{ Form::text('name', null, [
                                                                'id' => 'name',
                                                                'placeholder' => '',
                                                                'class' => 'form-control',
                                                                'required' => true,
                                                            ]) }}
                                    <i class="fas fa-user"></i>
                                </div>
                                <div class="form-floating">
                                    <label>@lang('custom.label_email')*</label>
                                    {{ Form::email('email', null, [
                                                                'id' => 'email',
                                                                'placeholder' => '',
                                                                'class' => 'form-control',
                                                                'required' => true,
                                                            ]) }}
                                    <i class="far fa-envelope"></i>
                                </div>
                                <div class="form-floating">
                                    <label>@lang('custom.label_subject')*</label>
                                    {{ Form::text('subject', null, [
                                                                'id' => 'subject',
                                                                'placeholder' => '',
                                                                'class' => 'form-control',
                                                                'required' => true,
                                                            ]) }}
                                    <i class="fas fa-edit"></i>
                                </div>
                                <div class="form-floating">
                                    <label>@lang('custom.label_message')*</label>
                                    {{ Form::textarea('message', null, [
                                                                'id' => 'message',
                                                                'placeholder' => '',
                                                                'class' => 'form-control',
                                                                'required' => true,
                                                            ]) }}
                                    <i class="fas fa-edit"></i>
                                </div>
                                <input class="btn" id="contact-submit" type="submit" value="@lang('custom.label_submit')"/>
                            {{ Form::close() }}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="find_us_inside">
                            <div class="text_box">
                            @if ($cmsDetails->short_description != null)
                                {!! $cmsDetails->short_description !!}
                            @endif
                            </div>
                            <div class="row m-0 pt-4">
                                <div class="col-12 col-md-6">
                                @if ($cmsDetails->description != null)
                                    {!! $cmsDetails->description !!}
                                @endif
                                </div>
                                <div class="col-12 col-md-6">
                                    @if ($cmsDetails->description2 != null)
                                        {!! $cmsDetails->description2 !!}
                                    @endif
                                    @if ($settingData->footer_address != null)
                                    <div class="icon d-flex">
                                        <i class="fas fa-map-marker-alt marker-contact"></i>
                                        <p><a>{!! $settingData->footer_address !!}</a></p>
                                    </div>
                                    @endif
                                    @if ($settingData->phone_no != null)
                                    <div class="icon d-flex phone phone-number">
                                        <i class="fas fa-mobile-alt"></i>
                                        <p><a href="tel:{!! $settingData->phone_no !!}">{!! $settingData->phone_no !!}</a></p>
                                    </div>
                                    @endif
                                    @if ($settingData->fax != null)
                                    <div class="icon d-flex fax">
                                        <i class="fa fa-fax fax-contact"></i>
                                        <p><a>{!! $settingData->fax !!}</a></p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($officeBranchList->count())
        <div class="branches">
            <div class="container">
                <h1 class="text-center">@lang('custom.label_branches')</h1>
                @foreach ($officeBranchList as $keyBranch => $itemBranch)
                <div class="branches_area">
                    <div class="row m-0">
                        <div class="col-12 col-md-6 col-lg-4 left_branch">
                            <div class="branch_heading">
                                <h4>{!! $itemBranch->location !!}</h4>
                                <p>{!! $itemBranch->title !!}</p>
                            </div>
                            @if ($itemBranch->address != null || $itemBranch->phone != null || $itemBranch->fax != null || $itemBranch->customer_service_no != null)
                            <div class="branch_detals">
                                @if ($itemBranch->address != null)
                                <div class="icon d-flex">
                                    <i class="fas fa-map-marker-alt marker-map"></i>
                                    <p><a>{!! $itemBranch->address !!}</a></p>
                                </div>
                                @endif
                                @if ($itemBranch->phone != null)
                                <div class="icon d-flex phone-number">
                                    <i class="fas fa-mobile-alt"></i>
                                    <p><a href="tel:{!! $itemBranch->phone !!}">{!! $itemBranch->phone !!}</a></p>
                                </div>
                                @endif
                                @if ($itemBranch->fax != null)
                                <div class="icon d-flex fax">
                                    <i class="fa fa-fax fax-bmb"></i>
                                    <p><a>{!! $itemBranch->fax !!}</a></p>
                                </div>
                                @endif
                                @if ($itemBranch->customer_service_no != null)
                                <div class="icon d-flex phone-number">
                                    <i class="fas fa-mobile-alt"></i>
                                    <div>
                                        <p class="service-mobile-bmb">@lang('custom.label_customer_service_mobile')</p>
                                        <p><a href="tel:{!! $itemBranch->customer_service_no !!}">{!! $itemBranch->customer_service_no !!}</a></p>
                                    </div>
                                </div>
                                @endif
                            </div>
                            @endif
                        </div>
                        <div class="col-12 col-md-6 col-lg-8 p-0 right_branch">
                            @if ($itemBranch->map != null)
                            <div class="map">
                                {!! $itemBranch->map !!}
                            </div>
                            @endif
                        </div>
                    </div>
               </div>
               @endforeach
            </div>
        </div>
        @endif
    </div>
    
    @include('site.includes.footer')

@endsection