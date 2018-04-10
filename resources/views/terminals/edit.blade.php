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
<div class="content-inner">
	<header class="page-header">
		<div class="container-fluid">
			<h2 class="no-marging-bottom">
				Licencias
			</h2>
		</div>
	</header>
	<section class="tables">
		<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header d-flex aling-items-center">
								<h3 class="h4">Agregar Terminal</h3>
							</div>

							<div class="card-body">
								<form action="" method="POST">
									{{ csrf_field() }} 
									<div class="form-group">
										<label class="form-control-label">Cliente</label>
										<select class="form-control" name='customer_id'>
											@foreach ($customers as $customer)
												@if($customer->id == $terminal->customer_id)
													<option value={{$customer->id}} selected>{{$terminal->customer->name}}</option>
												@else
													<option value={{$customer->id}}>{{$customer->name}}</option>
											    @endif
											@endforeach
										</select>
									</div>
									
									<div class="form-group">
										<label class="form-control-label">Serial</label>
										<input class="form-control" type="text" name="serial" value="{{$terminal->serial}}">
									</div>
									<div class="form-group">
										<label class="form-control-label">Nombre Equipo</label>
										<input class="form-control" type="text" name="name" value="{{$terminal->name}}">
									</div>
									<div class="form-group">
										<label class="form-control-label">Último Acceso</label>
										<input class="form-control" type="text" name="lastAccess" value="{{$terminal->lastAccess}}">
									</div>

									<div class="form-group">
										<input type="submit" value="Actualizar" class="btn btn-primary">
									</div>


								</form>
							</div>
						</div>
					</div>
			</div>
		</div>
	</section>
</div>
@endsection