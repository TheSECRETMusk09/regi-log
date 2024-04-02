<?php

// Database connection
$conn = new mysqli('localhost:3333', 'root', '', 'metaworkforce1');

// Check connection
if ($conn->connect_error) {
    die("Couldn't connect: " . $conn->connect_error);
}
