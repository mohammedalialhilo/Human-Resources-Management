<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a class="active" href="employees.php">Employees</a></li>
                <li><a class="" href="benefits.php">Benefits</a></li>
                <li><a class="" href="projects.php">Projects</a></li>
            </ul>
            <div class="search-container">
                <form action="" method="POST">
                    <input class="search" type="text" placeholder="Search.." name="search">
                    <button class="searchBtn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </nav>
    </header>

    <?php
    $link = mysqli_connect("localhost", "root", "", "human");
    if (isset($_POST['submit'])) {
        $search = $_POST['search'];
        $result =  "SELECT * FROM `employees` WHERE  `firstname` = '$search'";
        $respans = mysqli_query($link, $result);
        $row = mysqli_fetch_assoc($respans);
        if ($row){
            
        }
    }

    ?>
</body>

</html>