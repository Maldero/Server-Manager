<?php
function checkUserInPasswd($user) {
  $etcPasswd = file_get_contents('/etc/passwd');
  $fileExplode = explode(chr(10), $etcPasswd);
  $result = array_filter($fileExplode, 
    function($var) use ($user) {
      return preg_match("/\b$user+:x\b/i", $var);
    });
  if(count($result) > 0)
    return true;
  else
    return false;
}

function checkUserInDatabase($user, $passwd) {
 $query = mysql_query("SELECT user_name, passwd FROM users WHERE user_name = '".$user."' AND passwd = '".$password."';");
 if(mysql_num_rows($query) > 0)
   return true;
 else 
   return false;
}

function checkUserPosition($user) {
  $query = mysql_query("SELECT user_pos FROM users WHERE user_name = '".$user."';");
  $mysqlToArray = mysql_fetch_array($query);
  switch($mysqlToArray[0]) {
    case "0":
      $_SESSION['logged'] = "User";
      break;
    case "1":
      $_SESSION['logged'] = "Administrator";
      break;
  }
  return $_SESSION['logged'];
}

function shutdownButton() {
  system("sudo init 0");
}

function rebootButton() {
  system("sudo init 6");
}
?>
