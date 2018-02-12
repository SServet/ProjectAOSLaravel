<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

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
        $user = Auth::user();
        $projekte = DB::table('projects')->get();
        $kunden = DB::table('kunden')->get();
        $test = DB::connection('mysql2')->table('icinga_contacts')->get();
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
         <p id="LabelContent">PROJEKTE > ÜBERSICHT</p>
         <table id="uebersicht_Table">
          <tr>
            <th>PNr.</th>
            <th>BEZEICHNUNG</th>
            <th>KUNDENNAME</th>
            <th>    @foreach ($test as $t)
            {{$t->alias}}
            @endforeach</th>
          </tr>

          @foreach ($projekte as $projekt)
          @if(!empty($projekt->finishedOn) and (!empty($projekt->settledOn)))
          <tr>
            <td>
              {{$projekt->pid}}
            </td>
            <td>
              {{$projekt->description}}
            </td>
            <td>
              @foreach ($kunden as $kunde)
                @if($kunde->kid == $projekt->kid)
                  {{$kunde->companyname}}
                @endif
              @endforeach
            </td>
            <td><a href="#" onclick="showHide({{$projekt->pid}})"><img src="{{ asset('assets/img/grayBurger.png') }}" style="width: 20px"/></a></td>
          </tr>
          @endif
          <tr>
            <td style="background-color: #EBEBEB;" colspan="4">
              <div id="details{{$projekt->pid}}" style="display:none;" value="{{$projekt->pid}}">
                  <p> Beschreibung: {{$projekt->description}}</p>
                  <p> Abgeschlossen am: {{$projekt->finishedOn}}</p>
                  <p> Abgerechnet am: {{$projekt->settledOn}}</p>
                  <p> Beschreibung: {{$projekt->description}}</p>
                <br\>
              </div>
            </td>
          </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
<!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="{{ asset('assets/js/jquery.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!-- Menu Toggle Script  -->
<script>

  $("#menu-toggle").click(function(e) {
   e.preventDefault();
   $("#wrapper").toggleClass("toggled");
 });
   
if(document.getElementById("menu-toggle").textContent == ">"){
    document.getElementById("menu-toggle").innerHTML = "<";
  }else{
    document.getElementById("menu-toggle").innerHTML = ">";
  }       
  function showHide(id){
    if($("#details"+id).css('display')=='none'){
      $("#details"+id).css('display','inline');
    }else{
      $("#details"+id).css('display','none');
    }
  }


</script>

</body>

</html>





