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
        <!--<form method ="get" action="index.php" >
            <input type="submit" name ="tinder" value="next">
        </form>-->

            <?php
                $servername = "localhost";
                $username = "root";
                $password="";
                $dbname="users";
                $conn= new mysqli("$servername", "$username", "$password","$dbname");
                if($conn->connect_error){
                    die("conectiion failed");
                }
                if(isset($_GET["page"])){
                    $page = $_GET["page"];

                }
                else{
                    $page = 1;
                }
                $num_per_page = 1;
                $start_from = ($page-1);
            
                $quer="SELECT * FROM user LIMIT $start_from,$num_per_page";
                $ans = $conn->query($quer);
                while($row=mysqli_fetch_assoc($ans)){
                    echo $row["id"]." : ".$row["name"]."<br>"; 
                }

                $pr_query = "SELECT * FROM user";
                $pr_result = $conn->query($pr_query);
                $total_record = mysqli_num_rows($pr_result);
                $total_page = ceil($total_record / $num_per_page);
                for($i=1;$i<$total_page; $i++){
                        echo "<a href='index.php?page=".$i."'class='btn btn-primary'>$i </a>";
                }
               /* if(isset($_GET["tinder"])){
                    echo "butto clicked";
                if($ans->num_rows > 0){
                    while($row = $ans->fetch_assoc()){
                        echo $row["id"]." : " .$row["name"]."<br>";
                        
                    }
                }
                else{
                    echo "no result";
                }
            }
            else{
                echo "button is not clicked";
            }

                $conn->close();*/
                
            ?>
            
    </body>
</html>

