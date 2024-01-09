<?php
  session_start();
  include "fungsi/koneksi.php";
  mysql_query("update acount set aktif='0' WHERE id_acount='$_SESSION[id_acount]' ");
  session_destroy();
  echo "<script> window.location = './'</script>";
?>
