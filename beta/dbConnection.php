<?php
$conn = mysqli_connect('localhost', 'root', 'KedQ5FZRdBCnzSBD', 'mixedseeds');
if(!$conn) {
    die('Database Connection Failed' . mysqli_connect_error());
}