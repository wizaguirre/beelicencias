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
								<h3 class="h4">Editar Licencia</h3>
							</div>

							<div class="card-body">
								<form action="" method="POST">
									{{ csrf_field() }} 
									<div class="form-group">
										<label class="form-control-label">Cliente</label>
										<select class="form-control" name='customer_id'>
											@foreach ($customers as $customer)
												@if($customer->id==$licences->customer->id)
													<option value={{$customer->id}} selected>{{$customer->name}}</option>
												@else
													<option value={{$customer->id}}>{{$customer->name}}</option>
											    @endif
										    @endforeach
										</select>
									</div>
									<div class="form-group">
										<label class="form-control-label">Software</label>
										<select class="form-control" name='software_id'>
											@foreach ($software as $softwareitem)
												 @if($softwareitem->id==$licences->software->id)
												 	<option value={{$softwareitem->id}} selected>{{$softwareitem->name}}</option>
												 @else
												 	<option value={{$softwareitem->id}}>{{$softwareitem->name}}</option>
												 @endif
											@endforeach
										</select>
									</div>
									<div class="form-group">
										<label class="form-control-label">Cantidad</label>
										<input class="form-control" type="number" name="quantity" value="{{$licences->quantity}}">
									</div>
									<div class="form-group">
										<label class="form-control-label">Fecha Inicio</label>
										<input class="form-control" type="date" name="started_date" value="{{$licences->started_date}}">
									</div>
									<div class="form-group">
										<label class="form-control-label">Fecha Fin</label>
										<input class="form-control" type="date" name="due_date" value="{{$licences->due_date}}">
									</div>
									<div class="form-group">
										<label class="form-control-label">Mensaje</label>
										<textarea class="form-control" rows="3" cols="10" name="message">{{$licences->message}}</textarea>
									</div>
									<div class="form-group">
										<div>
											<label class="form-control-label">Estado</label>
										</div>
										<div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            @if($licences->status == 1)
                                                <label class="btn btn-secondary active">
                                                    <input type="radio" name="status"  autocomplete="off" value=1 checked> Activo
                                                </label>
                                                <label class="btn btn-secondary">
                                                    <input type="radio" name="status"  autocomplete="off" value=0> Inactivo
                                                </label>
                                            @else
                                                <label class="btn btn-secondary">
                                                    <input type="radio" name="status"  autocomplete="off" value=1> Activo
                                                </label>
                                                <label class="btn btn-secondary active">
                                                    <input type="radio" name="status"  autocomplete="off" value=0 checked> Inactivo
                                                </label>
                                            @endif
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

			</div>
		</div>
	</section>
</div>
				
@endsection