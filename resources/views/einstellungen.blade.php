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
        $termintyp = DB::table('termintyp')->get();
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
                            <th id="labelImport">&nbsp;Import:</th>
                            
                        </tr>

                        <form style="margin-top: 15px;padding: 10px;" action="{{ URL::to('importKundenfromCSV') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        <tr>
                            <td>            
                                <label for="inputfile" class="btn">Datei auswählen...</label>                   
                                <input style="visibility:hidden; display:none; border: 1px;" id="inputfile" class="inputfile" type="file" name="import_file" />
                                {{ csrf_field() }} 

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">                              
                            </td>                           
                        </tr>
                        <tr>
                             <td>
                                Typ:
                                <button class="importExportButton">Kunden</button></a>
                                <button class="importExportButton">Artikel</button></a>
                                <br><br>
                            </td>
                        </tr>
                         </form>                         
                        <tr>
                            <th id="labelImport">&nbsp;Export:</th>                            
                        </tr>
                        <tr>
                             <td>
                                Typ:
                                 <a href="{{ URL::to('exportKundentoCSV(/csv') }}" ><button class="importExportButton">Kunden</button></a>
                                <a href="{{ URL::to('exportArtikeltoCSV(/csv') }}" ><button class="importExportButton">Artikel</button></a>
                            </td>
                        </tr>


                        
                        

                        <tr>
                            <th>Termintypen</th>
                        </tr>
                        <tr>
                            <td>
                                <select data-placeholder="Termintyp auswählen..." id="termintyp_select" class="chosen-select" style="width:350px;" tabindex="2">
                                    <option value=""></option>
                                    @foreach ($termintyp as $tt)
                                    <option>{{$tt->ttid}}. {{$tt->description}}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                        </tr>
                        <tr>
                            <td style="float:left;width: 150px;">
                                <form action="{{url('/Mitarbeiter_Hinzufuegen')}}" method="get" style="float:left;width: 150px;">
                                    <button  class="importExportButton" type="submit" >Mitarbeiter anlegen</button>
                                </form>
                            </td>
                            
                            <td style="float:right;width: 150px;">
                                <form action="{{url('/Kunden_Hinzufuegen')}}" method="get" style="width: 150px;">
                                    <button  class="importExportButton" type="submit" >Kunden anlegen</button>
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
 });



</script>

</body>

</html>





