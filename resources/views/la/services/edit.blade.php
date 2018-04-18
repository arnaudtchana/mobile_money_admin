@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/services') }}">Service</a> :
@endsection
@section("contentheader_description", $service->$view_col)
@section("section", "Services")
@section("section_url", url(config('laraadmin.adminRoute') . '/services'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Services Edit : ".$service->$view_col)

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
				{!! Form::model($service, ['route' => [config('laraadmin.adminRoute') . '.services.update', $service->id ], 'method'=>'PUT', 'id' => 'service-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'nom')
					@la_input($module, 'description')
					@la_input($module, 'logo')
					@la_input($module, 'localisation_icone')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/services') }}">Cancel</a></button>
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
	$("#service-edit-form").validate({
		
	});
});
</script>
@endpush
