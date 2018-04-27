<!DOCTYPE html>
<html>
<head>
	<title>Nueva Licencia</title>
</head>
<body>
<h2>¡Nueva licencia creada!</h2>
<div>Se ha creado una nueva licencia, a continuación se muestran los detalles:</div>
<div>
<ul>
	<li>Nombre del cliente: <strong>{{ $customer }}</strong></li>
	<li>Software: <strong>{{ $software }} </strong></li>
	<li>Cantidad: <strong>{{ $quantity }} </strong></li>
	<li>Fecha inicio: <strong>{{ $started_date }} </strong></li>
	<li>Fecha fin: <strong>{{ $due_date }} </strong></li>
</ul>
</div>
</body>
</html>