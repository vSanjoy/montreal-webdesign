@extends('admin.layouts.app', ['title' => $panelTitle])

@section('content')

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<h4 class="card-title">{{ $pageTitle }}</h4>					
					{{ Form::open(array(
                        'method'=> 'POST',
                        'class' => 'dropzone',
                        'route' => [$routePrefix.'.'.$pageRoute.'.save-gallery', $id],
                        'id'    => 'dropzone',
                        'files' => true,
                        'autocomplete' => 'off',
                        'novalidate' => true)) }}
                    {{Form::close()}}

                    <div class="form-actions mt-4">
                        <div class="float-left">
                            <a class="btn btn-secondary waves-effect waves-light btn-rounded shadow-md pr-3 pl-3" href="{{ route($routePrefix.'.'.$listUrl) }}">
                                <i class="far fa-arrow-alt-circle-left"></i> @lang('custom_admin.btn_cancel')
                            </a>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-success waves-effect waves-light btn-rounded shadow-md pr-3 pl-3" href="{{ route($routePrefix.'.'.$pageRoute.'.gallery', $id) }}">
                                <i class="fas fa-sync-alt" aria-hidden="true"></i> @lang('custom_admin.btn_reload_gallery')
                            </a>
                        </div>
                        <div class="clearfix">&nbsp;</div>
                        <div class="float-left"><small>@lang('custom_admin.message_gallery_note')</small></div>
                    </div>
				</div>
			</div>
		</div>
	</div>

    @if ($gallery->count())
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        {{-- <div class="card-header"></div> --}}
                        <div class="card card-solid">
                            <div class="card-body pb-0">
                                <div class="row d-flex align-items-stretch">
                            @foreach ($gallery as $row)
                                @php
                                $image = $url = '';
                                if (file_exists(public_path('images/uploads/gallery/'.$pageRoute.'/'.$row->image))) {
                                    $url = asset("images/uploads/gallery/".$pageRoute."/".$row->image);
                                    $image = '<img src="'.asset("images/uploads/gallery/".$pageRoute."/thumbs/".$row->image).'" />';
                                }
                                $defaultTitle = trans('custom_admin.label_set_default');
                                if ($row->default_image == 'Y') {
                                    $defaultTitle = trans('custom_admin.label_default');
                                }
                                @endphp
                                @if ($image)
                                    <div class="col-12 col-sm-6 col-md-4 align-items-stretch" id="image_{{$row->id}}">
                                        <div class="card bg-light">
                                            <div class="card-header text-muted border-bottom-0">&nbsp;</div>
                                            <div class="card-body pt-0 pb-0" style="background-color:#e8eaec;">
                                                <div class="row">
                                                    <div class="col-12 text-center">
                                                        <a href="{{$url}}" data-toggle="lightbox" data-gallery="gallery">
                                                            {!! $image !!}
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-center">
                                                    <span class="btn btn-warning btn-circle btn-circle-sm radio-holder-default-gallery" title="{{$defaultTitle}}">
                                                        <div class="icheck-warning d-inline radio-margin">
                                                            <input type="radio" data-microtip-position="top" role="tooltip" id="radioPrimary{{$row->id}}" name="default_image" class="setDefault cursor-pointer" aria-label="{{trans('custom_admin.label_default')}}" data-rowid="{{$row->id}}" data-id="{{customEncryptionDecryption($row->id)}}" data-tripid="{{customEncryptionDecryption($row->trip_id)}}" data-action-type='set-default' @if ($row->default_image == 'Y')checked @endif title="{{trans('custom_admin.label_default')}}">
                                                            <label for="radioPrimary{{$row->id}}" class="radioDefault"></label>
                                                        </div>
                                                    </span>
                                                @if ($row->default_image != 'Y')
                                                    &nbsp;
                                                    <a href="javascript: void(0);" data-microtip-position="top" role="tooltip" class="btn btn-danger btn-circle btn-circle-sm deleteImage delete_block_{{$row->id}}" aria-label="{{trans('custom_admin.label_delete')}}" data-rowid="{{$row->id}}" data-id="{{customEncryptionDecryption($row->id)}}" data-tripid="{{customEncryptionDecryption($row->trip_id)}}" data-action-type='delete-image' title="{{trans('custom_admin.label_delete')}}">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>    
    @endif

@endsection

@push('scripts')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
@include($routePrefix.'.'.$pageRoute.'.scripts')
@endpush
