<?php
require 'connect.php';
require  'cinema.php';
if(isset($_POST['delete'])) {
#    $sql = "DELETE FROM movie WHERE nameMov = $row['movieId']";
} elseif(isset($_POST['edit'])) {
    include './script2.php';
}