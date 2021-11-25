@extends('site.layouts.app', [])
@section('content')

    @include('site.includes.header')

    <div class="industries_banner">
    @if ($cmsDetails[0]->banner_image != null)
        @if (file_exists(public_path('/images/uploads/'.$cmsStorage.'/'.$cmsDetails[0]->banner_image)))
            <img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$cmsStorage.'/'.$cmsDetails[0]->banner_image) }}" alt="{!! $cmsDetails[0]->title !!}">
        @endif
    @endif
        <div class="psabs-container">
            <div class="container">
                @if ($cmsDetails[0]->banner_title != null)
                <h1>{!! $cmsDetails[0]->banner_title !!}</h1>
                @endif
            </div>
        </div>
    </div>
    <!-- About start -->
    <div class="about">
        @if ($cmsDetails[0]->description != null)
        <div class="welcome">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-7">
                        <div class="welcome_inner">
                            {!! $cmsDetails[0]->description !!}
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-5">
                    @if ($cmsDetails[0]->featured_image != null)
                        @if (file_exists(public_path('/images/uploads/'.$cmsStorage.'/'.$cmsDetails[0]->featured_image)))
                            <img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$cmsStorage.'/'.$cmsDetails[0]->featured_image) }}" class="img-fluid" alt="{!! $cmsDetails[0]->title !!}">
                        @endif
                    @endif
                    </div>
                </div>
            </div>
        </div>
        @endif
        <div class="mission-vission">
            <div class="container">
                <div class="row">
                    @if ($cmsDetails[0]->other_description != null)
                        {!! $cmsDetails[0]->other_description !!}
                    @endif
                </div>
            </div>
        </div>
        <!-- Our specialization start -->
        @if ($specializationList->count())
        <div class="our_specialization" style="background-image: url({{ asset('images/site/Contact_banner.jpg') }})">
            <div class="text">
                @if ($cmsDetails[0]->description2 != null)
                {!! $cmsDetails[0]->description2 !!}
                @endif
                <div class="container">
                    <div class="range">
                        <div class="row">
                            @foreach ($specializationList as $keySPecialization => $itemSpecialization)
                            <div class="col-12 col-md-6 col-lg-6 spc_bx">
                                <p>{!! $itemSpecialization->title !!}</p>
                                @if ($itemSpecialization->image != null)
                                    @if (file_exists(public_path('/images/uploads/'.$specializationStorage.'/'.$itemSpecialization->image)))
                                        <img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$specializationStorage.'/'.$itemSpecialization->image) }}" alt="{!! $itemSpecialization->title !!}">
                                    @endif
                                @endif
                            </div>    
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Our specialization end -->
        <!-- Core values start -->
        @if ($coreValueList->count())
        <div class="core_values cmn-gap">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-5 cor_val_bx">
                    @if ($cmsDetails[0]->short_description != null)
                        {!! $cmsDetails[0]->short_description !!}
                    @endif
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 cor_val_bx">
                        <div class="value_box">
                            <div class="left_val">
                            @if ($coreValueList[0]->image != null)
                                @if (file_exists(public_path('/images/uploads/'.$coreValueStorage.'/'.$coreValueList[0]->image)))
                                    <figure><img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$coreValueStorage.'/'.$coreValueList[0]->image) }}" alt="{!! $coreValueList[0]->title !!}"></figure>
                                @endif
                            @endif
                            </div>
                            <div class="right_val">
                                <h4>{!! $coreValueList[0]->title !!}</h4>
                                <p>{!! $coreValueList[0]->short_title !!}</p>
                            </div>
                        </div>
                        <p>{!! $coreValueList[0]->short_description !!}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 cor_val_bx">
                        <div class="value_box">
                            <div class="left_val">
                            @if ($coreValueList[1]->image != null)
                                @if (file_exists(public_path('/images/uploads/'.$coreValueStorage.'/'.$coreValueList[1]->image)))
                                    <figure><img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$coreValueStorage.'/'.$coreValueList[1]->image) }}" alt="{!! $coreValueList[1]->title !!}"></figure>
                                @endif
                            @endif
                            </div>
                            <div class="right_val">
                                <h4>{!! $coreValueList[1]->title !!}</h4>
                                <p>{!! $coreValueList[1]->short_title !!}</p>
                            </div>
                        </div>
                        <p>{!! $coreValueList[1]->short_description !!}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-5 cor_val_bx">
                        <div class="value_box">
                            <div class="left_val">
                            @if ($coreValueList[2]->image != null)
                                @if (file_exists(public_path('/images/uploads/'.$coreValueStorage.'/'.$coreValueList[2]->image)))
                                    <figure><img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$coreValueStorage.'/'.$coreValueList[2]->image) }}" alt="{!! $coreValueList[2]->title !!}"></figure>
                                @endif
                            @endif
                            </div>
                            <div class="right_val">
                                <h4>{!! $coreValueList[2]->title !!}</h4>
                                <p>{!! $coreValueList[2]->short_title !!}</p>
                            </div>
                        </div>
                        <p>{!! $coreValueList[2]->short_description !!}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3 cor_val_bx">
                        <div class="value_box">
                            <div class="left_val">
                            @if ($coreValueList[3]->image != null)
                                @if (file_exists(public_path('/images/uploads/'.$coreValueStorage.'/'.$coreValueList[3]->image)))
                                    <figure><img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$coreValueStorage.'/'.$coreValueList[3]->image) }}" alt="{!! $coreValueList[3]->title !!}"></figure>
                                @endif
                            @endif
                            </div>
                            <div class="right_val">
                                <h4>{!! $coreValueList[3]->title !!}</h4>
                                <p>{!! $coreValueList[3]->short_title !!}</p>
                            </div>
                        </div>
                        <p>{!! $coreValueList[3]->short_description !!}</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4 cor_val_bx">
                        <div class="value_box">
                            <div class="left_val">
                            @if ($coreValueList[4]->image != null)
                                @if (file_exists(public_path('/images/uploads/'.$coreValueStorage.'/'.$coreValueList[4]->image)))
                                    <figure><img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$coreValueStorage.'/'.$coreValueList[4]->image) }}" alt="{!! $coreValueList[4]->title !!}"></figure>
                                @endif
                            @endif
                            </div>
                            <div class="right_val">
                                <h4>{!! $coreValueList[4]->title !!}</h4>
                                <p>{!! $coreValueList[4]->short_title !!}</p>
                            </div>
                        </div>
                        <p>{!! $coreValueList[4]->short_description !!}</p>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @if ($teamList->count())
        <div class="our_team_section">
            <div class="container">
                @if ($cmsDetails[1]->title != null)
                <h2 class="text-center">{!! $cmsDetails[1]->title !!}</h2>
                @endif
                @foreach ($teamList as $keyTeam => $itemTeam)
                <div class="our_team_area">
                    <div class="our_team_inner">
                        @if ($itemTeam->image != null)
                            @if (file_exists(public_path('/images/uploads/'.$teamMemberStorage.'/thumbs/'.$itemTeam->image)))
                                <div class="team_img">
                                    <img class="lazy" src="{{ asset('images/site/blank.png') }}" data-src="{{ asset('/images/uploads/'.$teamMemberStorage.'/thumbs/'.$itemTeam->image) }}" alt="{{ $itemTeam->name }}">
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
                        {!! $itemTeam->description !!}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endif
    </div>
    
    @include('site.includes.footer')

@endsection