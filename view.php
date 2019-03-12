<?php 
    $hostname     = "localhost";
    $username     = "root";
    $password     = "root";
    $databaseName = "my_book";
    
    // connect to mysql database using mysqli
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    $sql = "SELECT * FROM `tbl_book`";
    $result = mysqli_query($connect, $sql);

    mysqli_close($connect);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <table>
        <tr>
            <th>Code</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
        </tr>

    
        <?php
            while($row=mysqli_fetch_assoc($result))
            {
        ?>
        <tr>
            <td><?php echo $row['code']?></td>
            <td><?php echo $row['title']?></td>
            <td><?php echo $row['author']?></td>
            <td><?php echo $row['year']?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>