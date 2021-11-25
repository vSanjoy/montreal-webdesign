@extends('admin.layouts.app', ['title' => $panelTitle])

@section('content')

	@php
	$selectedCatIds	= old('category_ids') ?? [];
	@endphp

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">{{ $pageTitle }}</h4>
					{{ Form::open([
						'method'=> 'POST',
						'class' => '',
						'route' => [$routePrefix.'.'.$addUrl.'-submit'],
						'name'  => 'createPortfolioForm',
						'id'    => 'createPortfolioForm',
						'files' => true,
						'novalidate' => true]) }}
						<div class="form-body mt-4-5">
							<div class="row mt-1">
								<div class="col-md-12">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_menu_category')<span class="red_star">*</span></label>
										<select multiple class="selectpicker form-control" id="category_ids" name="category_ids[]" data-container="body" data-live-search="true" title="--@lang('custom_admin.label_select')--" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" required>
									@if (count($categoryList))
										@foreach ($categoryList as $keyCategory => $valCategory)
											<option value="{{ $valCategory->id }}" @if (in_array($valCategory->id, $selectedCatIds))selected @endif>{{ $valCategory->title }}</option>
										@endforeach
									@endif
										</select>
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
												<label class="text-dark font-bold">@lang('custom_admin.label_title')<span class="red_star">*</span></label>
												{{ Form::text('title['.$langKey.']', null, [
																				'id' => 'title_'.$langKey,
																				'dir' => $direction,
																				'placeholder' => '',
																				'class' => 'form-control',
																				'required' => true,
																			]) }}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_short_title')</label>
												{{ Form::text('short_title['.$langKey.']', null, [
																				'id' => 'short_title_'.$langKey,
																				'dir' => $direction,
																				'placeholder' => '',
																				'class' => 'form-control',
																			]) }}
											</div>
										</div>
									</div>
									<div class="row mt-1">
										<div class="col-md-6">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_role')</label>
												{{ Form::textarea('roles['.$langKey.']', null, [
																								'id' => 'roles'.$langKey,
																								'dir' => $direction,
																								'placeholder' => '',
																								'class' => 'form-control',
																								'rows'	=> 3,
																							]) }}
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_short_description')</label>
												{{ Form::textarea('short_description['.$langKey.']', null, [
																									'id' => 'short_description_'.$langKey,
																									'dir' => $direction,
																									'placeholder' => '',
																									'class' => 'form-control',
																									'rows'	=> 3,
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
																									'placeholder' => '',
																									'class' => 'form-control',
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
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_is_featured')</label>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" name="is_featured" value="Y" class="cursor-pointer" id="customCheck_1">
											<label class="text-dark cursor-pointer va-top ml-1" for="customCheck_1">@lang('custom_admin.btn_yes')</label>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_site_link')</label>
										{{ Form::text('site_link', null, [
																		'id' => 'site_link',
																		'placeholder' => '',
																		'class' => 'form-control',
																	]) }}
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-12">
									<div class="row">
										<div class="col-md-10">
											<div class="form-group">
												<label class="text-dark font-bold">@lang('custom_admin.label_image')<span class="red_star">*</span></label>
												{{ Form::file('image', [
																		'id' => 'image',
																		'class' => 'form-control upload-image',
																		'placeholder' => 'Upload Image',
																		'required' => true,
																	]) }}
											</div>
										</div>
										<div class="col-md-2">
											<div class="preview_img_div_image">
												<img id="image_preview" class="mt-2" style="display: none;" />
											</div>
										</div>
									</div>
								</div>
							</div>
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
