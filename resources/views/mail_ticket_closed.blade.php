<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<p>TIcket mit der folgenden Nummer wurde geschlossen</p>
	@foreach($t as $t)
	<p>TicketID: {{$t->tid}}</p> 
	@endforeach

</body>
</html>