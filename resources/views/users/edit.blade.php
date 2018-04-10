@extends('layouts.dashboard')

@section('content')

        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Usuarios</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="/dashboard">Inicio</a></li>
              <li class="breadcrumb-item">Usuarios</li>
              <li class="breadcrumb-item active">Editar</li>
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
                        <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Cerrar</a><a href="#" class="dropdown-item edit"> <i class="fa fa-gear"></i>Editar</a></div>
                      </div>
                    </div>
                    <div class="card-header d-flex align-items-center">
                      <h3 class="h4">Editar Usuario</h3>
                    </div>
                    <div class="card-body">
                      <form action="" method="POST">
                      {{ csrf_field() }}
                        <div class="form-group">
                          <label class="form-control-label">Nombre</label>
                          <input type="text" name="name" placeholder="Nombre completo" class="form-control" value="{{ old('name', $user->name) }}">
                        </div>                      
                        <div class="form-group">
                          <label class="form-control-label">Email</label>
                          <input type="email" name="email" placeholder="Correo electrónico" class="form-control" value="{{ old('email', $user->email) }}" disabled>
                          <small class="form-text">* El email no se puede editar</small>
                        </div>
                        
                        <div class="form-group">       
                          <label class="form-control-label">Contraseña</label>
                          <input type="text" name="password" placeholder="Contraseña" class="form-control" >
                          <small class="form-text">* Digitar en caso de querer cambiar</small>
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
@endsection