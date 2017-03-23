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

Route::get('/home', ['uses' => 'IndexController@showIndex']);


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

Route::post('/SubmitProject', ['as' => 'SubmitProject', 'uses' => 'ProjektController@submit']);
Route::post('/SubmitArbeitS', ['as' => 'SubmitArbeitS', 'uses' => 'ArbeitsscheinController@submit']);
Route::post('/SubmitTicket', ['as' => 'SubmitTicket', 'uses' => 'TicketController@submit']);

Auth::routes();