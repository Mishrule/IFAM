<?php
$connectionError = "Could not Connect";
$dbhost = "localhost";
$dbuser = "root";
$dpPassword = "";
$db = "ifam";

$conn = mysqli_connect($dbhost, $dbuser, $dpPassword, $db);
if ($conn) {
    // echo "Connected Success";
} else {
    echo $connectionError;
}
// mysqli_close($conn);
?>