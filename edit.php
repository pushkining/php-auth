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
if (isset($_POST['nameMov'])) {
    $nameMov1 = $_POST['nameMov'];
    $query = "SELECT * FROM movie JOIN director on movie.directorId=director.directorId WHERE nameMov = '$nameMov1'";
    $result = mysqli_query($connection, $query);
}
?>
<form method="POST">
    <div class="form-signin form-group m-3">
        <label>Редактировать по названию</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
               placeholder="Enter movie" name="nameMov">
        <small id="emailHelp" class="form-text text-muted">Type please on English</small>
    </div>

    <button type="submit" class="btn btn-primary m-5" name="btn1">Поиск</button>

    <?php if ($result == true) {
        echo "<a class=\"btn btn-primary m-3\" href=\"cinema.php\" role=\"button\">Вернуться</a>";
    } ?>
</form>

<?php
if ($result = mysqli_query($connection, $query)) {

    echo "<div class=\"input-group \">
            <table class=\"table m-5\">
        <thead>
        <tr>
            <th scope=\"col\">Название</th>
            <th scope=\"col\">Жанр</th>
            <th scope=\"col\">Выход</th>
            <th scope=\"col\">Режиссёр</th>
            <th scope=\"col\">
            </th>
        </tr>
        </thead>
        <tbody>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['nameMov'] . "</td>";
        echo "<td>" . $row['description'] . "</td>";
        echo "<td>" . $row['releaseDate'] . "</td>";
        echo "<td>" . $row['nameDir'] . "</td>";
        echo "</tr>";
    }
    echo "<form method='GET'>
    <div class=\"input-group m-4\">
          <input type=\"text\" class=\"form-control\" placeholder='Фильм' name='nameMov'>
          <input type=\"text\" class=\"form-control\" placeholder='Жанр' name='description'>
          <input type=\"date\" class=\"form-control\" placeholder='Дата выхода' name='releaseDate'>
    </div>
    <button type=\"submit\" class=\"btn btn-primary m-5\" name=\"btn1\">Редактировать</button>
    </form>";
    if (isset($_GET['nameMov']) && isset($_GET['description']) && isset($_GET['releaseDate']) && isset($_POST['nameMov'])) {
        $nameMov1 = $_POST['nameMov'];
        $nameMov = $_GET['nameMov'];
        $description = $_GET['description'];
        $releaseDate = $_GET['releaseDate'];
        $query1 = "UPDATE movie SET nameMov = '$nameMov', description = '$description', releaseDate = '$releaseDate' WHERE nameMov = '$nameMov1'";
        $result = mysqli_query($connection, $query1);
    }
//    if (isset($_GET['nameDir'])){
//        $nameMovOld = $_POST['nameMov'];
//        $nameDir = $_GET['nameDir'];
//        $query = "UPDATE director SET nameDir = '$nameDir WHERE (SELECT nameMov FROM director) = '$nameMovOld'";
//        $result = mysqli_query($connection, $query);
//    }
}
//var_dump($nameMov1);
?>
</tbody>
</table>
</div>
</body>
</html>