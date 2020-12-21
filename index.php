<DOCTYPE html>
<html>
    <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
    <body>
        <form method ="post" action="index.php" >
            <input type="submit" value="next">
        </form>
            <?php
                $servername = "localhost";
                $username = "root";
                $password="";
                $dbname="users";
                $conn= new mysqli("$servername", "$username", "$password","$dbname");
                if($conn->connect_error){
                    die("conectiion failed");
                }
                echo "connected successfully";
                $quer="SELECT * FROM user";
                $ans = $conn->query($quer);
                if($ans->num_rows > 0){
                    while($row = $ans->fetch_assoc()){
                        echo $row["id"]." : " .$row["name"]."<br>";
                    }
                }
                else{
                    echo "no result";
                }
                $conn->close();
            ?>
    </body>
</html>