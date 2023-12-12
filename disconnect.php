<?php
    require_once 'utils/common.php';
    session_destroy();
    header('Location: index.php');
?>