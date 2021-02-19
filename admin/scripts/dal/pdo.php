<?php
try {
    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=GMS', 'wincott', 'cc');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException | Exception $e) {
    die("Connection failed");
}
