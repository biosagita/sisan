
<?php

/*
mysql_connect("192.168.20.2", "admin", "") or
    die("Could not connect: " . mysql_error());
mysql_select_db("t84893_pms");
*/

mysql_connect("localhost", "root", "") or
    die("Could not connect: " . mysql_error());
mysql_select_db("bro");

function singleSelect($strQuery) {
  global $sqlCon;
  $sqlRs = mysql_query($strQuery);
  $sqlRow = array();
  $idx = 1;
  while ($row = mysql_fetch_array($sqlRs)) {
  	$sqlRow[$idx++] = $row;
  }
  mysql_free_result($sqlRs);
  return $sqlRow;
}

function singleUpdate($strQuery) {
  global $sqlCon;
  mysql_query($strQuery);
}
?>