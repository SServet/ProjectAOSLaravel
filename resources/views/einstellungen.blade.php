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

    <script type="text/javascript">
    function select()
    {
    kund=document.getElementById("kundenimp");
    arti=document.getElementById("artikelimp");
    if(kund.checked==true)
        {
        document.myform.action="{{ URL::to('importKundenfromCSV') }}";
        }
    else
        {
        document.myform.action="{{ URL::to('importArtikelfromCSV') }}";
        }
    }
  </script>

    </head>

    <body>

        <?php
        $termintyp = DB::table('termintyp')->get();
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
                        <!-- Chosen -->
                        <!-- CSS -->
                       <link rel="stylesheet" href="{{ asset('assets/css/chosen.css') }}">
                       <table id="importExportTable">
                        <tr>
                            <th id="labelImport">Import:</th>
                            
                        </tr>

                       <form name="myform" onsubmit="select()" style="margin-top: 15px;padding: 10px;" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <tr>
                            <td>            
                                <label id="dateiau" for="inputfile" class="btn">Datei auswählen...</label>                   
                                <input style="visibility:hidden; display:none; border: 1px;" id="inputfile" class="inputfile" type="file" name="import_file" />
                                {{ csrf_field() }} 

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">                              
                            </td>                           
                        </tr>
                        <tr>
                             <td>
                                <label id="labelImport" style="float:left;">Typ:</label>                            
                                    <input type="radio" id="kundenimp" name="Typ" value="Kunden"> Kunden </input>
                                    <input type="radio" id="artikelimp" name="Typ" value="Artikel"> Artikel </input>
                                    <input class="TButton" type="submit" value="Ok" style="float:right;">&nbsp;

                                <br><br>
                            </td>
                        </tr>
                    </form>                      
                        <tr>
                            <th id="labelImport">Export:</th>                            
                        </tr>
                        <tr>
                             <td>
                                <label id="labelImport" style="float:left;">Typ:</label>
                                 <a href="{{ URL::to('exportKundentoCSV(/csv') }}" ><button id="bUebersicht" style="margin-top:10px;">Kunden</button></a>
                                <a href="{{ URL::to('exportArtikeltoCSV(/csv') }}" ><button id="bUebersicht" style="margin-top:10px;">Artikel</button></a>
                                <br><br><br>
                            </td>
                        </tr>

                        <tr>
                            <th id="labelImport" style="bottom:-100px;">Termintypen</th>
                        </tr>
                        <tr>
                            <td>

                                <button type="button" onclick="showHideTH()" id="bUebersicht" >Anlegen</button>


                                <button type="button" onclick="showHideTAU()" id="TUmbenennen" class="TButton" >Umbenennen</button>


                                <button type="button" onclick="showHideTAL()" id="TLoeschen" class="TButton" >Löschen</button>

                            </td>
                        </tr>
                        <tr>
                            <td id="THinzufuegen" style="display:none;">
                                <div style="font-size:20px;padding:15px;">
                                        <form class="form-inline" action="{{ url('/Einstellungen/TTAnlegen') }}" method="post">
                                            Bezeichnung:&nbsp;<div class="form-group"><input type="text" class="form-control input-lg" name="TName" style="height:50px;">
                                </div>
                                            <button type="submit" id="submitButton" class="btn" style="width:360px;margin-top:15px;">OK</button>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        </form>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td >
                            <div id="TAuswaehlenU" style="font-size:20px;">
                                        <form class="form-inline" action="{{ url('/Einstellungen/TTUmbenennen') }}" method="post">
                                <select data-placeholder="Termintyp auswählen..." id="termintyp_select" name="TUmbenennen" class="chosen-select" style="width:360px;" tabindex="2" >
                                    <option value=""></option>
                                    @foreach ($termintyp as $tt)
                                    <option>{{$tt->description}}</option>
                                    @endforeach
                                </select><br><br>
                                Bezeichnung:
                                <div class="form-group">
                                <input type="text"  class="form-control input-lg" name="neueBez">
                                </div><br><br>
                                <button type="submit" class="btn .btn-default" id="submitButton" style="width:360px;"> Umbenennen </button>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td >
                            <div id="TAuswaehlenL">
                             <form action="{{ url('/Einstellungen/TTLoeschen') }}" method="post">
                                <select data-placeholder="Termintyp auswählen..." id="termintyp_select" name="TLoeschen" class="chosen-select" style="width:350px;" tabindex="2" >
                                    <option value=""></option>
                                    @foreach ($termintyp as $tt)
                                    <option>{{$tt->description}}</option>
                                    @endforeach
                                </select>
                                    <button type="submit" class="btn .btn-default" id="submitButton" style="margin-left:10px;"> Löschen </button>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            <br><br>


                            </div>
                            </td>
                        </tr>










                        <tr>
                            <th id="labelImport" style="bottom:-100px;">Artikel</th>
                        </tr>
                        <tr>
                            <td>
                                <form action="{{url('/Artikel_Hinzufuegen')}}" method="get">
                                    <button  id="bUebersicht" type="submit" >Anlegen</button>
                                </form>
                                
                                <form action="{{url('/Artikel_Bearbeiten')}}" method="get">
                                    <button  id="bUebersicht" type="submit" >Bearbeiten</button>
                                </form>

                                <button type="button" onclick="showHideAAL()" id="ALoeschen" class="TButton" >Löschen</button>

                            </td>
                        </tr>
                  
                        <tr>
                            <td >
                            <div id="AAuswaehlenL">
                             <form action="{{ url('/Einstellungen/ALoeschen') }}" method="post">
                                <select data-placeholder="Artikel auswählen..." id="artikel_select" name="ALoeschen" class="chosen-select" style="width:350px;" tabindex="2" >
                                    <option value=""></option>
                                    @foreach ($artikel as $a)
                                    <option>{{$a->aNr}}. {{$a->articlename}}</option>
                                    @endforeach
                                </select>
                                    <button type="submit" class="btn .btn-default" id="submitButton" style="margin-left:10px;"> Löschen </button>
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                            <br><br>


                            </div>
                            </td>
                        </tr>














                        <tr>
                            <th id="labelImport">Mitarbeiter/Kunde Anlegen</th>
                        </tr>
                        <tr>
                            <td style="float:left;">
                                <form action="{{url('/Mitarbeiter_Hinzufuegen')}}" method="get" style="float:left;">
                                    <button  id="bUebersicht" type="submit" >Mitarbeiter anlegen</button>
                                </form>
                            </td>
                            
                            <td style="float:right;">
                                <form action="{{url('/Kunden_Hinzufuegen')}}" method="get">
                                    <button  id="bUebersicht" type="submit" >Kunden anlegen</button>
                                </form>
                             </td>
                            
                        </tr>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>

<!-- Menu Toggle Script  -->
<script>
$("#inputfile").bind("change", function() {
    var selected_file_name = $('#inputfile').val();
    if ( selected_file_name.length > 0 ) {
        var array = selected_file_name.split("\\");
        document.getElementById('dateiau').innerHTML = array[array.length-1];
    }
    else {
        
    }
});

  $("#menu-toggle").click(function(e) {
     e.preventDefault();
     $("#wrapper").toggleClass("toggled");

     if(document.getElementById("menu-toggle").textContent == ">"){
        document.getElementById("menu-toggle").innerHTML = "<";
    }else{
        document.getElementById("menu-toggle").innerHTML = ">";
    }       
});
   $(document).ready(function() {
     $(".chosen-select").chosen();
     $("#TUmbenennen").click();
     $("#TLoeschen").click();
     $("#AUmbenennen").click();
     $("#ALoeschen").click();
 });

   //Termintyp
   function showHideTH(){
        if($("#THinzufuegen").css('display')=='none'){
          $("#THinzufuegen").css('display','inline');
          $("#TAuswaehlenU").css('display','none');
          $("#TAuswaehlenL").css('display','none');
        }else{
          $("#THinzufuegen").css('display','none');
        }
   }

   function showHideTAU(){
        if($("#TAuswaehlenU").css('display')=='none'){
          $("#TAuswaehlenU").css('display','inline');
          $("#TAuswaehlenL").css('display','none');
          $("#THinzufuegen").css('display','none');
        }else{
          $("#TAuswaehlenU").css('display','none');
        }
   }

   function showHideTAL(){
        if($("#TAuswaehlenL").css('display')=='none'){
          $("#TAuswaehlenU").css('display','none');
          $("#TAuswaehlenL").css('display','inline');
          $("#THinzufuegen").css('display','none');
        }else{
          $("#TAuswaehlenL").css('display','none');
        }
   }

   //Artkel
   function showHideAH(){
        if($("#AHinzufuegen").css('display')=='none'){
          $("#AHinzufuegen").css('display','inline');
          $("#AAuswaehlenU").css('display','none');
          $("#AAuswaehlenL").css('display','none');
        }else{
          $("#AHinzufuegen").css('display','none');
        }
   }

   function showHideAAU(){
        if($("#AAuswaehlenU").css('display')=='none'){
          $("#AAuswaehlenU").css('display','inline');
          $("#AAuswaehlenL").css('display','none');
          $("#AHinzufuegen").css('display','none');
        }else{
          $("#AAuswaehlenU").css('display','none');
        }
   }

   function showHideAAL(){
        if($("#AAuswaehlenL").css('display')=='none'){
          $("#AAuswaehlenU").css('display','none');
          $("#AAuswaehlenL").css('display','inline');
          $("#AHinzufuegen").css('display','none');
        }else{
          $("#AAuswaehlenL").css('display','none');
        }
   }





</script>

</body>

</html>





