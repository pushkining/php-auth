<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<html>
<body>
<?php
require 'connect.php';
$nameMov = $_POST['nameMov'];
$description = $_POST['description'];
$releaseDate = $_POST['releaseDate'];
if (isset($_POST['nameMov']) && isset($_POST['password'])) {
    $query = "INSERT INTO movie (nameMov, description, releaseDate) VALUES ($nameMov, $description, $releaseDate) ";
    $result = mysqli_query($connection, $query);
}
?>
<form class="m-5" method="POST">
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Название">
        <input type="text" class="form-control" id="description" placeholder="Жанр">
        <input type="date" class="form-control" id="releaseDate" placeholder="Password">
    <a class="btn btn-primary" href="cinema.php" role="button">Добавить</a>
</form>


</body>
</html>