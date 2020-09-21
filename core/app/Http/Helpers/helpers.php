<?php
use App\Etemplate;
use App\General;


if (! function_exists('send_email')) {
    
    function send_email( $to, $name, $subject, $message)
    {
        $temp = Etemplate::first();
        $gnl = General::first();

        $template = $temp->emessage;
        $from = $temp->esender;
		if($gnl->emailnotf == 1)
		{

			$headers = "From: $gnl->title <$from> \r\n";
			$headers .= "Reply-To: $gnl->title <$from> \r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

			$mm = str_replace("{{name}}",$name,$template);     
			$message = str_replace("{{message}}",$message,$mm); 

			if (mail($to, $subject, $message, $headers)) {
			  // echo 'Your message has been sent.';
			} else {
			 //echo 'There was a problem sending the email.';
			}
			
			
			///////////////// ADMIN EMAIL
			if (mail('admin@thebitcell.com', $subject, $message, $headers)) {
			  // echo 'Your message has been sent.';
			} else {
			 //echo 'There was a problem sending the email.';
			}
			
			
			
			

		}

    }
}

if (! function_exists('send_sms')) 
{
    
    function send_sms( $to, $message)
    {
        $temp = Etemplate::first();
        $gnl = General::first();
        
		if($gnl->smsnotf == 1)
		{

			$sendtext = urlencode("$message");
		    $appi = $temp->smsapi;
			$appi = str_replace("{{number}}",$to,$appi);     
			$appi = str_replace("{{message}}",$sendtext,$appi); 
			$result = file_get_contents($appi);
		}

    }
}