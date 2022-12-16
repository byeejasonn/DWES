<?php
session_name('sessionIdColors');
@session_start();

$name = (isset($_SESSION['name']))?$_SESSION['name']:'';
$bgColor = (isset($_SESSION['bg-color']))?$_SESSION['bg-color']:'#ffffff';
$fgColor = (isset($_SESSION['fg-color']))?$_SESSION['fg-color']:'#000000';
?>