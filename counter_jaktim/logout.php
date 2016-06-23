<?php
  session_start();
  $_SESSION[id]     = '';
  $_SESSION[namauser]     = '';
  $_SESSION[passuser]     = '';

  echo "<center>Anda telah sukses keluar sistem <b>[LOGOUT]<b>";

// Apabila setelah logout langsung menuju halaman utama website, aktifkan baris di bawah ini:

    print"<meta http-equiv='refresh' content='1; url=http:index.php'>";
?>
