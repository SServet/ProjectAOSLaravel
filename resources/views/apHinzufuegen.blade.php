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
  
  <!-- Artikeltabelle -->
  <link href="{{ asset('assets/css/articleTable.css') }}" rel="stylesheet"

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
       //$arbeitsschein = DB::table('arbeitsschein')->where('pid',1)->get();
     $user = Auth::user();
     $tickets = DB::table('ticket')->get();
     $termintyp = DB::table('termintyp')->get();
     $taetigkeitsart = DB::table('taetigkeitsart')->get();
     $artikel = DB::table('article')->get();

     use Illuminate\Support\Facades\Input;
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
          document.getElementById('logout-form').submit();"> LOGOUT
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
     <img src="{{ asset('assets/img/rz_logo.jpg') }}" id="logoRight">
     <br>
     <br>
     <p id="LabelContent">ARBEITSSCHEINPROJEKT HINZUFÜGEN</p>
     <hr>
     <!-- Chosen -->
     <!-- CSS -->
     <link rel="stylesheet" href="{{ asset('assets/css/chosen.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/css/clockpicker.css') }}">

     <form action="{{ route('SubmitAProjekt') }}" method="post">
       <table  id="inputTable">
        <tr>
         <td><p class="inputLabels">Projekt-Referenz</p></td>
         <td>
          <input type="text" id="Projekt-Referenz" class="form-control input-lg" name="pid" value="{{Input::get('pid')}}" readonly>
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
                    <td><p class="inputLabels">Artikel </p></td>
                    <td>
                      <button type="button" class="btn .btn-default" style="width:350px;"><a href="{{url('Artikel_Hinzufuegen')}}" target="_blank">Artikel anlegen</a></button>

                      <select data-placeholder="Artikel auswählen..." id="artikel_select" class="chosen-select form-control input-lg" style="width:350px; height: 400px;" tabindex="2" name="artid">
                        <option value="" id="inputArtikel"></option>
                        @foreach ($artikel as $art)
                        <option>{{$art->artid}}. {{$art->articlename}}</option>
                        @endforeach
                      </select>
                    </td>
                  </tr>
                <!--
                <button type="button" class="btn .btn-default" style="width: 350px;" onclick="add()">Artikel hinzufügen</button>

              </td>
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
          -->
          <tr>
            <td><p class="inputLabels">Artikelanzahl</p></td>
            <td><input type="number" class="form-control input-lg" min="0" value="1" name="artAnz" id="artAnz"></td>
          </tr>
          <tr>
           <td><p class="inputLabels">Beschreibung</p></td>
           <td><textarea id="Beschreibung" class="form-control input-lg" name="description"></textarea></td>
         </tr>
         <tr>
          <td><p class="inputLabels">Termintyp</p></td>
          <td>
            <select data-placeholder="Termintyp auswählen..." id="termintyp_select" class="chosen-select" style="width:350px;" tabindex="2" name="ttid">
              @foreach ($termintyp as $tt)
              <option value=""></option>
              @if($tt->ttid == 1)
              <option selected>{{$tt->ttid}}. {{$tt->description}}</option>
              @else
              <option>{{$tt->ttid}}. {{$tt->description}}</option>
              @endif
              @endforeach
            </select>
          </td>
        </tr>
        <tr>
          <td><p class="inputLabels">Tätigkeit</p></td>
          <td>
            <select data-placeholder="Tätigkeit auswählen..." id="taetigkeit_select" class="chosen-select" style="width:350px;" tabindex="2" name="tkid">
              @foreach ($taetigkeitsart as $tk)
              <option value=""></option>
              @if($tk->tkid == 1)
              <option selected>{{$tk->tkid}}. {{$tk->description}}</option>
              @else
              <option>{{$tk->tkid}}. {{$tk->description}}</option>
              @endif
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
         <td><div class="input-group clockpicker" data-autoclose="true">
          <input type="text" class="form-control input-lg" value="00:30" style="width:313px;" name="timeFrom">
          <span class="input-group-addon">
            <span class="glyphicon glyphicon-time"></span>
          </span>
        </div></td>
      </tr>
      <tr>
       <td><p class="inputLabels">Uhrzeit bis</p></td>
       <td><div class="input-group clockpicker" data-autoclose="true">
        <input type="text" class="form-control input-lg" value="01:30" style="width:313px;" name="timeTo">
        <span class="input-group-addon">
          <span class="glyphicon glyphicon-time"></span>
        </span>
      </div></td>
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

          <!--
          <table id="uebersicht_ArtikelTable" name="selectedArtikel">
            <th>ArtikelID</th>
            <th>Artikelname</th>
            <th>Artikelanzahl</th>
            <th>X</th>
          </table>
        -->
        <tr></tr>
        <tr>
          <td></td>
          <td>
            <button type="submit" class="btn .btn-default" id="submitButton"> Senden </button>
          </td>
        </tr>
        <tr>
          <td><input type="text" name="articleInfo" id="info" hidden></td>
        </tr>

        <input type="hidden" name="mid" value="{{$user->id}}"/>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
      </table>
      <br>
      <table id="artTable" class="blueTable" style="border-style:hidden;width:480px;" name="articles">
        <thead>
          <tr style="border-style:hidden;">
            <th>Artikel</th>
            <th style="width:22.5%;">
              Einheit
            </th>
            <th style="width:20%;">Anzahl</th>
          </tr>
        </thead>
        
        <tbody>
        </tbody>
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
<script type="text/javascript" src="{{ asset('assets/js/clockpicker.js') }}"></script>

<script>

  var articles = [];
  $(document).ready(function() {
    var date = new Date();

    var day = date.getDate();
    var month = date.getMonth() + 1;
    var year = date.getFullYear();


    if (month < 10) month = "0" + month;
    if (day < 10) day = "0" + day;

    var today = year + "-" + month + "-" + day;       
    $("#DatumVon").attr("value", today);
    $("#DatumBis").attr("value", today);

    var hour = date.getHours();
    var min = date.getMinutes();

    if(hour < 10) hour = "0" + hour;
    if(min < 10) min = "0" + min;

    var time = hour + ":" + min;

    $("#UhrzeitVon").attr("value", time);
    $("#UhrzeitBis").attr("value", time);

    $('.clockpicker').clockpicker();


    var array = [];
    $("#artikel_select").on('change', function(){

      var artikel = $('#artikel_select').val();
      var einheit = $("#einheit_select").val();
      var einheit2 = '<select id="einheit_select" class="chosen-select form-control input-lg">'+
      '<option value="Stück">Stück</option>'+
      '<option value="Stunden">Stunden</option>'+
      '</select>';
      var anz = '<input type="number" class="artAnzTable" min="1" value="'+$("#artAnz").val()+'">';


      if(jQuery.inArray(artikel, articles) == -1){
        articles.push(artikel);
        $('.blueTable > tbody:last-child').append('<tr id="'+artikel+'"><td>'+artikel+'</td><td>'+einheit2+'</td><td contenteditable style="text-align-last:center;">'+anz+'</td><td style="border-style:hidden;width:50px;"><input type="button" onclick="deleteData(\''+artikel+'\')" value="Löschen"></input></td></tr>');
      }

    
      });
    $("#submitButton").on("click", function(){
     var myTableArray = [];
     $("table#artTable tr").each(function() {
      var arrayOfThisRow = [];
      var tableData = $(this).find('td:first-child');
      if (tableData.length > 0) {
        var articlename = tableData.text().split(".")[0];

        var einheit = $(this).find('option:selected').text();
        var anz = $(this).find('[type=number]').val();
        
        $("#info").val($("#info").val() + articlename+","+einheit+","+anz+";");
         
         
      }

    }); 
  });

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

<script type="text/javascript">

  function deleteData(toDelete){
    articles.splice($.inArray(toDelete, articles), 1);
    var row = document.getElementById(toDelete);
    row.parentNode.removeChild(row);
  }
/**
  function add(){
    var table = document.getElementById("uebersicht_ArtikelTable");

    var e = document.getElementById("artikel_select");

    var row = table.insertRow();

    var artId = row.insertCell();
    var artname = row.insertCell();
    var artanz = row.insertCell();
    var loeschen = row.insertCell();
    var artikel = e.options[e.selectedIndex].value;
    var res = artikel.split(".");
    if(artikel != ""){
      artId.innerHTML = res[0];
      artname.innerHTML = res[1];
      artanz.innerHTML = document.getElementById("artAnz").value;
      loeschen.innerHTML = '<input type="button" onclick="deleteRow(this)" value="X"></input>';
    }
  };
  **/


</script>


<script>
  function deleteRow(r){
    var i = r.parentNode.parentNode.rowIndex;
    document.getElementById("uebersicht_ArtikelTable").deleteRow(i);
  };
/*
   function getTableData() {
        document.getElementById('info').innerHTML = "";
        var myTab = document.getElementById('artTable');

        // LOOP THROUGH EACH ROW OF THE TABLE AFTER HEADER.
        for (i = 1; i < myTab.rows.length; i++) {

            // GET THE CELLS COLLECTION OF THE CURRENT ROW.
            var objCells = myTab.rows.item(i).cells;

            // LOOP THROUGH EACH CELL OF THE CURENT ROW TO READ CELL VALUES.
            for (var j = 0; j < objCells.length; j++) {
                info.innerHTML = info.innerHTML + ',' + objCells.item(j).innerHTML;
            }
            info.innerHTML = info.innerHTML + '/';     // ADD A BREAK (TAG).
        }
    }
    */
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