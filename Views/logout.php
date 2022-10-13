<?php
session_destroy();

header('location: ' . FRONT_ROOT . 'Home/Index');
?>