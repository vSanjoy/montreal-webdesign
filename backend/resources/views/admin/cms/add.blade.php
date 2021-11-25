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
								'route' => [$routePrefix.'.'.$addUrl.'-submit'],
								'name'  => 'createCmsForm',
								'id'    => 'createCmsForm',
								'files' => true,
								'novalidate' => true ]) }}
						<div class="form-body mt-4-5">
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
												<label class="text-dark font-bold">@lang('custom_admin.label_page_name')<span class="red_star">*</span></label>
												{{ Form::text('page_name['.$langKey.']', null, [
																				'id' => 'page_name_'.$langKey,
																				'dir' => $direction,
																				'placeholder' => '',
																				'class' => 'form-control',
																				'required' => 'required',
																			]) }}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_title')<span class="red_star">*</span></label>
												{{ Form::text('title['.$langKey.']', null, [
																				'id' => 'title_'.$langKey,
																				'dir' => $direction,
																				'placeholder' => '',
																				'class' => 'form-control',
																				'required' => 'required',
																			]) }}
											</div>
										</div>
									</div>
									<div class="row mt-1">
										<div class="col-md-12">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_short_title')</label>
												{{ Form::text('short_title['.$langKey.']', null, [
																							'id' => 'short_title_'.$langKey,
																							'dir' => $direction,
																							'placeholder' => '',
																							'class' => 'form-control'
																						]) }}
											</div>
										</div>
									</div>
									<div class="row mt-1">
										<div class="col-md-12">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_short_description')</label>
												{{ Form::textarea('short_description['.$langKey.']', null, [
																							'id' => 'short_description_'.$langKey,
																							'dir' => $direction,
																							'placeholder' => '',
																							'class' => 'form-control',
																							'rows' => 3
																						]) }}
											</div>
										</div>
									</div>
									<div class="row mt-1">
										<div class="col-md-12">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_description')</label>
												{{ Form::textarea('description['.$langKey.']', null, [
																					'id' => 'description_'.$langKey,
																					'dir' => $direction,
																					'class' => 'form-control',
																					'placeholder' => '',
																					'rows' => 3
																				]) }}
											</div>
										</div>
									</div>
									{{-- <div class="row mt-1">
										<div class="col-md-12">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_description') 2</label>
												{{ Form::textarea('description2['.$langKey.']', null, [
																					'id' => 'description2_'.$langKey,
																					'dir' => $direction,
																					'class' => 'form-control',
																					'placeholder' => '',
																					'rows' => 3
																				]) }}
											</div>
										</div>
									</div> --}}
									<div class="row mt-1">
										<div class="col-md-12">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_other_description')</label>
												{{ Form::textarea('other_description['.$langKey.']', null, [
																					'id' => 'other_description_'.$langKey,
																					'dir' => $direction,
																					'class' => 'form-control',
																					'placeholder' => '',
																					'rows' => 3
																				]) }}
											</div>
										</div>
									</div>
									<div class="row mt-1">
										<div class="col-md-6">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_banner_title')</label>
												{{ Form::text('banner_title['.$langKey.']', null, [
																					'id' => 'banner_title_'.$langKey,
																					'dir' => $direction,
																					'placeholder' => '',
																					'class' => 'form-control',
																					]) }}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_banner_short_title')</label>
												{{ Form::text('banner_short_title['.$langKey.']', null, [
																						'id' => 'banner_short_title_'.$langKey,
																						'dir' => $direction,
																						'placeholder' => '',
																						'class' => 'form-control',
																					]) }}
											</div>
										</div>
									</div>
									<div class="row mt-1">
										<div class="col-md-12">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_banner_short_description')</label>
												{{ Form::textarea('banner_short_description['.$langKey.']', null, [
																									'id' => 'banner_short_description_'.$langKey,
																									'dir' => $direction,
																									'placeholder' => '',
																									'class' => 'form-control',
																									'rows' => 3
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
												<label class="text-dark font-bold">@lang('custom_admin.label_banner_image')</label>
												{{ Form::file('banner_image', [
																				'id' => 'banner_image',
																				'class' => 'form-control upload-image',
																				'placeholder' => 'Upload Image',
																			]) }}
											</div>
										</div>
										<div class="col-md-4">
											<div class="preview_img_div_banner_image">
												<img id="banner_image_preview" class="mt-2" style="display: none;" />
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_featured_image')</label>
												{{ Form::file('featured_image', [
																		'id' => 'featured_image',
																		'class' => 'form-control upload-image',
																		'placeholder' => 'Upload Image',
																	]) }}
											</div>
										</div>
										<div class="col-md-4">
											<div class="preview_img_div_featured_image">											
												<img id="featured_image_preview" class="mt-2" style="display: none;" />											
											</div>
										</div>
									</div>
								</div>
							</div>
							{{-- <div class="row mt-1">
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-8">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_image')</label>
												{{ Form::file('other_image', [
																				'id' => 'other_image',
																				'class' => 'form-control upload-image',
																				'placeholder' => 'Upload Image',
																			]) }}
											</div>
										</div>
										<div class="col-md-4">
											<div class="preview_img_div_other_image">
												<img id="other_image_preview" class="mt-2" style="display: none;" />
											</div>
										</div>
									</div>
								</div>
							</div> --}}
						</div>
						<div class="form-actions mt-4">
							<div class="float-left">
								<a class="btn btn-secondary waves-effect waves-light btn-rounded shadow-md pr-3 pl-3" href="{{ route($routePrefix.'.'.$listUrl) }}">
									<i class="far fa-arrow-alt-circle-left"></i> @lang('custom_admin.btn_cancel')
								</a>
							</div>
							<div class="float-right">
								<button type="submit" id="btn-processing" class="btn btn-success waves-effect waves-light btn-rounded shadow-md pr-3 pl-3">
									<i class="far fa-save" aria-hidden="true"></i> @lang('custom_admin.btn_submit')
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