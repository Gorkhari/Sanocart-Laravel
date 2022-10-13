<?php 
$username = $name;
$book_id = $book_id;
$email = $email;
         $to = $email;
         $subject = 'Auto Generated Link';
         $headers = 'From: Supports@smartindoors.com.au'       . "\r\n" .
                 'Reply-To: Supports@smartindoors.com.au' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
         $headers .= "MIME-Version: 1.0\r\n";
         $headers .= "Content-type: text/html\r\n";
         $message = '<html><body>';
         $message .= '<div style="margin:0;font-weight:lighter;background:#f0f4f7;">
    <table class="m_6501530908114331344layout" style="font-family:Helvetica,Arial,sans-serif;background:#f0f4f7;width:100%">
      <tbody><tr>
        <td>
          <table cellspacing="0" class="m_6501530908114331344page-container" width="505" align="middle" style="font-family:Helvetica,Arial,sans-serif;border-spacing:0;background-color:#fff;max-width:505px!important;display:block!important;margin:25px auto!important;clear:both!important">
            <tbody><tr class="m_6501530908114331344header" style="background-color:rgba(218, 23, 23, 0.03);">
              <td class="m_6501530908114331344row" style="border-left:1px solid #e7e7e7;border-right:1px solid #e7e7e7;border:none;padding:20px 35px">
          <img alt="lasaioffice" height="80" width="300" src="https://www.sanocart.com/wp-content/uploads/2020/11/cropped-green_logo.png" class="CToWUd">
              </td>
            </tr>
            <tr class="m_6501530908114331344subject" style="background-color:#fff">
              <td class="m_6501530908114331344primary-message" style="padding:20px 35px 0">
                  <p style="margin:20px 0;line-height:1.45">Hi ' .$username. '</p>



<h2 class="m_6501530908114331344centered" style="font-size:24px;font-weight:bold;margin:0;margin-bottom:30px;display:block;text-align:center;margin-bottom:0;color:#eb2028;">
  Just one more click
</h2>


<table class="m_6501530908114331344email-btn" style="font-family:Helvetica,Arial,sans-serif;background:#eb2028;padding:10px">
  <tbody><tr>
    <td>
 <a href="https://kapada.smartindoors.com.au/book/template_book.php?book_id=' .$book_id. '&email=' .$email. '" style="text-decoration:none;color:#088df6;color:#fff;" target="_blank">Activate Account</a>
    </td>
  </tr>
</tbody>
</table>
                  <p style="margin:20px 0;line-height:1.45">
                    <strong style="font-weight:bold">
                      Kind Regards, <br>
                      Gorkhari
                    </strong>
                  </p>
              </td>
            </tr>
            

<img src="" alt="" width="1" height="1" border="0" style="height:1px!important;width:1px!important;border-width:0!important;margin-top:0!important;margin-bottom:0!important;margin-right:0!important;margin-left:0!important;padding-top:0!important;padding-bottom:0!important;padding-right:0!important;padding-left:0!important" class="CToWUd"><div class="yj6qo"></div><div class="adL">
</div></div>';
$message .= '</body></html>';

         

         mail ($to, $subject, $message, $headers);

	
	
// 	
	
    
    ?>