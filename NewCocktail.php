<?php
include 'connect.php';        
if(isset($_POST['submit'])){          
    $cocktail=$_POST['cocktail'];
    $ingredients=$_POST['ingredients'];
    $price=$_POST['price'];

    $sql= $con->prepare("Insert into `drankjes` (cocktail,ingredients,price) 
    values(?,?,?);"); 
    $sql->bind_param('ssi', $cocktail, $ingredients, $price); // ssi = string, string, int //prepare en bindparam zodat we het veilig maken
    //var_dump($sql);
    $result= $sql->execute();
    if($result){
       header('location:display.php');
    }
    
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="./css/Cocktail.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" >

    <title>Jazzie's cocktails</title>
  </head>

  <body>
  
    <div class="container my-5">
<form method="POST">
  <div class="form-group">
    <label >cocktail</label>
    <input type="text" class="form-control" placeholder="Enter cocktail" 
     name="cocktail">
  </div>

  <div class="form-group">
    <label >Ingredients</label>
    <input required type="text" class="form-control" placeholder="Enter ingredients" 
    name="ingredients">
  </div>

  <div class="form-group">
    <label >Price</label>
    <input required type="number" class="form-control"  placeholder="Enter price" 
    name="price">
  </div>

  <button  required type="submit" name="submit" id="sub" class="btn btn-primary">Submit</button>
</form>

  
  </body>
</html>