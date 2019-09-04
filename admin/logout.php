<?php require_once("includes/header.php"); ?>

<?php

$session->logout_admin();
$session->logout();
setcookie("drbc","",time()-365*1440*60);
redirect("index.php");

?>