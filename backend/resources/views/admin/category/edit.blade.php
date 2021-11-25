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
						'name'  => 'updateCategoryForm',
						'id'    => 'updateCategoryForm',
						'files' => true,
						'novalidate' => true ]) }}

						{{ Form::hidden('id', $id, ['id' => 'id', 'class' => 'form-control']) }}

						<div class="form-body mt-4-5">
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
												{{ Form::text('title['.$langKey.']', $details->getTranslation('title', $langKey), [
																				'id' => 'title_'.$langKey,
																				'dir' => $direction,
																				'placeholder' => '',
																				'class' => 'form-control',		// slug-generation class is to call generate slug function
																				// 'data-model'	=> $modelName,	// Used in generate slug
																				'required' => true,
																			]) }}
											</div>
										</div>
									</div>
									<div class="row mt-1">
										<div class="col-md-12">
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
							<div class="row mt-4">
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
												<img id="image_preview" class="mt-2" style="display: none;" />
											@if ($details->image != null)
												@if (file_exists(public_path('/images/uploads/'.$pageRoute.'/'.$details->image)))
													<div class="image-preview-holder" id="image_holder_image">
														<a data-fancybox="gallery" href="{{ asset('images/uploads/'.$pageRoute.'/'.$details->image) }}">
															<img class="image-preview-border" id="image_preview mt-2" src="{{ asset('images/uploads/'.$pageRoute.'/'.$details->image) }}" width="180" height="110" />
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