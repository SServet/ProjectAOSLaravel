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
                        <li>
                            <a href="/Einstellungen">EINSTELLUNGEN</a>
                        </li>
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
                       </div>
                       <img src="{{ asset('assets/img/rz_logo.jpg') }}" id="logoRight">
                       <br>
                       <br>
                       <p id="LabelContent">KUNDEN > HINZUFÜGEN</p>
                       <hr>
                       <!-- Chosen -->
                       <!-- CSS -->
                       <link rel="stylesheet" href="{{ asset('assets/css/chosen.css') }}">
                        
                        <form action="{{ route('SubmitKunde') }}" method="post">
                          <table id="inputTable">
                            <tr>
                              <td><p class="inputLabels">Anrede</p></td>
                              <td>
                                <select data-placeholder="Anrede auswählen..." id="anrede_select" class="chosen-select" style="width:350px;" tabindex="2" name="anrede">
                                  <option value=""></option>
                                  <option>Herr</option>
                                  <option>Frau</option>
                                </select>
                              </td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">Titel</p></td>
                              <td><input type="text" id="Titel" class="form-control input-lg" name="titel"></td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">Vorname</p></td>
                              <td><input type="text" id="Vorname" class="form-control input-lg" name="vorname" required placeholder="Max"></td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">Nachname</p></td>
                              <td><input type="text" id="Nachname" class="form-control input-lg" name="nachname" required placeholder="Mustermann"></td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">Firmenname</p></td>
                              <td><input type="text" id="Firmenname" class="form-control input-lg" name="firmenname" required placeholder="Mustermann AG"></td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">E-Mail</p></td>
                              <td><input type="email" id="email" class="form-control input-lg" name="email" required placeholder="max.mustermann@muster.at"></td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">Land</p></td>
                              <td><input type="text" id="Land" class="form-control input-lg" name="land"></td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">PLZ</p></td>
                              <td><input type="text" id="PLZ" class="form-control input-lg" name="plz"></td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">Stadt</p></td>
                              <td><input type="text" id="Stadt" class="form-control input-lg" name="stadt"></td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">Straße</p></td>
                              <td><input type="text" id="Strasse" class="form-control input-lg" name="strasse"></td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">Telefonnnumer</p></td>
                              <td><input type="text" id="Telefonnnumer" class="form-control input-lg" name="telefonnnumer"></td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">Handynummer</p></td>
                              <td><input type="text" id="Handynummer" class="form-control input-lg" name="handynummer"></td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">Fax</p></td>
                              <td><input type="text" id="Fax" class="form-control input-lg" name="fax"></td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">Web</p></td>
                              <td><input type="text" id="Web" class="form-control input-lg" name="web" placeholder="www.mustersite.at"></td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">UID</p></td>
                              <td><input type="text" id="UID" class="form-control input-lg" name="uid"></td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">Steuernummer</p></td>
                              <td><input type="text" id="tax" class="form-control input-lg" name="tax"></td>
                            </tr>
                            <tr></tr>
                            <tr>
                              <td></td>
                              <td>
                                <button type="submit" class="btn .btn-default" id="submitButton"> Senden </button>
                              </td>
                            </tr>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          </table>
                        </form>

                    </div>
                <!-- /#page-content-wrapper -->

                </div>
              <!-- /#wrapper -->


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