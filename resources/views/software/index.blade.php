@extends('layouts.dashboard')

@section('content')

	<div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
        	<div class="container-fluid">
            <h2 class="no-margin-bottom">Software</h2>
        	</div>
        </header>
        <!-- Breadcrumb-->
        <ul class="breadcrumb">
        	<div class="container-fluid">
              <li class="breadcrumb-item"><a href="/dashboard">Inicio</a></li>
              <li class="breadcrumb-item active">Software</li>
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
	                      <h3 class="h4">Agregar Software</h3>
	                    </div>
	                    <div class="card-body">
							<form action="" method="POST">
								{{ csrf_field() }} 
								<div class="form-group">
									<label class="form-control-label">Software</label>
									<input class="form-control" type="text" name="name" value="{{ old('name') }}">
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
		                    <h3 class="h4">Listado de Software</h3>
		                </div>							
						<div class="card-body">
							<table class="table" id="datatable">
								<thead>
									<tr>
										<th>Item</th>
										<th>Software</th>
										<th>Acciones</th>
									</tr>
								</thead>
								<tbody>
									<?php $i = 1?>
									@foreach($software as $softwareitem)
									<tr>
										<td>{{$i}}</td>
										<td>{{ $softwareitem->name}}</td>
										<td><a href="/software/{{$softwareitem->id }}" class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-pencil"></i></a> <a href="/software/{{$softwareitem->id }}/eliminar" onclick="return confirm('¿Está seguro de eliminar este registro?')" class="btn btn-sm btn-danger" title="Eliminar"><i class="fa fa-trash"></i></a></td>
									</tr>
									<?php $i++ ?>
									@endforeach
								</tbody>
							</table>
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