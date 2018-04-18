@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/kiosques') }}">Kiosque</a> :
@endsection
@section("contentheader_description", $kiosque->$view_col)
@section("section", "Kiosques")
@section("section_url", url(config('laraadmin.adminRoute') . '/kiosques'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Kiosques Edit : ".$kiosque->$view_col)

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
				{!! Form::model($kiosque, ['route' => [config('laraadmin.adminRoute') . '.kiosques.update', $kiosque->id ], 'method'=>'PUT', 'id' => 'kiosque-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'quartier')
					@la_input($module, 'description')
					@la_input($module, 'ville')
					@la_input($module, 'latitude')
					@la_input($module, 'longitude')
					@la_input($module, 'nom_kiosque')
					@la_input($module, 'user_id')
					@la_input($module, 'statut')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/kiosques') }}">Cancel</a></button>
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
	$("#kiosque-edit-form").validate({
		
	});
});
</script>
@endpush
