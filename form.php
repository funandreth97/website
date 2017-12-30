<?php
header('Location: ' . $_SERVER['HTTP_REFERER']);

$name = $_POST['name']; // Get username 
$email = $_POST['email'];
$discord = $_POST['discord'];
$msg = $_POST['message'];
$companyemail = "no-reply@adnrescaraballo.com";


$to = 'andres@andrescaraballo.com';
$subject = 'Contact Form Submission Recieved';

function send_mail($to,$subject,$message,$headers){ //Send mail function
if(mail($to,$subject,$message,$headers)){
    echo json_encode(array('info' => 'success', 'msg' => "Your message has been sent. Thank you!"));
    setcookie("form_status", "valid");
} else {
    echo json_encode(array('info' => 'error', 'msg' => "Error, your message hasn't been sent"));
    setcookie("form_status", "invalid");
}
}

//Send Mail
$headers = 'From: ' . $companyemail .''. "\r\n".
'Reply-To: '.$companyemail.'' . "\r\n" .
'X-Mailer: PHP/' . phpversion() . "\r\n".
'Content-type: text/html';

$emailMsg = '
<div class="pageMainAfter" style="position:relative;background:#EAEAEA;box-shadow: 0 0 20px rgba(0,0,0,0.1) inset;font-size:18px;font-family:\'Gill Sans\', \'Gill Sans MT\', Calibri, sans-serif;">
  
  <center style="padding:10px;background:#447CC4;box-shadow:0 0 20px rgba(0,0,0,0.05);max-width:100%;position:relative;left:0;right:0;margin:auto;padding:45px 30px;"><a href="" style="color:white !important;text-decoration:none !important;font-size:40px;">Corey Donenfeld</a>
  <div style="font-size:24px;color:#FFF;margin-left:16px;">Contact Email</div></center><br>
  <center style="text-align:left;max-width:500px;position:relative;left:0;right:0;margin:auto;">
    <div style="margin:15px;padding:30px 15px;background:rgba(255,255,255,0.3);border-left:solid 5px #447CC4;box-shadow: 0 0 20px rgba(0,0,0,0.05);">
      <span style="color:#fff;background:#447CC4;padding:10px;border-radius:2px">Name</span>
      <span style="color:#777;margin-left:10px;">'.$name. '</span>
    </div>
    <div style="margin:15px;padding:30px 15px;background:rgba(255,255,255,0.3);border-left:solid 5px #447CC4;box-shadow: 0 0 20px rgba(0,0,0,0.05);">
      <span style="color:#fff;background:#447CC4;padding:10px;border-radius:2px">Email</span>
      <span style="color:#777;margin-left:10px;">'.$email. '</span>
    </div>
    <div style="margin:15px;padding:30px 15px;background:rgba(255,255,255,0.3);border-left:solid 5px #447CC4;box-shadow: 0 0 20px rgba(0,0,0,0.05);">
      <span style="color:#fff;background:#447CC4;padding:10px;border-radius:2px">Discord</span>
      <span style="color:#777;margin-left:10px;">'.$discord. '</span>
    </div>
    <div style="margin:15px;padding:30px 15px;background:rgba(255,255,255,0.3);border-left:solid 5px #447CC4;box-shadow: 0 0 20px rgba(0,0,0,0.05);">
      <span style="color:#fff;background:#447CC4;padding:10px;border-radius:2px">Message</span>
      <span style="color:#777;margin-left:10px;">'.$msg. '</span>
    </div>
  </center><br><br><br>
  <center class="footerLeft" style="text-decoration:none !important;color:#ffffff;background:#447CC4;width:100%;padding:20px 0;margin:auto;position:absolute;bottom:0;">
      <span>Copyright © 2017 Corey Donenfeld. All Rights Reserved.</span><br>
      <a href="mailto:cdonenfeld26@gmail.com" style="color:#fff !important;color:#fff;text-decoration:none !important; text-decoration:none;">cdonenfeld26@gmail.com</a><br>
  </center><br><br><br></div>';
  
send_mail($to, $subject, $emailMsg , $headers);

echo $emailMsg;
?>