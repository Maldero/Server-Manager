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
 $query = mysql_query("SELECT user_name, passwd FROM users WHERE user_name = '".$_POST['user']."' AND passwd = '".$_POST['password']."';");
 if(mysql_num_rows($query) > 0)
   return true;
 else 
   return false;
}

?>
