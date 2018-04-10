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
				Clientes
			</h2>
		</div>
	</header>
	<section class="tables">
		<div class="container-fluid">
				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header d-flex aling-items-center">
								<h3 class="h4">Agregar Clientes</h3>
							</div>

							<div class="card-body">
								<form action="" method="POST">
									{{ csrf_field() }}
									<div class="form-group">
										<label class="form-control-label">RUC / Cédula</label>
										<input class="form-control" type="text" name="cedularuc">
									</div>
									<div class="form-group">
										<label class="form-control-label">Nombre</label>
										<input class="form-control" type="text" name="name">
									</div>
									<div class="form-group">
										<label class="form-control-label">Contacto</label>
										<input class="form-control" type="text" name="contact">
									</div>
									<div class="form-group">
										<label class="form-control-label">Correo</label>
										<input class="form-control" type="text" name="email">
									</div>
									<div class="form-group">
										<label class="form-control-label">Teléfono</label>
										<input class="form-control" type="text" name="phone">
									</div>
									<div class="form-group">
										<input type="submit" value="Guardar" class="btn btn-primary">
									</div>
								</form>
							</div>
						</div>
						</div>
					</div>

				<div class="row">
					<div class="col-lg-12">
						<div class="card">
							<div class="card-header d-flex aling-items-center">
								<h3 class="h4">Listado Clientes</h3>
							</div>							
							<div class="card-body">
								<table class="table">
										<thead>
											<tr>
												<th>Item</th>
												<th>RUC / Cédula</th>
												<th>Nombre</th>
												<th>Contacto</th>
												<th>Email</th>
												<th>Teléfono</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1?>
											@foreach($customers as $customer)
											<tr>
												<td>{{$i}}</td>
												<td>{{ $customer->cedularuc}}</td>
												<td>{{ $customer->name}}</td>
												<td>{{ $customer->contact}}</td>
												<td>{{ $customer->email}}</td>
												<td>{{ $customer->phone}}</td>
												<td>
<a href="/cliente/{{$customer->id }}" class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-pencil"></i></a> <a href="/cliente/{{$customer->id }}/eliminar" class="btn btn-sm btn-danger" title="Eliminar"><i class="fa fa-trash"></i></a>
<a href="/cliente/{{$customer->id }}/ver" class="btn btn-sm btn-success" title="Ver"><i class="fa fa-eye"></i></a> </td>

											</tr>
											<?php $i++ ?>
											@endforeach
										</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>
</div>
@endsection