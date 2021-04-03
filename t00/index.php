<?
echo '<h1>Cookie Counter</h1><br>';

if (isset($_COOKIE["count"])) {
    $count = $_COOKIE["count"];
} else {
    $count = 0;
}
$count++;
setcookie("count", $count, time() + 60);
echo "This page was loaded <strong>$count</strong> time(s) in last minute";