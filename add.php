<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>Document</title>
</head>
<html>
<body>
<?php
require 'connect.php';
//switch ($_POST['director']) {
//    case "Cameron":
//        $directorId = "1";
//        break;
//    case "Tarantino":
//        $directorId = "2";
//        break;
//    case "Abrams" :
//        $directorId = "3";
//        break;
//}
if (isset($_POST['nameMov']) and isset($_POST['description']) and isset($_POST['releaseDate']) and isset($_POST['directorId'])) {
    $nameMov = $_POST['nameMov'];
    $description = $_POST['description'];
    $releaseDate = $_POST['releaseDate'];
    $directorId = $_POST['directorId'];
    $query = "INSERT INTO movie (nameMov, description, releaseDate, directorId) ";
    $query .="VALUES ('$nameMov', '$description', '$releaseDate', '$directorId')";
    $result = mysqli_query($connection, $query);
    if ($result == true) {
        echo "Информация занесена в базу данных";
    } else {
        echo "Информация не занесена в базу данных";
    }

}
?>
<div class="container">
    <form class="form-signin" method="POST">
        <input type="text" class="form-control" name="nameMov" aria-describedby="" placeholder="Название">
        <input type="text" class="form-control" name="description" placeholder="Жанр">
        <input type="date" class="form-control" name="releaseDate">
        <input type="text" class="form-control" name="directorId" placeholder="Режиссёр">1-Cameron,2-Tarantino,3-Abrams


        <button class="btn btn-lg btn-primary btn-block" type="submit">Добавить</button>
        <?php if($result == true) {
            echo "<a class=\"btn btn-primary m-3\" href=\"cinema.php\" role=\"button\">Вернуться</a>";
        } ?>
        <!--        <a class="btn btn-primary" href="cinema.php" role="button">Добавить</a>-->
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>
</html>