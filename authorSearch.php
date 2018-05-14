<?php
include "header.php";

?>
<h1>Author Search</h1>
<?php

//YEAR SEARCH FUNCTION
    if(isset($_POST['yearSubmit'])){
        $search = mysqli_real_escape_string($conn, $_POST['yearSearch']);
        $search2 = mysqli_real_escape_string($conn, $_POST['yearSearch2']);
        $sql = "SELECT * FROM records WHERE language BETWEEN '$search' AND '$search2'";
        
        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        if($queryResult > 0){
            echo "Displaying ".$queryResult." results between ".$search." and ".$search2.".";
            while($row = mysqli_fetch_assoc($result)){
                echo "<div class='article-box'>
                <h3>
                Title: ".$row['titleshort']."</h3>
                <p>ID: ".$row['ID']."</p>
                <p>".$row['titleadd']."</p>
                <p>Year: ".$row['language']."</p>
                <p>Author: ".$row['author']."</p>
                </div>";
            }
        }
    }
    ?>

    