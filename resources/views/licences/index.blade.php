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
								<h3 class="h4">Agregar Licencias</h3>
							</div>

							<div class="card-body">
								<form action="" method="POST">
									{{ csrf_field() }} 
									<div class="form-group">
										<label class="form-control-label">Cliente</label>
										<select class="form-control" name='customer_id'>
											@foreach ($customers as $customer)
												<option value={{$customer->id}}>{{$customer->name}}</option>
											@endforeach
										</select>
									</div>

									<div class="form-group">
										<label class="form-control-label">Software</label>
										<select class="form-control" name='software_id'>
											@foreach ($software as $softwareitem)
												<option value={{$softwareitem->id}}>{{$softwareitem->name}}</option>
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label class="form-control-label">Cantidad</label>
										<input class="form-control" type="number" name="quantity">
									</div>
									<div class="form-group">
										<label class="form-control-label">Fecha Inicio</label>
										<input class="form-control" type="date" name="started_date">
									</div>
									<div class="form-group">
										<label class="form-control-label">Fecha Fin</label>
										<input class="form-control" type="date" name="due_date">
									</div>
									<div class="form-group">
										<label class="form-control-label">Mensaje</label>
										<textarea class="form-control" rows="3" cols="10" name="message"></textarea>
									</div>
									<div class="form-group">
										<div>
											<label class="form-control-label">Estado</label>
										</div>

										<div class="btn-group btn-group-toggle" data-toggle="buttons">
											<label class="btn btn-secondary active">
												<input type="radio" name="status"  autocomplete="off" value=1 checked> Activo
											</label>
											<label class="btn btn-secondary">
												<input type="radio" name="status"  autocomplete="off" value=0> Inactivo
											</label>
										</div>
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
								<h3 class="h4">Listado Licencias</h3>
							</div>							
							<div class="card-body">
								<table class="table">
										<thead>
											<tr>
												<th>Item</th>
												<th>Cliente</th>
												<th>Software</th>
												<th>Cantidad</th>
												<th>Fecha Inicio</th>
												<th>Fecha Fin</th>
												<th style="text-align: center;">Estado</th>
												<th>Acciones</th>
											</tr>
										</thead>
										<tbody>
											<?php $i = 1?>
											@foreach($licences  as $licence)
											<tr>
												<td>{{$i}}</td>
												<td>{{ $licence->customer->name }}</td>
												<td>{{ $licence->software->name}}</td>
												<td>{{ $licence->quantity}}</td>
												<td>{{ $licence->started_date}}</td>
												<td>{{ $licence->due_date}}</td>
												@if ($licence->status == 1)
												 	<td style="text-align: center;"><span class="badge badge-success">Activo</span></td>
												@else
													<td style="text-align: center;"><span class="badge badge-danger">Inactivo</span></td>
												@endif
												<td>
<a href="/licencia/{{$licence->id }}" class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-pencil"></i></a> <a href="/licencia/{{$licence->id }}/eliminar" class="btn btn-sm btn-danger" title="Eliminar"><i class="fa fa-trash"></i></a> <a href="/licencia/{{$licence->id }}/ver" class="btn btn-sm btn-success" title="Ver"><i class="fa fa-eye"></i></a></td>

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