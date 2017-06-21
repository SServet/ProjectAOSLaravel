<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class MailController extends Controller{

public function sendMailArbeitsschein(){
	Mail::send('pdfview', [], function ($message)
		{
			$message->to('servet.simsek@outlook.com', 'Servet')->subject('Arbeitsschein');
			$user = Auth::user();
			$mail = $user->email;
			$message->to($mail, $user->lastname)->subject('Arbeitsschein');
		});
}

public function sendMailArbeitsscheinTicket(){
	Mail::send('pdfviewAT', [], function ($message)
		{
			$message->to('servet.simsek@outlook.com', 'Servet')->subject('Arbeitsschein Ticket!');
			$user = Auth::user();
			$mail = $user->email;
			$message->to($mail, $user->lastname)->subject('Arbeitsschein Ticket');
		});
}

public function sendMailArbeitsscheinProjekt(){
	Mail::send('pdfviewAT', [], function ($message)
		{
			$message->to('servet.simsek@outlook.com', 'Servet')->subject('Arbeitsschein Projekt!');
			$user = Auth::user();
			$mail = $user->email;
			$message->to($mail, $user->lastname)->subject('Arbeitsschein Projekt');
		});
}

public function sendMailProjektClosed(){
	Mail::send('mail_projekt_closed', [], function ($message)
		{
			$message->to('servet.simsek@outlook.com', 'Servet')->subject('Projekt geschlossen!');
			$user = Auth::user();
			$mail = $user->email;
			$message->to($mail, $user->lastname)->subject('Projekt geschlossen!');
		});
}

public function sendMailTicketClosed(){
	Mail::send('mail_ticket_closed', [], function ($message){
		$message->to('i13090@student.htlwrn.ac.at', 'Servet')->subject('Ticket geschlossen!');
		$user = Auth::user();
		$mail = $user->email;
		$message->to($mail, $user->lastname)->subject('Ticket geschlossen!');
	});
}

}