<?php
    $server = 'localhost';
    $username = 'fernando';
    $password = "2pacshaq";
    $database = 'users';

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
      } catch (PDOException $e) {
        die('Connection Failed: ' . $e->getMessage());
      }
      
?>