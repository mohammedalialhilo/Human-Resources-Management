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
    <header>
        <nav>
            <ul>
                <li><a class="active" href="employees.php">Employees</a></li>
                <li><a class="" href="benefits.php">Benefits</a></li>
                <li><a class="" href="projects.php">Projects</a></li>
            </ul>
            <div class="search-container">
                <form action="">
                    <input class="search" type="text" placeholder="Search.." name="search">
                    <button class="searchBtn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </nav>
    </header>
    <div class="addempe">
    <form action="addemp.php" method="POST" class="addemp">
        <input class="name" type="name" name="firstname" placeholder="Firstname">
        <input class="name" type="name" name="lastname" placeholder="lastname">
        <input class="name" type="address" name="address" placeholder="Address">
        <input class="name" type="zipcode" name="zipcode" placeholder="zipcode">
        <input class="name" type="city" name="city" placeholder="City">
        <input class="name" type="country" name="country" placeholder="Country">
        <input class="name" type="email" name="email" placeholder="Email">
        <input class="name" type="date" name="birthday" placeholder="Birthday">
        <input class="name" type="name" name="department" placeholder="Department">
        <input class="name" type="name" name="site" placeholder="Site">
        <input class="name" type="int" name="salary" placeholder="Salary">
        <input  type="submit" name="submit" value="ADD">
    </form>
    </div>
    <?php
    $link = mysqli_connect("localhost", "root", "", "humani");
    if (isset($_POST['submit'])) {
        if (!isset($_POST['firstname']) || !isset($_POST['lastname']) || !isset($_POST['address']) || !isset($_POST['zipcode']) || !isset($_POST['city']) || !isset($_POST['email']) || !isset($_POST['birthday']) || !isset($_POST['department']) || !isset($_POST['site']) || !isset($_POST['salary'])) {
            echo "Please enter the information!";
            exit;
        } else {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $address = $_POST['address'];
            $city = $_POST['city'];
            $email = $_POST['email'];
            $birthday = $_POST['birthday'];
            $department = $_POST['department'];
            $site = $_POST['site'];
            $salary = $_POST['salary'];
            $country = $_POST['country'];

            $sql = "INSERT INTO employees (firstname, lastname, department, site, adress, zipcode, city, country, salary,birthday, email) VALUES ('$firstname', '$lastname', '$department', '$site', '$address', '$zipcode', '$city','$country', '$salary', '$birthday', '$email') ";
            if (mysqli_query($link, $sql)) {
                echo "<br>Info added";
                }
        }
    }
    ?>
</body>

</html>