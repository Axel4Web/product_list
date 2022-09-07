<?php
  require_once 'config/connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <title>Товары</title>
</head>
<body>
  <table>
    <tr>
      <th>id</th>
      <th>Title</th>
      <th>Price</th>
      <th>Description</th>
      <th>&#9672;</th>
      <th>&#9998;</th>
      <th>&#10006;</th>
    </tr>

    <?php
      $products = mysqli_query($connect, "SELECT * FROM `items`");
      $products = mysqli_fetch_all($products);
      foreach($products as $product) {
        ?>
          <tr>
            <td><?= $product[0] ?></td>
            <td><?= $product[1] ?></td>
            <td><?= $product[2] ?></td>
            <td><?= $product[3] ?></td> 
            <td><a href="product.php?id=<?= $product[0] ?>">View</a></td>
            <td><a href="update.php?id=<?= $product[0] ?>">Edit</a></td>
            <td><a href="vendor/delete.php?id=<?= $product[0] ?>">Delete</a></td> 
          </tr>
        <?php
      }
    ?>
  </table>

  <h2>Add new product</h2>
  <form action="vendor/create.php" method="post">
    <p>Title</p>
    <input type="text" name="title">
    <p>Description</p>
    <textarea name="description"></textarea>
    <p>Price</p>
    <input type="number" name="price">
    <button type="submit">Submit</button>
  </form>

    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="index.php" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>

</body>
</html>