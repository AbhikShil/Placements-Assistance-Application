<?php
session_start();
include('connection.php');
$note_id = $_POST['id'];
$_SESSION['p_id']=$note_id;
?>