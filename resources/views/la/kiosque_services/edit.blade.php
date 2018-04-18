@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/kiosque_services') }}">Kiosque service</a> :
@endsection
@section("contentheader_description", $kiosque_service->$view_col)
@section("section", "Kiosque services")
@section("section_url", url(config('laraadmin.adminRoute') . '/kiosque_services'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Kiosque services Edit : ".$kiosque_service->$view_col)

@section("main-content")

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="box">
	<div class="box-header">
		
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				{!! Form::model($kiosque_service, ['route' => [config('laraadmin.adminRoute') . '.kiosque_services.update', $kiosque_service->id ], 'method'=>'PUT', 'id' => 'kiosque_service-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'kiosque_id')
					@la_input($module, 'service_id')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/kiosque_services') }}">Cancel</a></button>
					</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
<script>
$(function () {
	$("#kiosque_service-edit-form").validate({
		
	});
});
</script>
@endpush
