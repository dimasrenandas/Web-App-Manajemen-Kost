<?php 

 ?>
<html>
   
   <head>
      <title>Welcome User</title>
   </head>
   
   <body>
      
      <?php
      
require_once "admin_connect.php";
$sql = "SELECT username , id , fullname , email from users where id = (SELECT max(id) FROM users) ";

$result = $link -> query($sql);

if ($result -> num_rows > 0 )
{
    while ($row = $result -> fetch_assoc())
    {
        $hotspot = $row["username"];
        $user = $row["id"];
        $namanya = $row["fullname"];
        $emailnya = $row["email"];
    }
}

  //  echo "Mengirim Akun ke Email Anda Mohon Menunggu...<br>";
	// echo "Halaman otomatis redirect pada login soda2a...<br>";
         $to = $emailnya;
         $subject = "SODA2A SELAMAT DATANG PENGHUNI BARU";
         $hotspot .= $user;
         $message = '<table width="100%" cellpadding="0" cellspacing="0" border="0">
         <tr>
             <td width="100%">
                 <div class="column-1">
                     <div class="content">
                         <img src="http://tinyurl.com/soda2a/SODA/uploads/sodalogo.png" alt="" style="max-width:100%;">
                     </div>
                 </div>
                 <div class="column-2">
                     <div class="content">
                         <h2>KOST SODA2A</h2>
                     </div>
                 </div>
             </td>
         </tr>
         <tr>
             <td width="100%">
                 <p>JL.SUKODAMI III 2A</p>
             </td>
         </tr>
         <tr>
         <td width="100%">
             0821-2222-99-105
         </td>
     </tr>
     <tr>
     <td width="100%">
 <p> soda2a.sub@gmail.com </p>
     </td>
 </tr>
 <tr>
 <td width="100%">
 <p>soda2a.net , tinyurl.com/soda2a</p>
 <a href="https://tinyurl.com/soda2a">Website.</a>
 </td>
</tr>
<tr>
<td width="100%">
<p>Luangkan waktu sejenak untuk berbagi ulasan pengalaman </p><a href="https://tinyurl.com/ulasansoda2a">Review Kami disini. </a> <p>Tanggapan Anda sangat bermanfaat bagi kami serta membantu calon penghuni yang akan datang.</p>
</td>
</tr>
         <tr>
         <td width="100%">
             <p>Hi '.$namanya.',
             Selamat Datang di KOST SODA2A !  Terimakasih telah memilih untuk tinggal bersama kami dan berharap dapat memberikan Anda pengalaman yang tak terlupakan.
             Untuk kenyamanan Anda, KOST SODA2A menawarkan beberapa fasilitas yang dapat digunakan oleh penghuni , seperti Kartu Akses Keluar Masuk , Login Hotspot SODA2A , Paket IPTV Wifi , dan pilihan tempat memesan makan termasuk Comingsoon dan Comingsoon.
             Kami dengan tulus mengucapkan terima kasih telah memilih KOST SODA2A dan berharap Anda mendapatkan masa tinggal yang nyaman dan menyenangkan..</p>
         </td>
     </tr>
     <br>
     <tr>
     <td width="100%">
     <p>Terimakasih Salam,</p>
   <p>  ( MANAGEMENT )</p>
 </td>
</tr>
     </table>';
if (!empty($emailnya))
{
          $header = "From:abc@somedomain.com \r\n";
          $header .= "Cc:soda2a.sub@gmail.com \r\n";
          $header .= "MIME-Version: 1.0\r\n";
          $header .= "Content-type: text/html\r\n";
          $retval = mail ($emailnya,$subject,$message,$header);
          if( $retval == true ) {
                echo '<script type="text/javascript">'; 
                echo 'alert("Welcome user berhasil di kirim ke email anda! Apabila tidak menerima inbox silhakan check folder spam email anda. Halaman ini akan redirect login soda2a mohon segera mengupload scan foto identitas anda setelah login.");'; 
                echo 'window.location.href = "users_login.php";';
                echo '</script>';
          }else {
             echo '<script type="text/javascript">'; 
                echo 'alert("Mohon Maaf Sedang Terjadi Kesalahan");'; 
                echo 'window.location.href = "users_login.php";';
                echo '</script>';

          }
}
else
{
 echo '<script type="text/javascript">'; 
                echo 'alert("Nothing Found Here !");'; 
                echo 'window.location.href = "users_login.php";';
                echo '</script>';

echo "Data tidak ditemukan.";
}

      ?>
      
   </body>
</html>