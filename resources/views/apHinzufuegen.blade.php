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
       $arbeitsscheinticket = DB::table('arbeitsscheinTicket')->get();
       $user = Auth::user();
       $tickets = DB::table('ticket')->get();
       $termintyp = DB::table('termintyp')->get();
       $taetigkeitsart = DB::table('taetigkeitsart')->get();
       $artikel = DB::table('artikel')->get();

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
       <img src="{{ asset('assets/img/rz_logo.jpg') }}" id="logoRight">
       <br>
       <br>
       <p id="LabelContent">ARBEITSSCHEINPROJEKT HINZUFÜGEN</p>
       <hr>
       <!-- Chosen -->
       <!-- CSS -->
       <link rel="stylesheet" href="{{ asset('assets/css/chosen.css') }}">

       <form action="{{ route('SubmitAProjekt') }}" method="post">
         <table  id="inputTable">
          <tr>
           <td><p class="inputLabels">Ticket-Referenz</p></td>
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
      <tr>
       <td><p class="inputLabels">Artikel</p></td>
       <td>
        <select data-placeholder="Artikel auswählen..." id="artikel_select" class="chosen-select" style="width:350px;" tabindex="2" name="aid">
          <option value=""></option>
          @foreach ($artikel as $art)
          <option>{{$art->aNr}}. {{$art->articlename}}</option>
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
      <td><textarea id="Beschreibung" class="form-control input-lg" style="" name="description"></textarea></td>
    </tr>
    <tr>
     <td><p class="inputLabels">Termintyp</p></td>
     <td>
      <select data-placeholder="Termintyp auswählen..." id="termintyp_select" class="chosen-select" style="width:350px;" tabindex="2" name="ttid">
        <option value=""></option>
        @foreach ($termintyp as $typ)
        <option>{{$typ->ttid}}. {{$typ->description}}</option>
        @endforeach
      </select>
    </td>
  </tr>
  <tr>
   <td><p class="inputLabels">Tätigkeitsart</p></td>
   <td>
    <select data-placeholder="Tätigkeitsart auswählen..." id="taetigkeitsart_select" class="chosen-select" style="width:350px;" tabindex="2" name="tkid">
      <option value=""></option>
      @foreach ($taetigkeitsart as $art)
      <option>{{$art->tkid}}. {{$art->description}}</option>
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
 <td><input type="time" id="UhrzeitVon" class="form-control input-lg" name="timeFrom"></td>
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
  <td><input type="number" id="Kulanzzeit" class="form-control input-lg" step="0.5" min="0.0" name="kulanzzeit"></td>
</tr>
<tr>
  <td><p class="inputLabels">Verrechnete Zeit</p></td>
  <td><input type="number" id="VerrechneteZeit" class="form-control input-lg" step="0.5" min="0.0" name="billedTime"></td>
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
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->


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
    dateFormat: "yy-mm-dd" 
  });

  $( "#DatumBis" ).datepicker({
    numberOfMonths: 2,
    dateFormat: "yy-mm-dd" 
  });
  
  $(".chosen-select").chosen();
});
</script>



<!-- Bootstrap Core JavaScript -->


<!-- Menu Toggle Script  -->
<script>

  $("#menu-toggle").click(function(e) {
   e.preventDefault();
   $("#wrapper").toggleClass("toggled");
   
 });

  function setToday(){
    document.getElementById("DatumVon").value = new Date().toDateInputValue();
  }

</script>

</body>

</html>





