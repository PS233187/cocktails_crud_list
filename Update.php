<?php
include 'connect.php';
$id=$_GET['updateid'];  //in de display pagina heb ik de $id updateid genoemd hier word nu de informatie uit opgehaald met de get  
$sql="select * from `drankjes` where id=$id";
$result=mysqli_query($con,$sql);    
$row=mysqli_fetch_assoc($result); //
$cocktail=$row['cocktail'];
$ingredients=$row['ingredients'];
$price=$row['price'];


if(isset($_POST['submit'])){                //hier zorg ik ervoor dat de veranderde cocktail weer word toegeovegd aan de database 
    $cocktail=$_POST['cocktail'];
    $ingredients=$_POST['ingredients'];
    $price=$_POST['price'];

    $sql= $con->prepare("update `drankjes` set cocktail=?, ingredients=?, price=? where id=?"); 
    $sql->bind_param('ssii', $cocktail, $ingredients, $price, $id); // ssi = string, string, int //prepare en bindparam zodat we het veilig maken
    //var_dump($sql);
    $result= $sql->execute();
    if($result){
       header('location:display.php');  //resultaat word weer weergeven in de display
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
<div>
  <body>
    <div class="container my-5">
<form method="POST">
  <div class="form-group">
    <label >cocktail</label>
    <input type="text" class="form-control" placeholder="Enter cocktail" 
     name="cocktail" value=<?php echo $cocktail;?>> <!-- hIer zorg ik ervoor dat de ingevoerde gegevens uit de database in de input staan -->
  </div>

  <div class="form-group">
    <label >Ingredients</label>
    <input required type="text" class="form-control" placeholder="Enter ingredients" 
    name="ingredients"  value=<?php echo $ingredients;?>>
  </div>

  <div class="form-group">
    <label >Price</label>
    <input required type="number" class="form-control"  placeholder="Enter price" 
    name="price"  value=<?php echo $price;?>>
  </div>

  <button  required type="submit" name="submit" id="sub" class="btn btn-primary">Update</button>
</form>

    </div>

  </body>
</html>