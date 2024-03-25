<?php
if($_POST["msg"]) {
    mail($_POST["to"], "Here is the subject line", $_POST["msg"]. "From: ".$_POST["from"]);
}
?>