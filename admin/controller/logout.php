<?php
    session_start();
    session_destroy();
    header('Location: http://localhost/SIKAS2/admin');
?>