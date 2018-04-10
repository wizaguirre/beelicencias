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
								<h3 class="h4">Editar Cliente</h3>
							</div>

							<div class="card-body">
								<form action="" method="POST">
									{{ csrf_field() }}
									<div class="form-group">
										<label class="form-control-label">RUC / Cédula</label>
										<input class="form-control" type="text" name="cedularuc" value={{$customer->cedularuc}}>
									</div>
									<div class="form-group">
										<label class="form-control-label">Nombre</label>
										<input class="form-control" type="text" name="name" value={{$customer->name}}>
									</div>
									<div class="form-group">
										<label class="form-control-label">Contacto</label>
										<input class="form-control" type="text" name="contact" value={{$customer->contact}}>
									</div>
									<div class="form-group">
										<label class="form-control-label">Correo</label>
										<input class="form-control" type="text" name="email" value={{$customer->email}}>
									</div>
									<div class="form-group">
										<label class="form-control-label">Teléfono</label>
										<input class="form-control" type="text" name="phone" value={{$customer->phone}}>
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
		</div>
	</section>
</div>
				
@endsection