<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>Das Projekt mit der folgenden Nummer wurde geschlossen</p>
	@foreach($p as $p)
	<p>ProjektID: {{$p->pid}}</p> 
	@endforeach

</body>
</html>