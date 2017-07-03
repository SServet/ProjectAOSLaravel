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
       use Illuminate\Support\Facades\Input;
       $mid = Input::get('mid');
       $mitarbeiter = DB::table('mitarbeiter')->where('id', $mid)->get()->first();       
      $user = Auth::user();
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
       <p id="LabelContent">MITARBEITER BEARBEITEN</p>
       <hr>
       <!-- Chosen -->
       <!-- CSS -->
       <link rel="stylesheet" href="{{ asset('assets/css/chosen.css') }}">

       <form action="{{ route('SubmitEditProjekt') }}" method="post">
         <table  id="inputTable">
           <table  id="inputTable">
            <tr>
             <td><p class="inputLabels">Mitarbeitrer-Referenz</p></td>
             <td>
              <input type="text" id="Mitarbeiter-Referenz" class="form-control input-lg" name="mid" value="{{$mitarbeiter->id}}" readonly>
             </td>
            </tr>

          <tr>
            <td><p class="inputLabels">Administrator</p></td>
            <td>
              <select data-placeholder="ist Admin..." id="admin_select" class="chosen-select" style="width:350px;" name="isAdmin">
                <option value=""></option>
                  <option>Ja</option>
                  <option>Nein</option>
              </select>
            </td>
          </tr>

          <tr>
            <td><p class="inputLabels">Vorname</p></td>
            <td>
              <input type="text" id="m_vorname" class="form-control input-lg" name="firstname" value="{{$mitarbeiter->firstname}}" required>
            </td>
          </tr>
          <tr>
            <td><p class="inputLabels">Nachname</p></td>
            <td>
              <input type="text" id="m_nachname" class="form-control input-lg" name="lastname" value="{{$mitarbeiter->lastname}}" required>
            </td>
          </tr>
          <tr>
            <td><p class="inputLabels">E-Mail</p></td>
            <td><input type="email" id="email" class="form-control input-lg" name="email" required value="{{$mitarbeiter->email}}" required></td>
          </tr>
          <tr>
            <td><p class="inputLabels">Passwort</p></td>
            <td><input type="password" id="pw" class="form-control input-lg" name="pw" required></td>
          </tr>
          <tr>
            <td><p class="inputLabels">Land</p></td>
            <td><input type="text" id="Land" class="form-control input-lg" name="land" value="{{$mitarbeiter->country}}"></td>
          </tr>
          <tr>
            <td><p class="inputLabels">PLZ</p></td>
            <td><input type="text" id="PLZ" class="form-control input-lg" name="plz" value="{{$mitarbeiter->plz}}"></td>
          </tr>
          <tr>
            <td><p class="inputLabels">Stadt</p></td>
            <td><input type="text" id="Stadt" class="form-control input-lg" name="stadt" value="{{$mitarbeiter->city}}"></td>
          </tr>
          <tr>
            <td><p class="inputLabels">Adresse</p></td>
            <td><input type="text" id="Adresse" class="form-control input-lg" name="adresse" value="{{$mitarbeiter->address}}"></td>
          </tr>
          <tr>
            <td><p class="inputLabels">Telefonnnumer</p></td>
            <td><input type="text" id="Telefonnnumer" class="form-control input-lg" name="telefonnnumer" value="{{$mitarbeiter->telphone}}"></td>
          </tr>
          <tr>
            <td><p class="inputLabels">Handynummer</p></td>
            <td><input type="text" id="Handynummer" class="form-control input-lg" name="handynummer" value="{{$mitarbeiter->mobilephone}}"></td>
          </tr>
          <tr>
            <td><p class="inputLabels">Fax</p></td>
            <td><input type="text" id="Fax" class="form-control input-lg" name="fax" value="{{$mitarbeiter->fax}}"></td>
          </tr>
          <tr>
            <td><p class="inputLabels">Web</p></td>
            <td><input type="text" id="Web" class="form-control input-lg" name="web" value="{{$mitarbeiter->web}}"></td>
          </tr>
       <tr></tr>
       <tr>
        <td></td>
        <td>
          <button type="submit" class="btn .btn-default" id="submitButton"> Bearbeiten </button>
        </td>
      </tr>
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
  $("#Erstelldatum").attr("value", today);

  $( "#Erstelldatum" ).datepicker({
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
    document.getElementById("Erstelldatum").value = new Date().toDateInputValue();
  }

</script>

</body>

</html>