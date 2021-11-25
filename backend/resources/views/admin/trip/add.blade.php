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
						'name'  => 'createTripForm',
						'id'    => 'createTripForm',
						'files' => true,
						'novalidate' => true]) }}
						<div class="form-body mt-4-5">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_menu_category')<span class="red_star">*</span></label>
										<select class="selectpicker form-control" id="category_id" name="category_id" data-container="body" data-live-search="true" title="--@lang('custom_admin.label_select')--" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" required>
									@if (count($categoryList))
										@foreach ($categoryList as $keyCategory => $valCategory)
											<option value="{{ $valCategory->id }}" @if (old('category_id') == $valCategory->id)selected @endif>{{ $valCategory->title }}</option>
										@endforeach
									@endif
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_menu_location')<span class="red_star">*</span></label>
										<select class="selectpicker form-control" id="location_id" name="location_id" data-container="body" data-live-search="true" title="--@lang('custom_admin.label_select')--" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" required>
									@if (count($locationList))
										@foreach ($locationList as $keyLocation => $valLocation)
											<option value="{{ $valLocation->id }}" @if (old('location_id') == $valLocation->id)selected @endif>{{ $valLocation->location }}</option>
										@endforeach
									@endif
										</select>
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_menu_vendor')<span class="red_star">*</span></label>
										<select class="selectpicker form-control" id="vendor_id" name="vendor_id" data-container="body" data-live-search="true" title="--@lang('custom_admin.label_select')--" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" required>
									@if (count($vendorList))
										@foreach ($vendorList as $keyVendor => $valVendor)
											<option value="{{ $valVendor->id }}" @if (old('vendor_id') == $valVendor->id)selected @endif>{!! $valVendor->full_name,' ('.$valVendor->email.')' !!}</option>
										@endforeach
									@endif
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_number_of_persons')<span class="red_star">*</span></label>
										<select class="selectpicker form-control" id="number_of_persons" name="number_of_persons" data-container="body" data-live-search="true" title="--@lang('custom_admin.label_select')--" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" required>
										@for ($k = 1; $k <= 10; $k++)
											<option value="{{ $k }}" @if (old('number_of_persons') == $k)selected @endif>{{ $k }}</option>
										@endfor
										</select>
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_date_time')<span class="red_star">*</span></label>
										{{ Form::text('date_time', old('date_time') ?? null, [
																		'id' => 'date_time',
																		'placeholder' => '',
																		'class' => 'form-control dateRangePicker',
																		'required' => true,
																	]) }}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_amount')<span class="red_star">*</span></label>
										{{ Form::text('amount', 0, array(
																	'id' => 'amount',
																	'class' => 'form-control',
																	'placeholder' => '',
																	'required' => true )) }}
									</div>
								</div>
							</div>
							<ul class="nav nav-tabs nav-justified nav-bordered mb-3" id="lang-tabs">
								@php
								$tab = 0;
								foreach ($websiteLanguages as $langKey => $langVal) :
									$direction = 'ltr'; if ($langKey == 'ar') : $direction = 'rtl'; endif;
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
									$direction = 'ltr'; if ($langKey == 'ar') : $direction = 'rtl'; endif;
								@endphp
								<div class="tab-pane @if ($tab == 0)active @endif" id="tab-{{$langKey}}">
									<div class="row">
										<div class="col-md-12">
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
												<label class="text-dark font-bold">@lang('custom_admin.label_terms_conditions')</label>
												{{ Form::textarea('terms_conditions['.$langKey.']', null, [
																									'id' => 'description2_'.$langKey,
																									'dir' => $direction,
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
							<div class="row mt-1">
								<div class="col-md-3">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_is_featured')</label>
										<div class="custom-control custom-checkbox">
											<input type="checkbox" name="is_featured" value="Y" class="cursor-pointer" id="customCheck_1" @if (old('is_featured') == 'Y')checked @endif>
											<label class="text-dark cursor-pointer va-top ml-1" for="customCheck_1">@lang('custom_admin.btn_yes')</label>
										</div>
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-12">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_video')</label>
										{{ Form::textarea('video', null, [
																		'id' => 'video',
																		'placeholder' => '',
																		'class' => 'form-control',
																		'rows'	=> 3,
																	]) }}
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
