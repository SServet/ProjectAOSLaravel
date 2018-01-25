<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Arbeitsschein;
use App\Models\Projects;
use App\Models\Article;
use Illuminate\Support\Facades\DB;


class ProjektController extends Controller
{
    //
	public function showProjekt(){
		return view('projekte');
	}

	public function showProjektHinzufuegen(){
		return view('pHinzufuegen');
	}
    public function showAProjektHinzufuegen(){
        return view('apHinzufuegen');
    }

    public function showProjektUebersicht(){
      return view('pUebersicht');
  }

  public function showProjektEdit(){
    return view('pEdit');
}

public function closeProjekt(Request $request){
    $projekt = projects::where('pid', '=', $request->get('pid'))->first();
    $projekt->finishedOn = date('Y-m-d');
    
    if(!empty($projekt->settledOn)){
        $projekt->isClosed = 1;
    }

    $projekt->lastUpdatedAt = date('Y-m-d H:i:s');

    $projekt->save();

    if($projekt->isClosed === 1){
        $p = projects::orderBy('lastUpdatedAt', 'DESC')->take(1)->get();
        view()->share('p',$p);
        \App::call('App\Http\Controllers\MailController@sendMailProjektClosed');
    }

    return redirect('Projekte');
}

public function settleProjekt(Request $request){
    $projekt = projects::where('pid', '=', $request->get('pid'))->first();
    $projekt->settledOn = date('Y-m-d');
    $projekt->finishedOn = date('Y-m-d');

    if(!empty($projekt->finishedOn)){
        $projekt->isClosed = 1;
    }

    $projekt->lastUpdatedAt = date('Y-m-d H:i:s');

    $projekt->save();

    if($projekt->isClosed === 1){
        $p = projects::orderBy('lastUpdatedAt', 'DESC')->take(1)->get();
        view()->share('p',$p);
        \App::call('App\Http\Controllers\MailController@sendMailProjektClosed');
    }

    return redirect('Projekte');
}

public function submitAProjekt(Request $request){
    $AProjekt = new Arbeitsscheinprojekt;
    $artikel = new Article;
    $cache;

    if(count(explode('.',$request->get('artid'))) != 1){
        $artikel->articlename = explode('.',$request->get('artid'))[1];
        $artikel->artid = explode('.',$request->get('artid'))[0];
        $artikel->agid=14;
        $cache = explode('.',$request->get('artid'))[0];

    }
    else{
        $artikel->artid = $request->get('artid');
        $artikel->articlename = $request->get('artid');
        $artikel->agid=14;
        if($artikel->artid != '' and $artikel->articlename != ''){
            $artikel->save();
            $cache = $request->get('artid');
        }
    }

    $AProjekt->pid = $request->get('pid');
    $AProjekt->mid = $request->get('mid');
    $AProjekt->artAnz = $request->get('artAnz');

    $AProjekt->description = $request->get('description');
    $AProjekt->ttid = explode('.',$request->get('ttid'))[0];
    $AProjekt->tkid = explode('.',$request->get('tkid'))[0];
    $AProjekt->dateFrom = $request->get('dateFrom');

    if($request->get('dateTo') == ''){
        $AProjekt->dateTo = null;            
    } else {
        $AProjekt->dateTo = $request->get('dateTo');
    }

    if($request->get('timeFrom') == ''){
     $AProjekt->timeFrom  = null;

     } else {
         $AProjekt->timeFrom = $request->get('timeFrom');
     }

     if($request->get('timeTo') == ''){
        $AProjekt->timeTo  = null;

    } else {
        $AProjekt->timeTo = $request->get('timeTo');
    }

    if($request->get('billedTime') == ''){
        $AProjekt->billedTime  = null;

    } else {
     $AProjekt->billedTime = $request->get('billedTime');
    }

    if($request->get('kulanzzeit') == ''){
     $AProjekt->kulanzzeit  = null;

    } else {
        $AProjekt->kulanzzeit = $request->get('kulanzzeit');
    }

    if($request->get('kulanzgrund') == ''){
     $AProjekt->kulanzgrund  = null;

    } else {
        $AProjekt->kulanzgrund = $request->get('kulanzgrund');
    } 
    if($request->get('kulanzzeit') == ''){
        $AProjekt->kulanzgrund  = null;

    } else {
        $AProjekt->kulanzgrund = $request->get('kulanzzeit');
    }
    if($request->get('artid') == ''){
        $AProjekt->artid = null;
    }else{
        $AProjekt->artid = $cache;
    }
    $AProjekt->save();


    return \App::call('App\Http\Controllers\AP_ItemController@pdfview'); 

    return redirect('Projekte');

}

public function submit(Request $request){

    $projekt = new projects;
 
    $projekt->kid = explode('.',$request->get('kid'))[0];
    $projekt->mid = $request->get('mid');
    $projekt->label = $request->input('label');
    $projekt->description = $request->get('description');
    $projekt->projectType = $request->get('projectType');

    $projekt->creationDate = $request->get('creationDate');

    if($request->get('projectVolume') == ''){
      $projekt->projectVolume = null;

    } else {
       $projekt->projectVolume = $request->get('projectVolume');
    }

    if($request->get('finishedOn') == ''){
       $projekt->finishedOn = null;

    } else {
        $projekt->finishedOn = $request->get('finishedOn');
    }

    if( $request->get('settledOn') == ''){
        $projekt->settledOn = null;

    } else {
        $projekt->settledOn = $request->get('settledOn');
    }

  
    if($projekt->finisehOn != null and $projekt->settledOn != null){
        $projekt->isClosed = 1;
    }

    $projekt->save();

    if($projekt->isClosed === 1){
            $p = Projekte::orderBy('pid', 'DESC')->take(1)->get();
            view()->share('p', $p);
            \App::call('App\Http\Controllers\MailController@sendMailProjektClosed');

        }

    return redirect('Projekte');
    }

public function submitEditProjekt(Request $request){
    $projekt = Projekte::find($request->get('pid'));
    $projekt->pid = $request->get('pid');
    $projekt->kid = $request->get('kid');
    $projekt->mid = $request->get('mid');   


    $projekt->label = $request->input('label');
    $projekt->description = $request->get('description');
    $projekt->creationDate = $request->get('creationDate');

    if($request->get('finishedOn') == ''){
        $projekt->finishedOn = null;

    } else {
        $projekt->finishedOn = $request->get('finishedOn');
    }

    if( $request->get('settledOn') == ''){
        $projekt->settledOn = null;

    } else {
        $projekt->settledOn = $request->get('settledOn');
    }

    if($projekt->finishedOn != null and $projekt->settledOn != null){
        $projekt->isClosed = 1;
    }

    $projekt->save();

    if($projekt->isClosed === 1){
            $p = Projekte::orderBy('pid', 'DESC')->take(1)->get();
            view()->share('p', $p);
            \App::call('App\Http\Controllers\MailController@sendMailProjektClosed');

        }

    return redirect('Projekte');
}
}
