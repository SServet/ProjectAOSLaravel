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
			$message->to('servet.simsek@outlook.com', 'Servet')->subject('Welcome!');
			$user = Auth::user();
			$mail = $user->email;
			$message->to($mail, $user->lastname)->subject('Ticket geschlossen!');
		});
}

public function sendMailArbeitsscheinTicket(){
	Mail::send('pdfviewAT', [], function ($message)
		{
			$message->to('servet.simsek@outlook.com', 'Servet')->subject('Welcome!');
			$user = Auth::user();
			$mail = $user->email;
			$message->to($mail, $user->lastname)->subject('Ticket geschlossen!');
		});
}

public function sendMailArbeitsscheinProjekt(){
	Mail::send('pdfviewAT', [], function ($message)
		{
			$message->to('servet.simsek@outlook.com', 'Servet')->subject('Welcome!');
			$user = Auth::user();
			$mail = $user->email;
			$message->to($mail, $user->lastname)->subject('Ticket geschlossen!');
		});
}

public function sendMailProjektClosed(){
	Mail::send('mail_projekt_closed', [], function ($message)
		{
			$message->to('servet.simsek@outlook.com', 'Servet')->subject('Welcome!');
			$user = Auth::user();
			$mail = $user->email;
			$message->to($mail, $user->lastname)->subject('Ticket geschlossen!');
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