<?php 
$username = $row_book['name'];
$book_id = $row_book['book_id'];
         $to = $row_book['email'];
         $subject = 'Thank you for request to book the event';
         $headers = 'From: Supports@smartindoors.com.au'       . "\r\n" .
                 'Reply-To: Supports@smartindoors.com.au' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();
         $headers .= "MIME-Version: 1.0\r\n";
         $headers .= "Content-type: text/html\r\n";
         $message = '<html><body>';
         $message .= '<div style="margin:0;font-weight:lighter;background:#f0f4f7;">
    <table class="m_6501530908114331344layout" style="font-family:Helvetica,Arial,sans-serif;background:#f0f4f7;width:100%">
      <tbody>
            <tr class="m_6501530908114331344subject" style="background-color:#fff">
              <td class="m_6501530908114331344primary-message" style="padding:20px 35px 0">
                  <p style="margin:20px 0;line-height:1.45">Hi ' .$username. ',</p>
<h2 class="m_6501530908114331344centered" style="font-size:16px;font-weight:bold;margin:0;margin-bottom:30px;display:block;margin-bottom:0;">
  We will let you know once we check the events.
</h2>
                  <p style="margin:20px 0;line-height:1.45">
                    <strong style="font-weight:bold">
                      Kind Regards, <br>
                      Gorkhari
                    </strong>
                  </p>
              </td>
            </tr>
            ';
$message .= '</body></html>';

         

         mail ($to, $subject, $message, $headers);

	
	
// 	
	
    
    ?>