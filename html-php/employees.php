<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
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
                <form action="employees.php" method="POST">
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
        $result =  mysql_query("SELECT * FROM `employees` 
        LEFT JOIN `departments` ON `employees.department` = `departments.ID`
        LEFT JOIN `sites` ON `employees.site` = `sites.ID`
        WHERE  `firstname` like '%{$search}%' || `lastname` like '%{$search}%'");
        if (mysql_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            echo "<table>
                    <tr>
                        <td>Name</td>
                        <td>".$row['firstname']." ".$row['lastname'] ."</td>
                    </tr>
                    <tr>
                        <td>Salary</td>
                        <td>".$row['salary']."</td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>".$row['adress']." ".$row['zipcode']." ".$row['city']." ".$row['country']."</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>".$row['email']."</td>
                    </tr>
                    <tr>
                        <td>Department</td>
                        <td>".$row['department']."</td>
                    </tr>
                    <tr>
                        <td>Site</td>
                        <td>".$row['sitename']."</td>
                    </tr>
                    
                </table>";
        } else {
            echo "No employee Found<br><br>";
        }
    }

    ?>
    <button class="addBtn" type="button" onclick="addemppage()">Add new employee</button>
</body>
<script src="../js/sidechange.js"></script>
</html>