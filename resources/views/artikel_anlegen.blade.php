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
        $artikelgruppe = DB::table('artikelgruppe')->get();
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
                       </div>
                       <img src="{{ asset('assets/img/rz_logo.jpg') }}" id="logoRight">
                       <br>
                       <br>
                       <p id="LabelContent">Artikel > HINZUFÜGEN</p>
                       <hr>
                       <!-- Chosen -->
                       <!-- CSS -->
                       <link rel="stylesheet" href="{{ asset('assets/css/chosen.css') }}">
                        
                        <form action="{{ route('SubmitArtikel') }}" method="post">
                          <table id="inputTable">
                            <tr>
                              <td><p class="inputLabels">Artikelnummer</p></td>
                              <td><input type="text" id="aNr" class="form-control input-lg" name="aNr"></td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">Artikelname</p></td>
                              <td><input type="text" id="articlename" class="form-control input-lg" name="articlename"></td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">Beschreibung</p></td>
                              <td><textarea id="description" class="form-control input-lg" name="description">   </textarea>
                             </td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">Einheit</p></td>
                              <td><input type="text" id="unit" class="form-control input-lg" name="unit" ></td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">Artikelgruppe</p></td>
                              <td> <select data-placeholder="Artikelgruppe auswählen .." id="artikelgruppe_select" class="chosen-select" style="width:350px;" tabindex="2" name="agid">
                                  <option value=""></option>
                                    @foreach ($artikelgruppe as $artikelgruppe):
                                  <option>{{$artikelgruppe->agid}}. {{$artikelgruppe->description}}</option>
                                    @endforeach
                                  </select>

                              </td>
                            </tr>
                            <tr>
                              <td><p class="inputLabels">Mwst</p></td>
                              <td><select data-placeholder="Mwst" id="mwst" class="chosen-select" style="width:350px;"  name="mwst">
                                <option>0</option>
                                <option>10</option>
                                  <option>20</option>
                                  </select>
                              </td>

                            </tr>
                            
                            <tr>
                              <td><p class="inputLabels">Verkaufspreis</p></td>
                              <td><input type="number" id="salePrice" value="0"   class="form-control input-lg" placeholder="in Euro" step="10" name="salePrice"></td>

                           
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