<?php
require_once 'Koneksi.php';

$db = new Koneksi();

if(isset($_GET['action']) && $_GET['action'] == 'delete') {
    $db->deleteUser($_GET['id']);
    header('Location: index.php');
    exit;
}
?>
