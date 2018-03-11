<?php 
echo '<p>Hello World</p>';
echo $_SERVER['REMOTE_ADDR'];
echo $_SERVER['HTTP_X_FORWARDED_FOR'];
phpinfo();
?>