<?php
    require_once '../../../dBConfig/dBConnect.php';
        $ql = $connect->query("SELECT * FROM sms_level");
		$rs = mysqli_fetch_array($ql);
		$level = $rs['level'];
		$q = $connect->query("SELECT * FROM sms_stock WHERE orderlevel <= $level ORDER BY item ASC ");

		$html ='<img src = "kiooLogo/ioo.png" width = "180px" height = "120px" style = "margin-left:40%"/>
		        <h1 style = "text-align:center;">VICTORIA STATIONS</h1>
                <h2 style = "text-align:center;">LIST OF RE-ORDER ITEMS</h2>
		         <table border = "1" width = "100%" cellspacing = "0" cellpadding = "0">
	<tr style = "background: #1E90FF;">
	<th>SN</th>
	<th>Barcode</th>
	<th>Item</th>
	<th>Stock unit</th>
	</tr>';
        $a = 1;
        while($rw = mysqli_fetch_array($q)){
	
	$html .= '<tr>
	<td>' . $a. ' </td>
	<td>' . $rw['barcode'] . '</td>
	<td>' . $rw['item'] . '</td>
	<td>' . $rw['qnty'] . '</td>

	</tr>';
    $a++;
	}

	$html .='</table>';

include("../mpdf.php");

$mpdf=new mPDF('c','A4','','',32,25,27,25,16,13); 

$mpdf->SetDisplayMode('fullpage');

// LOAD a stylesheet
$stylesheet = file_get_contents('mpdfstyletables.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text

$mpdf->WriteHTML($html);

$mpdf->jSWord = 0;	// Proportion (/1) of space (when justifying margins) to allocate to Word vs. Character
$mpdf->jSmaxChar = 0;	// Maximum spacing to allocate to character spacing. (0 = no maximum)

$mpdf->Output();
/*$content = $mpdf->Output('', 'S');

$content = chunk_split(base64_encode($content));

$mailto = 'recipient@domain.com';

$from_name = 'Your name';

$from_mail = 'sender@domain.com';

$replyto = 'sender@domain.com';

$uid = md5(uniqid(time()));

$subject = 'Your e-mail subject here';

$message = 'Your e-mail message here';

$filename = 'filename.pdf';

$header = "From: ".$from_name." <".$from_mail.">\r\n";

$header .= "Reply-To: ".$replyto."\r\n";

$header .= "MIME-Version: 1.0\r\n";

$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

$header .= "This is a multi-part message in MIME format.\r\n";

$header .= "--".$uid."\r\n";

$header .= "Content-type:text/plain; charset=iso-8859-1\r\n";

$header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";

$header .= $message."\r\n\r\n";

$header .= "--".$uid."\r\n";

$header .= "Content-Type: application/pdf; name=\"".$filename."\"\r\n";

$header .= "Content-Transfer-Encoding: base64\r\n";

$header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";

$header .= $content."\r\n\r\n";

$header .= "--".$uid."--";

$is_sent = @mail($mailto, $subject, "", $header);

$mpdf->Output();

exit;
}
**/
exit;
?>