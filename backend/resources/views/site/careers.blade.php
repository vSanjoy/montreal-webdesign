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
    <!-- Career start -->
    <div class="industries careers">
        <div class="container">
        <div class="row">
            <div class="col-lg-8 col-xl-9">
                <div class="left_text">
                    @if ($cmsDetails->description != null)
                    {!! $cmsDetails->description !!}
                    @endif
                    <div class="career-form">
                        {{ Form::open([
                                    'method'=> 'POST',
                                    'class' => '',
                                    'route' => ['site.'.$language.'.careers'],
                                    'name'  => 'careerForm',
                                    'id'    => 'careerForm',
                                    'files' => true,
                                    'novalidate' => true]) }}
                            <div class="form-group">
                                <label for="first_name">@lang('custom.label_first_name') *</label>
                                {{ Form::text('first_name', null, [
                                                            'id' => 'first_name',
                                                            'placeholder' => '',
                                                            'class' => 'form-control',
                                                            'required' => true,
                                                        ]) }}
                            </div>
                            <div class="form-group">
                                <label for="last_name">@lang('custom.label_last_name') *</label>
                                {{ Form::text('last_name', null, [
                                                            'id' => 'last_name',
                                                            'placeholder' => '',
                                                            'class' => 'form-control',
                                                            'required' => true,
                                                        ]) }}
                            </div>
                            <div class="form-group">
                                <label for="email">@lang('custom.label_email') *</label>
                                {{ Form::email('email', null, [
                                                                'id' => 'email',
                                                                'placeholder' => '',
                                                                'class' => 'form-control',
                                                                'required' => true,
                                                            ]) }}
                            </div>
                            <div class="form-group">
                                <label for="phone-number">@lang('custom.label_mobile_number') *</label>
                                {{ Form::text('phone', null, [
                                                            'id' => 'phone',
                                                            'placeholder' => '',
                                                            'class' => 'form-control',
                                                            'required' => true,
                                                        ]) }}
                            </div>
                            <div class="form-group">
                                <label for="jape-title">@lang('custom.label_jape_title') *</label>
                                {{ Form::text('subject', null, [
                                                            'id' => 'subject',
                                                            'placeholder' => '',
                                                            'class' => 'form-control',
                                                            'required' => true,
                                                        ]) }}
                            </div>
                            <div class="form-group">
                                <label for="experience">@lang('custom.label_years_of_experience') *</label>
                                {{ Form::text('year_of_experience', null, [
                                                            'id' => 'year_of_experience',
                                                            'placeholder' => '',
                                                            'class' => 'form-control',
                                                            'required' => true,
                                                        ]) }}
                            </div>
                            <div class="form-group">
                                <label for="datepicker">@lang('custom.label_dob') *</label>
                                <input type="text" name="dob" class="form-control" id="datepicker" autocomplete="off" required value="{{old('dob')}}">
                            </div>
                            <div class="form-group">
                                <label for="why-us">@lang('custom.label_why_want_to_work_with_us') *</label>
                                {{ Form::textarea('why_you_want_to_work_with_us', null, [
                                                            'id' => 'why_you_want_to_work_with_us',
                                                            'placeholder' => '',
                                                            'class' => 'form-control',
                                                            'required' => true,
                                                            'rows' => 6
                                                        ]) }}
                            </div>
                            <div class="form-group">
                                <label for="upload-cv">@lang('custom.label_upload_cv')</label>
                                <input type="file" class="form-control-file" id="upload-cv" name="cv">
                            </div>
                            <div class="form-group">
                                {{-- <label for="solve-equation">@lang('custom.label_human_being') *</label> --}}
                                <div class="input-group">
                                    <div class="input-group-prepend captcha">
                                        <span>{!! captcha_img('default') !!}</span>
                                        <button type="button" class="btn reload-btn" class="reload" id="reload">&#x21bb;</button>
                                    </div>
                                    <input id="captcha" type="text" class="form-control" aria-label="solve equation" aria-describedby="solve-equation" name="captcha">
                                </div>
                            </div>
                            <input class="btn" type="submit" value="@lang('custom.label_submit')">
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3">
                @include('site.includes.services_side_menu')
            </div>
        </div>
    </div>
    </div>
    
    @include('site.includes.footer')

@endsection

@push('scripts')
<script type="text/javascript">
$('#reload').click(function () {
    $.ajax({
        type: 'GET',
        url: 'reload-captcha',
        success: function (data) {
            $(".captcha span").html(data.captcha);
        }
    });
});
</script>
    
@endpush