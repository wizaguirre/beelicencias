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
                    Detalle de Licencia
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
                                        <label class="form-control-label">Licencia</label>
                                        <input type="hidden" name="licence_id" value={{$licence->id}}>
                                        <input class="form-control" type="text" value="{{$licence->customer->name}} - {{$licence->software->name}}" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Nombre</label>
                                        <input class="form-control" type="text" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Key</label>
                                        <input class="form-control" type="text" name="key">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-control-label">Último Acceso</label>
                                        <input class="form-control" type="date" name="lastAccess">
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
                                <h3 class="h4">Listado Terminales</h3>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Nombre</th>
                                        <th>Key</th>
                                        <th>Último Acceso</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1?>
                                    @foreach($terminals  as $terminal)
                                        <tr>
                                            <td>{{$i}}</td>
                                            <td>{{ $terminal->name}}</td>
                                            <td>{{ $terminal->key}}</td>
                                            <td>{{ $terminal->lastAccess}}</td>
                                            <td>
                                                <a href="/terminal/{{$terminal->id }}" class="btn btn-sm btn-primary" title="Editar"><i class="fa fa-pencil"></i></a> <a href="/terminal/{{$terminal->id }}/eliminar" class="btn btn-sm btn-danger" title="Eliminar"><i class="fa fa-trash"></i></a> </td>

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