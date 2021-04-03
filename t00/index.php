<?php
echo '<h1>Cookie Counter</h1><br>';

$count = isset($_COOKIE["count"]) ? $_COOKIE["count"] : 0;
$count++;
setcookie("count", $count, time() + 60);
echo "This page was loaded <strong>$count</strong> time(s) in last minute";