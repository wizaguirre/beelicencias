@extends('layouts.dashboard')

@section('content')

    <div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
            <div class="container-fluid">
            <h2 class="no-margin-bottom">Terminales por licencia</h2>
            </div>
        </header>
        <!-- Breadcrumb-->
        <ul class="breadcrumb">
            <div class="container-fluid">
              <li class="breadcrumb-item"><a href="/dashboard">Inicio</a></li>
              <li class="breadcrumb-item">Licencias</li>
              <li class="breadcrumb-item active">Terminales</li>
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
                                <div aria-labelledby="closeCard" class="dropdown-menu has-shadow"><a href="#" class="dropdown-item remove"> <i class="fa fa-times"></i>Cerrar</a></div>
                            </div>
                        </div>
                        <div class="card-header d-flex align-items-center">
                          <h3 class="h4">Agregar Terminal</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="form-control-label">Licencia</label>
                                    <input type="hidden" name="licence_id" value={{$licence->id}}>
                                    <input class="form-control" type="text" value="{{$licence->customer->name}} - {{$licence->software->name}}" disabled>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Nombre</label>
                                    <input class="form-control" type="text" name="name" value="{{ $terminal->name }}">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Key</label>
                                    <input class="form-control" type="text" name="key" value="{{ $terminal->key }}">
                                </div>

                                <div class="form-group">
                                    <label class="form-control-label">Último Acceso</label>
                                    <input class="form-control" type="date" name="lastAccess" value="{{ old('lastAccess') }}">
                                </div>

                                <div class="form-group">
                                    <input type="submit" value="Guardar" class="btn btn-primary">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection