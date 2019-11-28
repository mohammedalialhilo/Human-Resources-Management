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
                <li><a class="" href="employees.php">Employees</a></li>
                <li><a class="active" href="benefits.php">Benefits</a></li>
                <li><a class="" href="projects.php">Projects</a></li>
            </ul>
            <div class="search-container">
                <form action="benefits.php" method="POST">
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
        echo "yes";
        $s =  "SELECT * FROM perk_con 
            LEFT JOIN perks ON perk_con.perk_ID = perks.ID
            LEFT JOIN employees ON perk_con.emp_ID = employees.ID
            WHERE  employees.firstname = '$search' || employees.lastname = '$search'";
        $result = mysqli_query($link, $s);
        $row = mysqli_fetch_array($result);
    
    if (mysqli_num_rows($result) == true) : ?>
        <table>
            <tr><?php echo $row['firstname']." ". $row['lastname']?> d</tr>
           <?php foreach($result as $row) : ?> <tr><?php echo $row['perk'] ?>d</tr>
           <?php endforeach; ?>
        </table>
    <?php endif; }?>
</body>

</html>