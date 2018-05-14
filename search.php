<?php
include "header.php";
?>

<h1>Search Page</h1>

<div class="article-container">
    <?php
    //GENERAL SEARCH FUNCTION
    // if (isset($_POST['submit-search']) && !empty($_POST['submit-search']) ){
    if (isset($_POST['submit-search']) ){
        $search = mysqli_real_escape_string($_POST['search']);
        $sql = "SELECT * FROM records WHERE titleshort LIKE '%$search%' 
        OR titleadd LIKE '%$search%'
        OR language LIKE '%$search%'
        OR author LIKE '%$search%'";

        $result = mysqli_query($conn, $sql);
        $queryResult = mysqli_num_rows($result);

        if ($queryResult > 0){
            echo "Displaying ".$queryResult." results matching your query.";
                while($row = mysqli_fetch_assoc($result)){
                    echo "<div class='article-box'>
                    <h3>
                    Title: ".$row['titleshort']."</h3>
                    <p>ID: ".$row['ID']."</p>
                    <p>".$row['titleadd']."</p>
                    <p>Year: ".$row['language']."</p>
                    <p>Author: ".$row['author']."</p>
                    </div>";
                    $x = $row['titleshort'];
                }
        } else{
            echo "No results found!";
        }
    }
//ELSE STATEMENT IF BOX DOESNT CONTAIN TEXT, BRING BACK TO INDEX AND DISPLAY ERROR

// else {
//     reload page with error
// }

    ?>
</div>