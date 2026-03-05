<?php
$host = "sql100.infinityfree.com" ; 
$username = "if0_38953554";         
$password = "laQMnD7IIr6hK";    
$dbname = "if0_38953554_portfolio_db";       
$conn = new mysqli($host, $username, $password, $dbname);

$id = $_GET['id'];

$conn->query("DELETE FROM messages WHERE id=$id");

header("Location: admin_messages.php");

?>