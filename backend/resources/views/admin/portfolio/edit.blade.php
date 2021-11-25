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
						'route' => [$routePrefix.'.'.$editUrl.'-submit', $id],
						'name'  => 'updatePortfolioForm',
						'id'    => 'updatePortfolioForm',
						'files' => true,
						'novalidate' => true ]) }}

						{{ Form::hidden('id', $id, ['id' => 'id', 'class' => 'form-control']) }}

						<div class="form-body mt-4-5">
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_menu_category')<span class="red_star">*</span></label>
										<select multiple class="selectpicker form-control" id="category_ids" name="category_ids[]" data-container="body" data-live-search="true" title="--@lang('custom_admin.label_select')--" data-hide-disabled="true" data-actions-box="true" data-virtual-scroll="false" required>
									@if (count($categoryList))
										@foreach ($categoryList as $keyCategory => $valCategory)
											<option value="{{ $valCategory->id }}" @if (in_array($valCategory->id, $portfolioCategoryIds))selected @endif>{{ $valCategory->title }}</option>
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
												{{ Form::text('title['.$langKey.']', $details->getTranslation('title', $langKey), [
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
												{{ Form::text('short_title['.$langKey.']', $details->getTranslation('short_title', $langKey), [
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
												{{ Form::textarea('roles['.$langKey.']', $details->getTranslation('roles', $langKey), [
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
												{{ Form::textarea('short_description['.$langKey.']', $details->getTranslation('short_description', $langKey), [
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
												{{ Form::textarea('description['.$langKey.']', $details->getTranslation('description', $langKey), [
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
											<input type="checkbox" name="is_featured" value="Y" class="cursor-pointer" id="customCheck_1" @if ($details->is_featured == 'Y')checked @endif>
											<label class="text-dark cursor-pointer va-top ml-1" for="customCheck_1">@lang('custom_admin.btn_yes')</label>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_site_link')</label>
										{{ Form::text('site_link', $details->site_link, [
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
												<label class="text-dark font-bold">@lang('custom_admin.label_image')</label>
												{{ Form::file('image', [
																		'id' => 'image',
																		'class' => 'form-control upload-image',
																		'placeholder' => 'Upload Image',
																	]) }}
											</div>
										</div>
										<div class="col-md-2">
											<div class="preview_img_div_image">
												<label class="text-dark font-bold">&nbsp;</label>
												<img id="image_preview" class="mt-2" style="display: none;" />
											@if ($details->image != null)
												@if (file_exists(public_path('/images/uploads/'.$pageRoute.'/'.$details->image)))
													<div class="image-preview-holder" id="image_holder_image">
														<a data-fancybox="gallery" href="{{ asset('images/uploads/'.$pageRoute.'/'.$details->image) }}">
															<img class="image-preview-border" id="image_preview mt-2" src="{{ asset('images/uploads/'.$pageRoute.'/'.$details->image) }}" width="70" />
														</a>
														{{-- <span class="delete-preview-image delete-uploaded-preview-image" data-primaryid="{{ $id }}" data-imageid="image_preview" data-dbfield="image" data-routeprefix="{{ $pageRoute }}"><i class="fa fa-trash"></i></span> --}}
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
								<a class="btn btn-secondary waves-effect waves-light btn-rounded shadow-md pr-3 pl-3" href="{{ route($routePrefix.'.'.$listUrl) }}">
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