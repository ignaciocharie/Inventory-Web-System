<?php

$conn = mysqli_connect("localhost", "root", "", "regis");

if (!$conn) {
    echo "Connection Failed";
}