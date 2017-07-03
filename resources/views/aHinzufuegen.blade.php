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

        <?php
        $kunden = DB::table('kunden')->get();
        $mitarbeiter = DB::table('mitarbeiter')->get();
        $termintyp = DB::table('termintyp')->get();
        $taetigkeitsart = DB::table('taetigkeitsart')->get();
        $user = Auth::user();
        $artikel = DB::table('artikel')->get();
        ?>


        <div id="wrapper">



          <!-- Sidebar -->
          <div id="sidebar-wrapper">
           <ul class="sidebar-nav">
            <li class="sidebar-brand">
             <div id="divLabelAOS">
              <a href="/home"/>
              <p id="LabelAOS">AOS</p>
              <p id="SubtitleAOS">Arbeitsschein Online Service</p>
            </div>
            <li>
              <a href="/home">STARTSEITE</a>
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
            @if ($user->isAdmin == 1)
            <li>
              <a href="/Einstellungen">EINSTELLUNGEN</a>
            </li>
            @endif
            <li>
              <a href="{{ url('/logout') }}" onclick="event.preventDefault(); 
              document.getElementById('logout-form').submit();"> Logout
            </a>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
            </form>
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
           <a href="#"><img src="{{ asset('assets/img/grayBurger.png') }}" href="#menu-toggle" style="width: 40px" id="menu-toggle"></a>
         </div>
         <br>
         <br>
         <div>
           <p id="LabelContent">ARBEITSSCHEIN > HINZUFÜGEN</p>
           <hr>
           <!-- Chosen -->
           <!-- CSS -->
           <link rel="stylesheet" href="{{ asset('assets/css/chosen.css') }}">


           <form action="{{ route('SubmitArbeitS') }}" method="post">
             <table id="inputTable">
               <tr>
                 <td><p class="inputLabels">Kunde</p></td>
                 <td>
                   <select data-placeholder="Kunden auswählen..." id="kunden_select" class="chosen-select form-control input-lg" style="width:350px; height: 400px;" tabindex="2" name="kid">
                    <option value=""></option>
                    @foreach ($kunden as $kunde)
                    <option>{{$kunde->kid}}. {{$kunde->companyname}}</option>
                    @endforeach
                  </select>
                </td>
              </tr>
              <tr>
               <td><p class="inputLabels">Mitarbeiter</p></td>
               <td>
                   
                   <input type="text" id="Mitarbeiter-Referenz" class="form-control input-lg" name="mitarbeiter_name" value="{{$user->firstname . ' ' . $user->lastname}}" readonly>
              </td>
            </tr>
            <tr id="artikelTR">
            </tr>
            <tr>
              <td><p class="inputLabels">Artikel</p></td>
              <td>
                <select data-placeholder="Artikel auswählen..." id="artikel_select" class="chosen-select form-control input-lg" style="width:350px; height: 400px;" tabindex="2" name="artid">
                    <option value="" id="inputArtikel" onchange="newArtikel()"></option>
                    @foreach ($artikel as $art)
                    <option>{{$art->artid}}. {{$art->articlename}}</option>
                    @endforeach
                  </select>
              </td>
            </tr>
            <tr>
              <td><p class="inputLabels">Artikelanzahl</p></td>
              <td><input type="number" class="form-control input-lg" min="0" value="1" name="artAnz"></td>
            </tr>
            <tr>
             <td><p class="inputLabels">Beschreibung</p></td>
             <td><textarea id="Beschreibung" class="form-control input-lg" name="description"></textarea></td>
            </tr>
            <tr>
              <td><p class="inputLabels">Termintyp</p></td>
              <td>
                <select data-placeholder="Termintyp auswählen..." id="termintyp_select" class="chosen-select" style="width:350px;" tabindex="2" name="ttid">
                  <option value=""></option>
                  @foreach ($termintyp as $tt)
                  <option>{{$tt->ttid}}. {{$tt->description}}</option>
                  @endforeach
                </select>
              </td>
            </tr>
            <tr>
              <td><p class="inputLabels">Tätigkeit</p></td>
              <td>
                <select data-placeholder="Tätigkeit auswählen..." id="taetigkeit_select" class="chosen-select" style="width:350px;" tabindex="2" name="tkid">
                  <option value=""></option>
                  @foreach ($taetigkeitsart as $tk)
                  <option>{{$tk->tkid}}. {{$tk->description}}</option>
                  @endforeach
                </select>
              </td>
            </tr>
            <tr>
             <td><p class="inputLabels">Datum von</p></td>
             <td><input type="date" id="DatumVon" class="form-control input-lg" name="dateFrom"></td>
           </tr>
           <tr>
             <td><p class="inputLabels">Datum bis</p></td>
             <td><input type="date" id="DatumBis" class="form-control input-lg" name="dateTo"></td>
           </tr>
           <tr>
             <td><p class="inputLabels">Uhrzeit von</p></td>
             <td><input type="time" id="UhrzeitVon" class="form-control input-lg" name="timeFrom" value="00:00"></td>
           </tr>
           <tr>
             <td><p class="inputLabels">Uhrzeit bis</p></td>
             <td><input type="time" id="UhrzeitBis" class="form-control input-lg" name="timeTo"></td>
           </tr>
           <tr>
            <td><p class="inputLabels">Kulanzgrund</p></td>
            <td><input type="textarea" id="Kulanzgrund" class="form-control input-lg" step="0.5" name="kulanzgrund"></td>
          </tr>
          <tr>
            <td><p class="inputLabels">Kulanzzeit</p></td>
            <td><input type="number" id="Kulanzzeit" class="form-control input-lg" step="0.5" name="kulanzzeit"></td>
          </tr>
          <tr>
            <td><p class="inputLabels">Verrechnete Zeit</p></td>
            <td><input type="number" id="VerrechneteZeit" class="form-control input-lg" step="0.5" name="billedTime"></td>
          </tr>
          <tr></tr>
          <tr>
            <td></td>
            <td>
              <button type="submit" class="btn .btn-default" id="submitButton"> Senden </button>
            </td>
          </tr>
          <input type="hidden" name="mid" value="{{$user->id}}"/>
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </table>
      </form> 
    </div>
  </div>
</div>
</div>



<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript" src="{{ asset('assets/css/chosen.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/css/chosen.jquery.js') }}"></script>

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
    dateFormat: "yy-mm-dd",
    onSelect: function() {
      var timeStart = new Date('2015-01-01 ' + document.getElementById("UhrzeitVon").value);    
      var timeEnd = new Date('2015-01-01 ' + document.getElementById("UhrzeitBis").value);
      var minDiffTime = (timeEnd - timeStart)/1000/60;
      var dateFrom = $("#DatumVon").datepicker("getDate");
      var dateTo = $("#DatumBis").datepicker("getDate");
      var diffMinsDate = (dateTo - dateFrom)/1000/60;
      var totalMinutes = minDiffTime + diffMinsDate;
      $("#VerrechneteZeit").val((totalMinutes/60).toFixed(2)); // durch 60 damit z.b. 90 minuten als 1.5 angezeigt werden
    }
  });

  $( "#DatumBis" ).datepicker({
    numberOfMonths: 2,
    dateFormat: "yy-mm-dd",
    onSelect: function() {
      var timeStart = new Date('2015-01-01 ' + document.getElementById("UhrzeitVon").value);    
      var timeEnd = new Date('2015-01-01 ' + document.getElementById("UhrzeitBis").value);
      var minDiffTime = (timeEnd - timeStart)/1000/60;
      var dateFrom = $("#DatumVon").datepicker("getDate");
      var dateTo = $("#DatumBis").datepicker("getDate");
      var diffMinsDate = (dateTo - dateFrom)/1000/60;      
      var totalMinutes = minDiffTime + diffMinsDate;
      $("#VerrechneteZeit").val((totalMinutes/60).toFixed(2)); // durch 60 damit z.b. 90 minuten als 1.5 angezeigt werden
    } 
  });

  $( "#UhrzeitVon" ).change(function() {
    var timeStart = new Date('2015-01-01 ' + document.getElementById("UhrzeitVon").value);    
    var timeEnd = new Date('2015-01-01 ' + document.getElementById("UhrzeitBis").value);
    var minDiffTime = (timeEnd - timeStart)/1000/60;
    var dateFrom = $("#DatumVon").datepicker("getDate");
    var dateTo = $("#DatumBis").datepicker("getDate");
    var diffMinsDate = (dateTo - dateFrom)/1000/60;
    var totalMinutes = minDiffTime + diffMinsDate;
    $("#VerrechneteZeit").val((totalMinutes/60).toFixed(2)); // durch 60 damit z.b. 90 minuten als 1.5 angezeigt werden
  });

  $( "#UhrzeitBis" ).change(function() {
    var timeStart = new Date('2015-01-01 ' + document.getElementById("UhrzeitVon").value);    
    var timeEnd = new Date('2015-01-01 ' + document.getElementById("UhrzeitBis").value);
    var minDiffTime = (timeEnd - timeStart)/1000/60;
    var dateFrom = $("#DatumVon").datepicker("getDate");
    var dateTo = $("#DatumBis").datepicker("getDate");
    var diffMinsDate = (dateTo - dateFrom)/1000/60;
    var totalMinutes = minDiffTime + diffMinsDate;
    $("#VerrechneteZeit").val((totalMinutes/60).toFixed(2)); // durch 60 damit z.b. 90 minuten als 1.5 angezeigt werden
  });

  $(".chosen-select").chosen();
  });
 $('#UhrzeitVon, #UhrzeitBis').on('change',function() 
  {
    var start_time = $('#UhrzeitVon').val();
    var end_time = $('#UhrzeitBis').val();

    var diff = new Date("1970-1-1" + end_time) - new Date("1970-1-1" + start_time);
    document.getElementById('VerrechneteZeit').innerHTML = diff;
});
    var chosen = $("#artikel_select").chosen().data('chosen');
chosen.container.bind('keydown', function (e) {
    if(e.which==187){
      window.searchNow=true;
    }else{
      window.searchNow=false;
    }
});

$("#artikel_select").on('chosen:no_results', function(e, params) {
   var artikel = params.chosen.search_results[0].textContent.match(/No results match "(.+)"/)[1];
  
  if(window.searchNow){
    $("#artikel_select").append('<option>'+artikel.slice(0,-1)+'</option>').trigger("chosen:updated");
      
       $("#artikel_select").on('change', function(e) {
        $("#artikel").val(artikel);
        if($("#artikelTR td").length == 0)
          $("#artikelTR").append('<td><p class="inputLabels">ArtikelNummer</p></td><td><input type="text" class="form-control input-lg" name="artid"></td>');
      });
  }
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





