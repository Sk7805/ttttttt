<?php

require("class.phpmailer.php");
require("class.pop3.php");


if($_POST){
	$cname=$_POST['name'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];

       
//Third Party
       $to=$email;
       $mailer = new PHPMailer();
     /*  $mailer->IsSMTP();
       $mailer->SMTPSecure ='ssl';
       $mailer->Host ='smtp.gmail.com';
       $mailer->Port =465;
       $mailer->SMTPAuth =TRUE;
       $mailer->Username ='';  
       $mailer->Password ='';  */
       $mailer->From ='santhosh.sk1243@gmail.com';
       $mailer->FromName ='Santhosh'; 
       $mailer->IsHTML(true); 
       $email_subject="Thank you for your interest";      
       $email_body="

       <p>Dear $name,<br/><br/>
       Thanks for visiting and your valuable enquiry.<br> 
       We will contact you soon!!
       </p>


       ";

       $mailer->Body =$email_body;
       $mailer->Subject =$email_subject;
       $mailer->AddAddress($email);
       $mailer->Send();

 //Admin
       
       
       $mailer1 = new PHPMailer();
     /*  $mailer1->IsSMTP();
       $mailer1->SMTPSecure ='ssl';
       $mailer1->Host ='smtp.gmail.com';
       $mailer1->Port =465;
       $mailer1->SMTPAuth =TRUE;
       $mailer1->Username ='';  
       $mailer1->Password =''; 	*/			
       $mailer1->From =$email;
       $mailer1->FromName =$name; 
       $mailer1->IsHTML(true);   

       $email_subject="Book-a-venue form ";     
       $email_body="
       $name has enquired from the. 

       Name : $cname
       Mobile : $mobile
       Email : $email



       Thanks
       
       ";


       $mailer1->Body =nl2br($email_body);
       $mailer1->Subject =$email_subject;

//TO
$to_admin="sofia.maddur@gmail.com";
       

       $recipients_to1=explode(",",$to_admin);
       foreach($recipients_to1 as $email1)
       {
       	$mailer1->AddAddress($email1);
       }






//$mailer1->AddCC($cc_address);
// $mailer1->AddCC($cc_address1);

//bcc

       $bcc_address = "";
       $mailer1->AddBCC($bcc_address);

       if(!$mailer1->Send())
       {
       	echo "Message was not sent<br/ >";
       	echo "Mailer Error: " .$mailer1->ErrorInfo;
       }
       else
       { 



       }

   }

   ?>
