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
           <p id="LabelContent">PROJEKTE > HINZUFÜGEN</p>
           <hr>
           <table id="inputTable">
             <tr>
               <td><p class="inputLabels">Kunde</p></td>
             </tr>
             <tr>
               <td><p class="inputLabels">Mitarbeiter</p></td>
             </tr>
             <tr>
              <td><p class="inputLabels">Bezeichnung</p></td>
              <td><input type="text" id="Bezeichnung" class="form-control input-lg"></td>
            </tr>
            <tr>
              <td><p class="inputLabels">Beschreibung</p></td>
              <td><textarea id="Beschreibung" class="form-control input-lg" ></textarea></td>
            </tr>
            <tr>
             <td><p class="inputLabels">Dienstleistung</p></td>
           </tr>
           <tr>
            <td><p class="inputLabels">Projektvolumen</p></td>
            <td><input type="number" id="Projektvolumen" placeholder="in Euro" class="form-control input-lg" step="0.01" ></td>
          </tr>
          <tr>
           <td><p class="inputLabels">Bestelldatum</p></td>
           <td><input type="date" id="Bestelldatum" class="form-control input-lg"></td>
         </tr>
         <tr>
           <td><p class="inputLabels">Abgeschlossen Am</p></td>
           <td><input type="date" id="AbgeschlossenAm" class="form-control input-lg"></td>
         </tr>
         <tr>
           <td><p class="inputLabels">Abgerechnet Am</p></td>
           <td><input type="date" id="AbgerechnetAm" class="form-control input-lg"></td>
         </tr>
         <tr>
           <td><p class="inputLabels">Projektart</p></td>
           <td>
             <div class="dropdown">
               <input type="text" id="Projektart" class="form-control input-lg dropdown-toggle" data-toggle="dropdown" style="margin-left: auto;"> 
               <ul class="dropdown-menu" style="margin-left: auto;">
                <li><a href="#">Pauschal</a></li>
                <li><a href="#">Aufwand</a></li></li>
              </ul>
            </div>
          </tr>



        </table>
      </div>
    </div>
  </div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

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
   
  $("#Bestelldatum").attr("value", today);

  $( "#Bestelldatum" ).datepicker({
    numberOfMonths: 2,
    dateFormat: "yy-mm-dd" 
  });
  $( "#AbgeschlossenAm" ).datepicker({
    numberOfMonths: 2,
    dateFormat: "yy-mm-dd" 
  });
  $( "#AbgerechnetAm" ).datepicker({
    numberOfMonths: 2,
    dateFormat: "yy-mm-dd" 
  });
  
});
</script>






<!-- jQuery -->

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- Menu Toggle Script  -->
<script>

  $("#menu-toggle").click(function(e) {
   e.preventDefault();
   $("#wrapper").toggleClass("toggled");

 });

</script>

</body>

</html>




