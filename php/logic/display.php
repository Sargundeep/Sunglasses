<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php 
    session_start();
    require_once('./inc/config.php');    
    require_once('./inc/helpers.php');  
 
    $sql = "SELECT prod.*,prod_image.img from products prod
            INNER JOIN product_images prod_image 
            ON prod_image.product_id = prod.id
            WHERE pdi.is_featured = 1";
    $handle = $link->prepare($sql);
    $handle->execute();
    $getAllProducts = $handle->fetchAll(PDO::FETCH_ASSOC);
?>

</body>
</html>