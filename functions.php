<?php
//выполняет запрос к базе данных и формирует по результатам выборки массив
function get_price() {

 $sql = "SELECT `temp0`, `firm`, `model`, `room`, `dateBuy`, `dateExpl`, `dateRepair`, `yearAmortis`, `person`, `status` FROM `storage`";
 $result = mysql_query($sql);
 
 if(!$result) {
  exit(mysql_error());
 }
 
 $row = array();
 for($i = 0;$i < mysql_num_rows($result);$i++) {
  $row[] = mysql_fetch_assoc($result);
 }
 
 return $row; 
}