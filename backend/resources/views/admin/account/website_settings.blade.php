@extends('admin.layouts.app', ['title' => $panelTitle])

@section('content')

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">{{ $pageTitle }}</h4>
					{{ Form::open([
						'method'=> 'POST',
						'class' => '',
						'route' => [$routePrefix.'.website-settings'],
						'name'  => 'updateWebsiteSettingsForm',
						'id'    => 'updateWebsiteSettingsForm',
						'files' => true,
						'novalidate' => true]) }}
						<div class="form-body mt-4-5">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_from_email')<span class="red_star">*</span></label>
										{{ Form::text('from_email', $websiteSettings['from_email'] ?? null, array(
																		'id' => 'email',
																		'class' => 'form-control',
																		'placeholder' => '',
																		'required' => 'required' )) }}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_to_email')<span class="red_star">*</span></label>
										{{ Form::text('to_email', $websiteSettings['to_email'] ?? null, array(
																		'id' => 'to_email',
																		'class' => 'form-control',
																		'placeholder' => '',
																		'required' => 'required' )) }}
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_phone_number')</label>
										{{ Form::text('phone_no', $websiteSettings['phone_no'] ?? null, array(
																		'id' => 'phone_no',
																		'class' => 'form-control',
																		'placeholder' => '' )) }}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_fax')</label>
										{{ Form::text('fax', $websiteSettings['fax'] ?? null, array(
																		'id' => 'fax',
																		'class' => 'form-control',
																		'placeholder' => '' )) }}
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_facebook_link')</label>
										{{ Form::text('facebook_link', $websiteSettings['facebook_link'] ?? null, array(
																						'id' => 'facebook_link',
																						'class' => 'form-control',
																						'placeholder' => '' )) }}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_twitter_link')</label>
										{{ Form::text('twitter_link', $websiteSettings['twitter_link'] ?? null, array(
																						'id' => 'twitter_link',
																						'class' => 'form-control',
																						'placeholder' => '' )) }}
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_instagram_link')</label>
										{{ Form::text('instagram_link', $websiteSettings['instagram_link'] ?? null, array(
                                                            'id' => 'instagram_link',
                                                            'class' => 'form-control',
                                                            'placeholder' => '' )) }}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_linkedin_link')</label>
										{{ Form::text('linkedin_link', $websiteSettings['linkedin_link'] ?? null, array(
                                                            'id' => 'linkedin_link',
                                                            'class' => 'form-control',
                                                            'placeholder' => '' )) }}
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_pinterest_link')</label>
										{{ Form::text('pinterest_link', $websiteSettings['pinterest_link'] ?? null, array(
                                                            'id' => 'pinterest_link',
                                                            'class' => 'form-control',
                                                            'placeholder' => '' )) }}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_googleplus_link')</label>
										{{ Form::text('googleplus_link', $websiteSettings['googleplus_link'] ?? null, array(
                                                            'id' => 'googleplus_link',
                                                            'class' => 'form-control',
                                                            'placeholder' => '' )) }}
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_youtube_link')</label>
										{{ Form::text('youtube_link', $websiteSettings['youtube_link'] ?? null, array(
                                                            'id' => 'youtube_link',
                                                            'class' => 'form-control',
                                                            'placeholder' => '' )) }}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_rss_link')</label>
										{{ Form::text('rss_link', $websiteSettings['rss_link'] ?? null, array(
                                                            'id' => 'rss_link',
                                                            'class' => 'form-control',
                                                            'placeholder' => '' )) }}
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_dribble_link')</label>
										{{ Form::text('dribble_link', $websiteSettings['dribble_link'] ?? null, array(
                                                            'id' => 'dribble_link',
                                                            'class' => 'form-control',
                                                            'placeholder' => '' )) }}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_tumblr_link')</label>
										{{ Form::text('tumblr_link', $websiteSettings['tumblr_link'] ?? null, array(
                                                            'id' => 'tumblr_link',
                                                            'class' => 'form-control',
                                                            'placeholder' => '' )) }}
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_map')</label>
										{{ Form::textarea('map', $websiteSettings['map'] ?? null, array(
                                                            'id' => 'map',
                                                            'class' => 'form-control',
                                                            'rows'	=> 4,
                                                            'placeholder' => '' )) }}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_toll_free')</label>
										{{ Form::text('toll_free', $websiteSettings['toll_free'] ?? null, array(
                                                            'id' => 'toll_free',
                                                            'class' => 'form-control',
                                                            'placeholder' => '' )) }}
									</div>
								</div>
							</div>

							<ul class="nav nav-tabs nav-justified nav-bordered mb-3" id="lang-tabs">
								@php
								$tab = 0;
								foreach ($websiteLanguages as $langKey => $langVal) :
									$direction = 'ltr';
								@endphp
								<li class="nav-item">
									<a href="#tab-{{$langKey}}" data-toggle="tab" aria-expanded="false" class="nav-link @if ($tab == 0)active @endif">
										<i class="mdi mdi-home-variant d-lg-none d-block mr-1"></i>
										<span class="d-none d-lg-block">{{ $langVal }}</span>
									</a>
								</li>
								@php
									$tab++;
								endforeach;
								@endphp
							</ul>
							<div class="tab-content">
								@php
								$tab = 0;
								foreach ($websiteLanguages as $langKey => $langVal) :
									$direction = 'ltr';
								@endphp
								<div class="tab-pane @if ($tab == 0)active @endif" id="tab-{{$langKey}}">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_website_title')<span class="red_star">*</span></label>
												{{ Form::text('website_title['.$langKey.']', $websiteSettings->getTranslation('website_title', $langKey) ?? null, [
																				'id' => 'website_title_'.$langKey,
																				'dir' => $direction,
																				'placeholder' => '',
																				'class' => 'form-control',
																				'required' => 'required',
																			]) }}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_tag_line')</label>
												{{ Form::text('tag_line['.$langKey.']', $websiteSettings->getTranslation('tag_line', $langKey) ?? null, [
																				'id' => 'tag_line_'.$langKey,
																				'dir' => $direction,
																				'placeholder' => '',
																				'class' => 'form-control',
																				'rows'	=> 3
																			]) }}
											</div>
										</div>
									</div>
									<div class="row mt-1">
										<div class="col-md-12">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_address')</label>
												{{ Form::textarea('address['.$langKey.']', $websiteSettings->getTranslation('address', $langKey) ?? null, [
																	'id' => 'address_'.$langKey,
																	'dir' => $direction,
																	'placeholder' => '',
																	'class' => 'form-control',
																	'rows'	=> 5
																]) }}
											</div>
										</div>
									</div>
									<div class="row mt-1">
										<div class="col-md-6">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_footer_address')</label>
												{{ Form::textarea('footer_address['.$langKey.']', $websiteSettings->getTranslation('footer_address', $langKey) ?? null, [
																						'id' => 'footer_address_'.$langKey,
																						'dir' => $direction,
																						'placeholder' => '',
																						'class' => 'form-control',
																						'rows'	=> 3
																					]) }}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_copyright_text')</label>
												{{ Form::textarea('copyright_text['.$langKey.']', $websiteSettings->getTranslation('copyright_text', $langKey) ?? null, [
																						'id' => 'copyright_text_'.$langKey,
																						'dir' => $direction,
																						'placeholder' => '',
																						'class' => 'form-control',
																						'rows'	=> 3
																					]) }}
											</div>
										</div>
									</div>
								</div>
								@php
									$tab++;
								endforeach;
								@endphp
							</div>

							<hr>
							<div class="row mt-4">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_logo')</label>
												{{ Form::file('logo', array(
																		'id' => 'logo',
																		'class' => 'form-control upload-image',
																		'placeholder' => 'Upload Image',
																		)) }}
											</div>
										</div>
										<div class="col-md-4">
											<div class="preview_img_div_logo">
												<label class="text-dark font-bold">&nbsp;</label>
												<img id="logo_preview" class="mt-2" style="display: none;" />
											@if (isset($websiteSettings->logo) && $websiteSettings->logo != null)
												@if (file_exists(public_path('/images/uploads/'.$pageRoute.'/'.$websiteSettings->logo)))
													<div class="image-preview-holder" id="image_holder_logo">
														<a data-fancybox="gallery" href="{{ asset('images/uploads/'.$pageRoute.'/'.$websiteSettings->logo) }}">
															<img class="image-preview-border" id="logo_preview mt-2" src="{{ asset('images/uploads/'.$pageRoute.'/'.$websiteSettings->logo) }}" width="180" height="" />
														</a>														
														{{-- <span class="delete-preview-image delete-uploaded-preview-image" data-primaryid="{{ $websiteSettings->id }}" data-imageid="logo_preview" data-dbfield="logo" data-routeprefix="{{ $pageRoute }}"><i class="fa fa-trash"></i></span> --}}
													</div>
												@endif												
											@endif
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_footer_logo')</label>
												{{ Form::file('footer_logo', array(
																			'id' => 'footer_logo',
																			'class' => 'form-control upload-image',
																			'placeholder' => 'Upload Image',
																			)) }}
											</div>
										</div>
										<div class="col-md-4">
											<div class="preview_img_div_footer_logo">
												<label class="text-dark font-bold">&nbsp;</label>
												<img id="footer_logo_preview" class="mt-2" style="display: none;" />
											@if (isset($websiteSettings->footer_logo) && $websiteSettings->footer_logo != null)
												@if (file_exists(public_path('/images/uploads/'.$pageRoute.'/'.$websiteSettings->footer_logo)))
													<div class="image-preview-holder" id="image_holder_footer_logo">
														<a data-fancybox="gallery" href="{{ asset('images/uploads/'.$pageRoute.'/'.$websiteSettings->footer_logo) }}">
															<img class="image-preview-border" id="footer_logo_preview mt-2" src="{{ asset('images/uploads/'.$pageRoute.'/'.$websiteSettings->footer_logo) }}" width="180" height="" />
														</a>
														{{-- <span class="delete-preview-image delete-uploaded-preview-image" data-primaryid="{{ $websiteSettings->id }}" data-imageid="footer_logo_preview" data-dbfield="footer_logo" data-routeprefix="{{ $pageRoute }}"><i class="fa fa-trash"></i></span> --}}
													</div>
												@endif
											@endif
											</div>
										</div>
									</div>
								</div>
							</div>


						</div>
						<div class="form-actions mt-4">
							<div class="float-left">
								<a class="btn btn-secondary waves-effect waves-light btn-rounded shadow-md pr-3 pl-3" href="{{ route($routePrefix.'.dashboard') }}">
									<i class="far fa-arrow-alt-circle-left"></i> @lang('custom_admin.btn_cancel')
								</a>
							</div>
							<div class="float-right">
								<button type="submit" id="btn-processing" class="btn btn-success waves-effect waves-light btn-rounded shadow-md pr-3 pl-3">
									<i class="far fa-save" aria-hidden="true"></i> @lang('custom_admin.btn_update')
								</button>
							</div>
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

@endsection

@push('scripts')
@include($routePrefix.'.includes.image_preview')
@endpush
