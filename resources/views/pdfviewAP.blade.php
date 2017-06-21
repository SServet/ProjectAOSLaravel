<!DOCTYPE html>
<html>
<head>
  @foreach ($arbeitsscheinTicket as $at)
  <title>Arbeitsschein {{$at->atID}}</title>
  @endforeach

  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
  
  #logo{
    width: 20%;
    position: absolute;
    top: 50px;
    right: 10px;
  }


  /* heading */

      h1 { font: bold 100% Ubuntu, Arial, sans-serif; text-align: center; text-transform: uppercase; }

  /* table */

      table { font-size: 75%; width: 100%; }
      table { border-collapse: separate; border-spacing: 2px; }
      th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: left; }
      th, td { border-radius: 0.25em; border-style: solid; }
      th { background: #EEE; border-color: #BBB; }
      td { border-color: #DDD; }

  /* article */

  article, article address, table.meta, table.inventory { margin: 0 0 3em; }
  article h1 { clip: rect(0 0 0 0); position: absolute; }
  article address { float: left; font-size: 125%; font-weight: bold; }

  /* header */

      header { margin: 0 0 3em; }
      header:after { clear: both; content: ""; display: table; }

      header h1 { background: #000; border-radius: 0.25em; color: #FFF; margin: 0 0 1em; padding: 0.5em 0; }
      header address { float: left; font-size: 75%; font-style: normal; line-height: 1.25; margin: 0 1em 1em 0; }
      header address p { margin: 0 0 0.25em; }
      header span, header img { display: block; float: right; }
      header span { margin: 0 0 1em 1em; max-height: 25%; max-width: 60%; position: relative; }
      header img { max-height: 100%; max-width: 50%; }
      header input { cursor: pointer; -ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)"; height: 100%; left: 0; opacity: 0; position: absolute; top: 0; width: 100%; }




</style>

<script type="text/javascript">
    function download(){
      window.location = "{{ route('pdfviewAT',['download'=>'pdf']) }}";
    }
</script>

</head>
<body onload="download()">

  <a href="/home"> <img src="{{ asset('assets/img/rz_logo.jpg') }}" id="logo"> </a>

  <div id="wrapper">
    @foreach ($mitarbeiter as $mitarbeiter)
    <header>
        <h1>Arbeitsschein</h1>
        <address>
          <p>{{$mitarbeiter->firstname}} {{$mitarbeiter->lastname}}</p>
          <p>Viktor-Kaplan-Str 2A<br>Wiener Neustadt, A2700</p>
        </address>
        <span><img src=""></span>
    </header>
    @endforeach

        @foreach ($kunde as $kunde)
        <address id="kunde">
          <p>{{$kunde->companyname}}<br>{{$kunde->firstname}} {{$kunde->lastname}}</p>
        </address>
        @endforeach
      

      <table class="meta">
          <tr>
            <th><span>Arbeitsscheinnummer</span></th>
            <td><span>{{$arbeitsscheine->asid}}</span></td>
          </tr>
          <tr>
            <th><span>Datum</span></th>
            <td><span>{{date('Y-m-d H:i:s')}}</span></td>
          </tr>
      </table>

      <table class="inventory">
          <tr>
              <th><span>Termintyp</span></th>
              @foreach($termintyp as $termintyp)
              <td><span>{{$termintyp->description}}</span></td>
              @endforeach
            </tr>

            <tr>
              <th><span>Tätigkeitsart</span></th>
              @foreach($taetigkeitsart as $taetigkeitsart)
              <td><span>{{$taetigkeitsart->description}}</span></td>
              @endforeach
            </tr>

            <tr>
              <th><span>Datum von</span></th>
              <td><span>{{$arbeitsscheine->dateFrom}}</span></td>
            </tr>

            <tr>
              <th><span>Datum bis</span></th>
              <td><span>{{$arbeitsscheine->dateTo}}</span></td>
            </tr>  
              
            <tr>  
              <th><span>Zeit von</span></th>
              <td><span>{{$arbeitsscheine->timeFrom}}</span></td>
            </tr>
              
            <tr>
              <th><span>Zeit bis</span></th>
               <td><span>{{$arbeitsscheine->timeTo}}</span></td>
            </tr>
              
            <tr>
              <th><span>Verrechnete Zeit</span></th>
              <td><span>{{$arbeitsscheine->billedTime}}</span></td>
            </tr>  
              
            <tr>
              <th><span>Kulanzzeit</span></th>
              <td><span>{{$arbeitsscheine->kulanzzeit}}</span></td>
            </tr>  
            <tr>
              <th><span>Kulanzgrund</span></th>
              <td><span>{{$arbeitsscheine->kulanzgrund}}</span></td>
            </tr>
            
            <tr>
              <th><span>Beschreibung</span></th>
              <td><span>{{$arbeitsscheine->description}}</span></td>
            </tr>
            
            <tr>
              <th><span>Artikel</span></th>
              @foreach($artikel as $artikel)
              <td><span>{{$arbeitsscheine->artAnz}}x {{$artikel->articlename}}</span></td>
              @endforeach
            </tr>


        </table>

        <div id="signaturename">
          Unterschrift:
        </div>

        <div id="signature">
          <p id="date"><span>{{date('Y-m-d H:i:s')}}</span></p>
        </div>


    </div>


  

</body>
</html>