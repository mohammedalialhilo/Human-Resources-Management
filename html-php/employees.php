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

<body class="bgim">
    <header >
        <nav>
            <ul>
                <li><a class="active" href="employees.php">Employees</a></li>
                <li><a class="" href="benefits.php">Benefits</a></li>
                <li><a class="" href="projects.php">Projects</a></li>
            </ul>
            <div class="search-container">
                <form action="employees.php" method="POST">
                    <input class="search" type="text" placeholder="Search.." name="search">
                    <button class="searchBtn" type="submit" name="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </nav>
       
    </header>
    <?php
    $link = mysqli_connect("localhost", "root", "", "humani");
    if (isset($_POST['submit'])) {
        $search = $_POST['search'];
        $s =  "SELECT * FROM employees 
        LEFT JOIN departments ON employees.department = departments.ID
        LEFT JOIN sites ON employees.site = sites.ID
        WHERE  firstname = '$search' || lastname = '$search'";
        $result = mysqli_query($link, $s);
        $row = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) == true){

            echo "<table class='infotable'>
                    <tr class='t1'>
                        <td>Name</td>
                        <td>".$row['firstname']." ".$row['lastname'] ."</td>
                    </tr>
                    <tr class='t2'>
                        <td>Salary</td>
                        <td>".$row['salary']."</td>
                    </tr>
                    <tr class='t1'>                        <td>Address</td>
                        <td>".$row['adress']." ".$row['zipcode']." ".$row['city']." ".$row['country']."</td>
                    </tr>
                    <tr class='t2'>
                        <td>Email</td>
                        <td>".$row['email']."</td>
                    </tr>
                    <tr class='t1'>
                        <td>Department</td>
                        <td>".$row['department']."</td>
                    </tr>
                    <tr class='t2'>
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