<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', ['uses' => 'LoginController@showLogin']);

Route::group(['middleware' => 'auth'], function(){
	Route::get('/', ['uses' => 'IndexController@showIndex']);
	Route::get('/home', ['uses' => 'IndexController@showIndex']);
	Route::get('/Arbeitsschein', ['uses' => 'ArbeitsscheinController@showArbeitsschein']);
	Route::get('/Arbeitsschein_Hinzufuegen', ['uses' => 'ArbeitsscheinController@showArbeitsscheinHinzufuegen']);
	Route::get('/Arbeitsschein_Uebersicht', ['uses' => 'ArbeitsscheinController@showArbeitsscheinUebersicht', 'middleware' => 'auth']);
	Route::post('/ArbeitsscheinClose', ['uses' => 'ArbeitsscheinController@closeArbeitsschein']);
	Route::get('/Projekte', ['uses' => 'ProjektController@showProjekt']);
	Route::get('/Projekt_Hinzufuegen', ['uses' => 'ProjektController@showProjektHinzufuegen']);
	Route::get('/Projekte_Uebersicht', ['uses' => 'ProjektController@showProjektUebersicht']);
	Route::post('/ProjektClose', ['uses' => 'ProjektController@closeProjekt']);
	Route::get('/Tickets', ['uses' => 'TicketController@showTicket']);
	Route::post('/TicketClose', ['uses' => 'TicketController@closeTicket']);
	Route::get('/Ticket_Hinzufuegen', ['uses' => 'TicketController@showTicketHinzufuegen']);
	Route::get('/Tickets_Uebersicht', ['uses' => 'TicketController@showTicketUebersicht']);

	Route::post('/ATicket_Hinzufuegen', ['uses' => 'TicketController@showATicketHinzufuegen']); 

	Route::get('/Einstellungen', ['uses' => 'EinstellungenController@showEinstellungen']);
	Route::post('/Einstellungen/TTAnlegen', ['uses' => 'EinstellungenController@ttAnlegen']);
	Route::post('/Einstellungen/TTLoeschen', ['uses' => 'EinstellungenController@ttLoeschen']);
	Route::post('/Einstellungen/TTUmbenennen', ['uses' => 'EinstellungenController@ttUmbenennen']);

	Route::get('/Mitarbeiter_Hinzufuegen', ['uses' => 'MitarbeiterController@showMitarbeiterAnlegen']);
	Route::get('/Kunden_Hinzufuegen', ['uses' => 'KundenController@showKundeAnlegen']);
	Route::post('/SubmitProject', ['as' => 'SubmitProject', 'uses' => 'ProjektController@submit']);
	Route::post('/SubmitArbeitS', ['as' => 'SubmitArbeitS', 'uses' => 'ArbeitsscheinController@submit']);
	Route::post('/SubmitTicket', ['as' => 'SubmitTicket', 'uses' => 'TicketController@submit']);
	Route::post('/SubmitATicket', ['as' => 'SubmitATicket', 'uses' => 'TicketController@submitATicket']);
	Route::post('/SubmitMitarbeiter', ['as' => 'SubmitMitarbeiter', 'uses' => 'MitarbeiterController@submit']);
	Route::post('/SubmitKunde', ['as' => 'SubmitKunde', 'uses' => 'KundenController@submit']);
	Route::get('/Arbeitsschein', ['uses' => 'ArbeitsscheinController@showArbeitsschein']);
	Route::get('/Arbeitsschein_Hinzufuegen', ['uses' => 'ArbeitsscheinController@showArbeitsscheinHinzufuegen']);
	Route::get('/Arbeitsschein_Uebersicht', ['uses' => 'ArbeitsscheinController@showArbeitsscheinUebersicht']);

	Route::get('/Projekte', ['uses' => 'ProjektController@showProjekt']);
	Route::get('/Projekt_Hinzufuegen', ['uses' => 'ProjektController@showProjektHinzufuegen']);
	Route::get('/Projekte_Uebersicht', ['uses' => 'ProjektController@showProjektUebersicht']);

	Route::get('/Tickets', ['uses' => 'TicketController@showTicket']);
	Route::get('/Ticket_Hinzufuegen', ['uses' => 'TicketController@showTicketHinzufuegen']);
	Route::get('/Tickets_Uebersicht', ['uses' => 'TicketController@showTicketUebersicht']);

	Route::get('/Einstellungen', ['uses' => 'EinstellungenController@showEinstellungen']);

	Route::get('exportKundentoCSV(/{type}', 'EinstellungenController@exportKundentoCSV');
	Route::get('exportArtikeltoCSV(/{type}', 'EinstellungenController@exportArtikeltoCSV');
	Route::post('importArtikelfromCSV', 'EinstellungenController@importArtikelfromCSV');
	Route::post('importKundenfromCSV', 'EinstellungenController@importKundenfromCSV');

	Route::get('pdfview',array('as'=>'pdfview','uses'=>'ItemController@pdfview'));

	Route::get('pdfviewAT',array('as'=>'pdfviewAT','uses'=>'AT_ItemController@pdfview'));


});
Auth::routes();
