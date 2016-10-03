<?php
$conn = mysqli_connect(INSERT DB CONNECTION INFORMATION);
if(!$conn) {
    die('Database Connection Failed' . mysqli_connect_error());
}
