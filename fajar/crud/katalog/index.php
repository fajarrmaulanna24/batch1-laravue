<?php
require_once("../connect.php");

$katalog = mysqli_query($mysqli, "SELECT * FROM katalog");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="../buku/index.php">Buku</a>
                    <a class="nav-link" href="../penerbit/index.php">Penerbit</a>
                    <a class="nav-link" href="../pengarang/index.php">Pengarang</a>
                    <a class="nav-link" href="index.php">Katalog</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <a class="btn btn-primary" href="create.php">Add New Katalog</a>
        <br><br>

        <table class="table table-striped table-bordered" width="50%" border=1>
            <tr>
                <th>ID Katalog</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
            <?php  
        while($data = mysqli_fetch_array($katalog)) :
            echo "<tr>";
            echo "<td>".$data['id_katalog']."</td>";
            echo "<td>".$data['nama']."</td>";   
            echo "<td><a href='edit.php?id_katalog=$data[id_katalog]' class='btn btn-info'>Edit</a>
            <a href='delete.php?id_katalog=$data[id_katalog]' class='btn btn-danger'>Delete</a></td></tr>";        
        endwhile;
        ?>
        </table>
    </div>

</body>

</html>