@extends('layouts.dashboard')

@section('content')

	<div class="content-inner">
        <!-- Page Header-->
        <header class="page-header">
        	<div class="container-fluid">
            <h2 class="no-margin-bottom">Dashboard</h2>
        	</div>
        </header>
        <!-- Breadcrumb-->
        <ul class="breadcrumb">
        	<div class="container-fluid">
              <li class="breadcrumb-item"><a href="#">Inicio</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </div>
        </ul>
 
        <div class="panel-body">
            @if (session('notification'))
               	<div class="alert alert-success">
               		{ session('notification') }}
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

        <!-- Dashboard Counts Section-->
        <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
        	    <div class="row bg-white has-shadow">
	            	<!-- Clientes -->
	                <div class="col-xl-3 col-sm-6">
	                  <div class="item d-flex align-items-center">
	                    <div class="icon bg-violet"><i class="icon-user"></i></div>
	                    <div class="title"><span>Total<br>Clientes</span>
	                      <div class="progress">
	                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
	                      </div>
	                    </div>
	                    <div class="number"><strong>{{ $customers }}</strong></div>
	                  </div>
	                </div>
	                <!-- Terminales -->
	                <div class="col-xl-3 col-sm-6">
	                  <div class="item d-flex align-items-center">
	                    <div class="icon bg-red"><i class="icon-padnote"></i></div>
	                    <div class="title"><span>Total<br>Terminales</span>
	                      <div class="progress">
	                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
	                      </div>
	                    </div>
	                    <div class="number"><strong>{{ $terminals }}</strong></div>
	                  </div>
	                </div>
	                <!-- Software -->
	                <div class="col-xl-3 col-sm-6">
	                  <div class="item d-flex align-items-center">
	                    <div class="icon bg-green"><i class="icon-bill"></i></div>
	                    <div class="title"><span>Total<br>Software</span>
	                      <div class="progress">
	                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
	                      </div>
	                    </div>
	                    <div class="number"><strong>{{ $software }}</strong></div>
	                  </div>
	                </div>
	                <!-- Licencias -->
	                <div class="col-xl-3 col-sm-6">
	                  <div class="item d-flex align-items-center">
	                    <div class="icon bg-orange"><i class="icon-check"></i></div>
	                    <div class="title"><span>Total<br>Licencias</span>
	                      <div class="progress">
	                        <div role="progressbar" style="width: 25%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
	                      </div>
	                    </div>
	                    <div class="number"><strong>{{ $licences }}</strong></div>
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