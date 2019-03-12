<?php
    $code = $_POST['code'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $year = $_POST['year'];

    $hostname     = "localhost";
    $username     = "root";
    $password     = "root";
    $databaseName = "my_book";


    // connect to mysql database using mysqli
    $connect = mysqli_connect($hostname, $username, $password, $databaseName);
    
    $codeExistQuery = "SELECT * FROM `tbl_book` WHERE `code`= $code";

    $codeExist = mysqli_query($connect, $codeExistQuery);

    if (mysqli_fetch_row($codeExist) > 0) {
        echo "Code is already exist";
    } else {
        // mysql query to insert data
        $query = "INSERT INTO `tbl_book`(`code`, `title`, `author`, `year` ) values($code, '$title', '$author', '$year')";
        $result = mysqli_query($connect,$query);
        
        // check if mysql query successful
        if($result)
        {
            echo 'Data Inserted';
        }
        else{
            echo 'Data Not Inserted';
        }
    }
    
    mysqli_free_result($result);
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
    <a href="view.php"> View </a>
    <a href="bookfm.html"> More </a>
</body>
</html>