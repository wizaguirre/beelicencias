@extends('layouts.dashboard')

@section('content')

	@if(session('notification'))
		{{ session('notification')}}
	@endif

	@if(count($errors)>0)
		@foreach($errors->all()  as $error)
			{{$error}} <br>
		@endforeach
	@endif

@endsection