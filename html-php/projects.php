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
                <li><a class="" href="employees.php">Employees</a></li>
                <li><a class="" href="benefits.php">Benefits</a></li>
                <li><a class="active" href="projects.php">Projects</a></li>
            </ul>
            <div class="search-container">
                <form action="projects.php" method="POST">
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

        //project and employees coupling
        $s =  "SELECT * FROM projects 
        LEFT JOIN prm_con ON  projects.ID = prm_con.pro_ID
        LEFT JOIN employees ON prm_con.emp_ID = employees.ID
        LEFT JOIN prc_con ON projects.ID = prc_con.pro_ID 
        LEFT JOIN costumers ON prc_con.co_ID = costumers.ID
        WHERE project = '$search'";
        $result = mysqli_query($link, $s);
        $row = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) == true) {

            echo "<table>
            <tr>
                <td>Project Name</td>
                <td>" . $row['project'] . "</td>
            </tr>
            <tr>
                <td>Costumer</td>
                <td>" . $row['firstname_c'] . " " . $row['lastname_c'] . "</td>
            </tr>
            <tr>
                <td>Employees</td>
                <td>" . $row['firstname'] . " " . $row['lastname'] . "</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>" . $row['description'] . "</td>
            </tr>
           
            
        </table>";
        } else {
            echo "No project found<br><br>";
        }
    }
    ?>
    <button class="addBtn" type="button" onclick="addcospage()">Add new employee</button>

</body>
<script src="../js/sidechange.js"></script>

</html>