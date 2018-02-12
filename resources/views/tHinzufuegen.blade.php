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
       $arbeitsscheinticket = DB::table('arbeitsschein')->where('tid',1)->get(); //evtl FEHLER
       $user = Auth::user();
       $tickets = DB::table('ticket')->get();
       $artikel = DB::table('article')->get();
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
       <p id="LabelContent">TICKETS > HINZUFÜGEN</p>
       <hr>
       <!-- Chosen -->
       <!-- CSS -->
       <link rel="stylesheet" href="{{ asset('assets/css/chosen.css') }}">

       <form action="{{ route('SubmitTicket') }}" method="post">
       
         <table  id="inputTable">
           <tr>
            <td><p class="inputLabels">Kunde</p></td>
            <td>
              <select data-placeholder="Kunde auswählen..." id="kunde_select" class="chosen-select" style="width:350px;" tabindex="2" name="kid">
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

        <tr>
          <td><p class="inputLabels">Artikelanzahl</p></td>
          <td><input type="number" class="form-control input-lg" min="0" value="1" name="artAnz" id="artAnz"></td>
        </tr>
        <tr >
                  <td colspan="2" style="padding-top:1em; padding-bottom:1em;"> 

                    <table id="artTable" class="blueTable" style="border-style:hidden;width:680px;" name="articles">
                      <thead>
                        <tr style="border-style:hidden;">
                          <th>Artikel</th>
                          <th style="width:22.5%;">
                            Einheit
                          </th>
                          <th style="width:20%;">Anzahl</th>
                          <th style="width:5%;"></th>
                        </tr>
                      </thead>

                      <tbody>
                      </tbody>
                    </table>
                  </td>
                </tr>
        <tr>
          <td><p class="inputLabels">Bezeichnung</p></td>
          <td><input type="text" id="Bezeichnung" class="form-control input-lg" name="label"></td>
        </tr>
        <tr>
          <td><p class="inputLabels">Beschreibung</p></td>
          <td><textarea id="Beschreibung" class="form-control input-lg" style="" name="description"></textarea></td>
        </tr>

        <tr>
         <td><p class="inputLabels">Erstelldatum</p></td>
         <td><input type="date" id="Erstelldatum" class="form-control input-lg" name="creationDate"></td>
       </tr>
       <tr>
         <td><p class="inputLabels">Abgeschlossen Am</p></td>
         <td><input type="date" id="AbgeschlossenAm" class="form-control input-lg" name="finishedOn"></td>
       </tr>
       <tr>
         <td><p class="inputLabels">Abgerechnet Am</p></td>
         <td><input type="date" id="AbgerechnetAm" class="form-control input-lg" name="settledOn"></td>
       </tr>
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

  
  </form> 
</div>
</div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->


<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript" src="{{ asset('assets/css/chosen.jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/css/chosen.jquery.js') }}"></script>

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
    $("#Erstelldatum").attr("value", today);



    var tbody = $("#artTable tbody");
    if (tbody.children().length == 0) {
      $('.blueTable > tbody:last-child').append('<tr id="noArticles"><td colspan="4">Keine Artikel enthalten!</td></tr>');
    }else{
      $('#noArticles').remove();
    }
    var array = [];
    $("#artikel_select").on('change', function(){
      var tbody = $("#artTable tbody");
      if (tbody.children().length == 0) {
        $('.blueTable > tbody:last-child').append('<tr id="noArticles"><td colspan="4">Keine Artikel enthalten!</td></tr>');
      }else{
        $('#noArticles').remove();
      }

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

     $(".chosen-select").chosen();
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
     var tbody = $("#artTable tbody");
      if (tbody.children().length == 0) {
        $('.blueTable > tbody:last-child').append('<tr id="noArticles"><td colspan="4">Keine Artikel enthalten!</td></tr>');
      }else{
        $('#noArticles').remove();
      }
  }
</script>


<!-- Menu Toggle Script  -->
<script>

  $("#menu-toggle").click(function(e) {
   e.preventDefault();
   $("#wrapper").toggleClass("toggled");
   
 });

  function setToday(){
    document.getElementById("Erstelldatum").value = new Date().toDateInputValue();
  }

</script>

</body>

</html>