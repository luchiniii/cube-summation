@extends('layout')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-xs-12">
			<h2>Please insert you input in the textarea below</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="form-group">
				<textarea name="input" id="input" cols="30" rows="10" class="form-control"></textarea>
			</div>
			<div class="form-group text-center">
				<input id="send" type="button" value="Submit" class="btn-success btn">
			</div>
		</div>
	</div>
</div>

@endsection