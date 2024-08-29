<?php
require "./conn.php";

$invoices = pdf::select();

echo json_encode($invoices);
?>
