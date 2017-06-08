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
        $tickets = DB::table('ticket')->get();
        $kunden = DB::table('kunden')->get();
        $user = Auth::user();
        $mitarbeiter = DB::table('mitarbeiter')->get();
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
         <p id="LabelContent">TICKETS</p>
         <hr>
         <form action="Ticket_Hinzufuegen">
           <button id="bHinzufuegen">+TICKET HINZUFÜGEN</button>
         </form>
         <form action="Tickets_Uebersicht">
          <button id="bUebersicht">ÜBERSICHT</button>
        </form>
        <br>
        <br>
        <br>
        <p id="LabelContent" style="font-size: 25px;">OFFENE TICKETS</p>
        <table id="uebersicht_Table">
          <tr>
            <th>TNr.</th>
            <th>BEZEICHNUNG</th>
            <th>KUNDENNAME</th>
            <th></th>
          </tr>
          <br>
          @foreach ($tickets as $ticket)
          @if($ticket->isClosed == 0 or empty($ticket->finishedOn) or empty($ticket->settledOn))

          <tr>
            <td>
              {{$ticket->tid}}
            </td>
            <td>
              {{$ticket->description}}
            </td>
            <td>
              @foreach ($kunden as $kunde)
              @if($kunde->kid == $ticket->kid)
              {{$kunde->firstname}} {{$kunde->lastname}}
              @endif
              @endforeach
            </td>
            <td><a href="#" onclick="showHide({{$ticket->tid}})"><img src="{{ asset('assets/img/grayBurger.png') }}" style="width: 20px"/></a></td>
            <td>
              <form action="{{ url('/ATicket_Hinzufuegen') }}" method="post">
                <input type="hidden" name="tid" value="{{$ticket->tid}}"/>
                <button type="submit" class="btn .btn-default" id="addAT"> + ArbeitsscheinTicket </button>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
              </form>
            </td>
          </tr>
          @endif
          <tr>
            <td style="background-color: #EBEBEB;" colspan="4">

              <div id="details{{$ticket->tid}}" style="display:none;" value="{{$ticket->tid}}">

                  <p>Erstelldatum: {{$ticket->creationDate}}</p>
                  <p>Mitarbeiter:      @foreach($mitarbeiter as $mit)
                    @if($mit->id == $ticket->mid)  
                    {{$mit->firstname}} {{$mit->lastname}}
                    @endif
                    @endforeach
                  </p>
                  <p> Abgeschlossen am: {{$ticket->finishedOn}}</p>
                  <p> Abgerechnet am: {{$ticket->settledOn}}</p>
                  <p> Beschreibung: {{$ticket->description}}</p>

                <form action="{{ url('/TicketClose') }}" method="post">
                  @if(empty($ticket->finishedOn))
                  <button type="submit" class="btn">Ticket abschließen</button>
                  @endif
                  <input type="hidden" name="tid" value="{{$ticket->tid}}"/>

                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>

                <form action="{{ url('/TicketSettle') }}" method="post">
                  @if(empty($ticket->settledOn))
                  <button type="submit" class="btn">Ticket abrechnen</button>
                  @endif
                  <input type="hidden" name="tid" value="{{$ticket->tid}}"/>

                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
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

   if(document.getElementById("menu-toggle").textContent == ">"){
    document.getElementById("menu-toggle").innerHTML = "<";
  }else{
    document.getElementById("menu-toggle").innerHTML = ">";
  }       
});

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





