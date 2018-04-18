@extends("la.layouts.app")

@section("contentheader_title")
	<a href="{{ url(config('laraadmin.adminRoute') . '/persons') }}">Person</a> :
@endsection
@section("contentheader_description", $person->$view_col)
@section("section", "Persons")
@section("section_url", url(config('laraadmin.adminRoute') . '/persons'))
@section("sub_section", "Edit")

@section("htmlheader_title", "Persons Edit : ".$person->$view_col)

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
				{!! Form::model($person, ['route' => [config('laraadmin.adminRoute') . '.persons.update', $person->id ], 'method'=>'PUT', 'id' => 'person-edit-form']) !!}
					@la_form($module)
					
					{{--
					@la_input($module, 'nom')
					@la_input($module, 'prenom')
					@la_input($module, 'tel')
					@la_input($module, 'user_id')
					--}}
                    <br>
					<div class="form-group">
						{!! Form::submit( 'Update', ['class'=>'btn btn-success']) !!} <button class="btn btn-default pull-right"><a href="{{ url(config('laraadmin.adminRoute') . '/persons') }}">Cancel</a></button>
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
	$("#person-edit-form").validate({
		
	});
});
</script>
@endpush
