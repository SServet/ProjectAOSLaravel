<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<title>Arbeitsschein Online Service</title>

  <!-- Bootstrap Core CSS -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom CSS -->
  <link href="{{ asset('assets/css/simple-sidebar.css') }}" rel="stylesheet">

  <!-- Font-Links -->
  <link href="https://fonts.googleapis.com/css?family=PT+Sans" rel="stylesheet">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

      </head>

      <body>

       <div id="wrapper">



        <!-- Sidebar -->
        <div id="sidebar-wrapper">
         <ul class="sidebar-nav">
          <li class="sidebar-brand">
           <div id="divLabelAOS">
            <a href="/"/>
            <p id="LabelAOS">AOS</p>
            <p id="SubtitleAOS">Arbeitsschein Online Service</p>
          </div>
          <li>
            <a href="/">STARTSEITE</a>
          </li>
          <li>
            <a href="/Tickets">TICKETS</a>
          </li>
          <li>
            <a href="/Projekte">PROJEKTE</a>
          </li>
          <li>
            <a href="/Arbeitsschein">ARBEITSSCHEINE</a>
          </li>
          <li>
            <a href="/Einstellungen">EINSTELLUNGEN</a>
          </li>
        </ul>
      </div>
      <!-- /#sidebar-wrapper -->

      <!-- Page Content -->
      <div id="page-content-wrapper">
       <div class="container-fluid">
        <div class="row">
         <div class="col-lg-12">
          <div id="menu-toggle-div">
           <img src="{{ asset('assets/img/grayBurger.png') }}" href="#menu-toggle" style="width: 40px" id="menu-toggle">
         </div>
         <br>
         <br>
         <div>
           <p id="LabelContent">ARBEITSSCHEIN > HINZUFÜGEN</p>
           <hr>
           <table id="inputTable">
             <tr>
               <td><p class="inputLabels">Kunde</p></td>
             </tr>
             <tr>
               <td><p class="inputLabels">Mitarbeiter</p></td>
             </tr>
             <tr>
              <td><p class="inputLabels">Termintyp</p></td>
            </tr>
            <tr>
              <td><p class="inputLabels">Tätigkeit</p></td>
              <td>
                <div class="dropdown">
                  <input type="text" id="Tätigkeit" class="form-control input-lg dropdown-toggle" data-toggle="dropdown" style="margin-left: auto;"> 
                  <ul class="dropdown-menu" style="margin-left: auto;">
                    <li><a href="#">HTML</a></li>
                    <li><a href="#">CSS</a></li>
                    <li><a href="#">JavaScript</a></li>
                  </ul>
                </div>
              </td>
            </tr>
            <tr>
             <td><p class="inputLabels">Datum von</p></td>
             <td><input type="date" id="DatumVon" class="form-control input-lg"></td>
           </tr>
           <tr>
             <td><p class="inputLabels">Datum bis</p></td>
             <td><input type="date" id="DatumBis" class="form-control input-lg"></td>
           </tr>
           <tr>
             <td><p class="inputLabels">Uhrzeit von</p></td>
             <td><input type="time" id="UhrzeitVon" class="form-control input-lg"></td>
           </tr>
           <tr>
             <td><p class="inputLabels">Uhrzeit bis</p></td>
             <td><input type="time" id="UhrzeitBis" class="form-control input-lg"></td>
           </tr>
           <tr>
             <td><p class="inputLabels">Beschreibung</p></td>
             <td><textarea id="Beschreibung" class="form-control input-lg" ></textarea></td>
           </tr>
           <tr>
            <td><p class="inputLabels">Kulanzgrund</p></td>
            <td><input type="textarea" id="Kulanzgrund" class="form-control input-lg" step="0.5" ></td>
          </tr>
          <tr>
            <td><p class="inputLabels">Kulanzzeit</p></td>
            <td><input type="number" id="Kulanzzeit" class="form-control input-lg" step="0.5" ></td>
          </tr>
          <tr>
            <td><p class="inputLabels">Verrechnete Zeit</p></td>
            <td><input type="number" id="VerrechneteZeit" class="form-control input-lg" step="0.5" ></td>
          </tr>
        </table>

      </div>
    </div>
  </div>
</div>



<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

<script>

 $(document).ready(function() {
  var date = new Date();

  var day = date.getDate();
  var month = date.getMonth() + 1;
  var year = date.getFullYear();

  if (month < 10) month = "0" + month;
  if (day < 10) day = "0" + day;

  var today = year + "-" + month + "-" + day;       
  $("#DatumVon").attr("value", today);

  $( "#DatumVon" ).datepicker({
    numberOfMonths: 2,
    dateFormat: "yy-mm-dd" 
  });
  
  $( "#DatumBis" ).datepicker({
    numberOfMonths: 2,
    dateFormat: "yy-mm-dd"
  });

});
</script>


<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
<!-- jQuery -->

<script>
  $("#menu-toggle").click(function(e) {
   e.preventDefault();
   $("#wrapper").toggleClass("toggled");

 });

</script>

</body>

</html>





