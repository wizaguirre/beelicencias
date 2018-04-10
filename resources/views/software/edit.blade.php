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
								<h3 class="h4">Editar Software</h3>
							</div>

							<div class="card-body">
								<form action="" method="POST">
									{{ csrf_field() }} 
									<div class="form-group">
										<label class="form-control-label">Software</label>
										<input class="form-control" type="text" name="name" value={{$software->name}}>
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