<?
echo '<h1>Cookie Counter</h1><br>';
setcookie("count" . time(), true, time() + 60);
$cookieCount = array_count_values($_COOKIE);
$cookie = $cookieCount[true];
$cookie++;
echo "This page was loaded $cookie time(s) in last minute";