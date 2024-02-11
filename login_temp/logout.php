<?php
    session_start();

    session_unset();
    session_destroy();

    header("Location: /pce_comp_web_programming_lab_anuja-more/index.php");

?>