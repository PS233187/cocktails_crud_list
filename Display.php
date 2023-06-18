<?php
include 'connect.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" >
    <link href="./css/Display.css" rel="stylesheet">
    <title>Jazzie's cocktails</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Syncopate:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>

<video src="https://media.istockphoto.com/videos/mixing-a-cocktail-corfu-greece-video-id966380432" autoplay loop playsinline muted></video>

<header class="viewport-header">
    <h1>
        Jazzie's
        <span><i>Cocktails</i></span>
    </h1>
</header>

<main>
     
        <button class="btn btn-primary my-5"><a href="NewCocktail.php" class="text-light">Add cocktail</a> </button>
        <table class="table">

            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">cocktail</th>
                <th scope="col">Ingredients</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>

            <?php

            
            
            $sql="Select * from `drankjes`";               
            $result=mysqli_query($con,$sql);                             

            if($result){
            while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $cocktail=$row['cocktail'];
            $ingredients=$row['ingredients'];
            $price=$row['price'];

           
            echo '<tr class="text-light">                
                <th scope="row">'.$id.'</th>                
                <td>'.$cocktail.'</td>
                <td>'.$ingredients.'</td>
                <td>'.$price.'</td>
                <td>
                    <button class="btn btn-primary" ><a href="Update.php?updateid='.$id.'" class="text-light">Update</a></button>
                    <button class="btn btn-danger"  ><a href="Delete.php?deleteid='.$id.'" class="text-light">Delete</a></button>
                </td>
            </tr>';
            }
            }

            ?>
            </tbody>
        </table>
    </div>

</body>
</main>



</body>
</html>