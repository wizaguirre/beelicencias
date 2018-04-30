@extends('layouts.dashboard')

@section('content')

	<div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
        	<div class="container-fluid">
            <h2 class="no-margin-bottom">Licencias</h2>
        	</div>
        </header>
        <!-- Breadcrumb-->
        <ul class="breadcrumb">
        	<div class="container-fluid">
              <li class="breadcrumb-item"><a href="/dashboard">Inicio</a></li>
              <li class="breadcrumb-item active">Licencias</li>
            </div>
        </ul>
        <section class="tables">   
            <div class="container-fluid">
            <div class="panel-body">
              @if (session('notification'))
                <div class="alert alert-success">
                  {{ session('notification') }}
                </div>
              @endif

            @if (count($errors) > 0 )
              <div class="alert alert-danger">
              	<h2>¡Ha ocurrido un error!</h2>
                <ul>
                    @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                    @endforeach
                </ul>
              </div>
            @endif
            </div>
            <div class="row">              
                <div class="col-lg-12">               
                  	<div class="card">
	                    <div class="card-close">
	                    	<div class="dropdown">
	                        	<button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
	                        	<div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Cerrar</a></div>
	                     	</div>
	                    </div>
	                    <div class="card-header d-flex align-items-center">
	                      <h3 class="h4">Agregar Licencia</h3>
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
									<input class="form-control" type="number" name="quantity" value="{{ old('quantity') }}">
								</div>
								<div class="form-group">
									<label class="form-control-label">Fecha Inicio</label>
									<input class="form-control" type="date" name="started_date" value="{{ old('started_date') }}">
								</div>
								<div class="form-group">
									<label class="form-control-label">Fecha Fin</label>
									<input class="form-control" type="date" name="due_date" value="{{ old('due_date') }}">
								</div>
								<div class="form-group">
									<label class="form-control-label">Mensaje</label>
									<textarea class="form-control" rows="3" cols="10" name="message">{{ old('message') }}</textarea>
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
		                <div class="card-close">
		                    <div class="dropdown">
		                        <button type="button" id="closeCard" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-ellipsis-v"></i></button>
		                    <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Cerrar</a></div>
		                    </div>
		                </div>
		                <div class="card-header d-flex align-items-center">
		                    <h3 class="h4">Listado de Licencias</h3>
		                </div>							
						<div class="card-body">
						<div class="table-responsive">
							<table id="datatable" class="table dt-responsive display nowrap">
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
										<td><a href="/licencia/{{$licence->id }}" class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-pencil"></i></a> <a href="/licencia/{{$licence->id }}/eliminar" class="btn btn-sm btn-danger" onclick="return confirm('¿Está seguro de eliminar este registro?')" title="Eliminar"><i class="fa fa-trash"></i></a> <a href="/licencia/{{$licence->id }}/terminales" class="btn btn-sm btn-success" title="Ver"><i class="fa fa-eye"></i></a></td>
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
		</section>
	</div>
@endsection
@section('footer')
<script src='https://cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js'></script>
<script  src="/js/datatable_custom.js"></script>
@endsection