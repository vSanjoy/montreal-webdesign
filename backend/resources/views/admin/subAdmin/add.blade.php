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
						'name'  => 'createSubAdminForm',
						'id'    => 'createSubAdminForm',
						'files' => true,
						'novalidate' => true ]) }}
						<div class="form-body mt-4-5">
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_first_name')<span class="red_star">*</span></label>
										{{ Form::text('first_name', null, [
                                                                'id' => 'first_name',
                                                                'class' => 'form-control',
                                                                'placeholder' => '',
                                                                'required' => 'required' ]) }}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_last_name')<span class="red_star">*</span></label>
										{{ Form::text('last_name', null, [
                                                                'id' => 'last_name',
                                                                'class' => 'form-control',
                                                                'placeholder' => '',
                                                                'required' => 'required' ]) }}
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_email')<span class="red_star">*</span></label>
										{{ Form::text('email', null, [
                                                                'id' => 'email',
                                                                'class' => 'form-control',
                                                                'placeholder' => '',
                                                                'required' => 'required' ]) }}
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_phone_number')<span class="red_star">*</span></label>
										{{ Form::text('phone_no', null, [
                                                                'id' => 'phone_no',
                                                                'class' => 'form-control',
                                                                'placeholder' => '',
                                                                'required' => 'required' ]) }}
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_new_password')<span class="red_star">*</span></label>
										{{ Form::password('password',array(
																		'id' => 'password',
																		'class' => 'form-control password-checker',
																		'data-pcid'	=> 'new-password-checker',
																		'placeholder' => '',
																		'required' => 'required' )) }}
									</div>
									<div class="progress" id="new-password-checker">
										<div class="progress" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_confirm_password')<span class="red_star">*</span></label>
										{{ Form::password('confirm_password', array(
																				'id' => 'confirm_password',
																				'class' => 'form-control',
																				'placeholder' => '',
																				'required' => 'required' )) }}
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-12">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_role')<span class="red_star">*</span></label>
										<select class="form-control select2" id="role" name="role[]" multiple="multiple">
									@if (count($roleList) > 0)
										@foreach ($roleList as $role)
											<option value="{{$role->id}}">{{$role->name}}</option>
										@endforeach
									@endif                                
										</select>
									</div>
								</div>
							</div>
							<div class="row mt-1">
								<div class="col-md-6">
									<div class="form-group">
										<label class="text-dark font-bold">@lang('custom_admin.label_profile_pic')</label>
										{{ Form::file('profile_pic', [
																	'id' => 'upload_image',
																	'class' => 'form-control',
																	'placeholder' => 'Upload Image',
																	]) }}
									</div>
									<div id="image-preview" class=""></div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="exampleInputFile">&nbsp;</label>
										<span class="btn btn-light btn-md btn-block crop_image mb-14">
											<i data-feather="crop" class="feather-icon"></i> @lang('custom_admin.label_crop_image')
										</span>
										{!! Form::hidden('cropped_image', null, ['id' => 'image-code-after-crop']) !!}

										<div id="preview-crop-image" class="preview-image" style="height: {{ config('global.IMAGE_CONTAINER') }}px; padding: 49px 2px 20px 2px; position: relative;"></div>
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
@include($routePrefix.'.includes.cropper')
@endpush