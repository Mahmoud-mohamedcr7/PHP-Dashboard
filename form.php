<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/bondi.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bitcount+Single:wght@100..900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" 
rel="stylesheet">
</head>
<body>
    <!-- connect db -->
    <?php 
    require('db.php'); 
    $resalt = mysqli_query(  $connect ,"SELECT * FROM `frindes`");
    $username ="";
    $pwd ="";
    $email ="";
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id =  $_POST['id'];
         $username = $_POST['username'];
         $pwd = $_POST['pwd'];
         $email = $_POST['email'];
    }
    $botoun ="";
    if(isset($_POST['add'])){
        $botoun = "INSERT INTO frindes (`username`,`pwd`,`email`) 
         VALUES ('$username','$pwd','$email')";
          mysqli_query($connect ,$botoun);
         header("location:form.php");
    }
     if(isset($_POST['delete'])){
        $botoun ="DELETE FROM frindes WHERE username= '$username' ";
         mysqli_query(  $connect ,$botoun);
         header("location:form.php");
     }
    ?>
    <div class="mother">

    <form class="w-75 m-auto mt-4" method="post" action ="form.php">
         <div class="mb-3 ">
    <label for="exampleInputEmail1" class="form-label">username </label>
    <input type="text" name ="username" class="form-control text-center" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email </label>
    <input type="email" name ="email" class="form-control  text-center" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="pwd" class="form-control  text-center" id="exampleInputPassword1">
  </div>
  <button type="submit" name="add" class="btn btn-success">add</button>
  <button type="submit" name ="delete" class="btn btn-danger">delete</button>

         <table class="table ">
    <tr>
            <th scope="col">username</th>
            <th scope="col">email</th> 
            <th scope="col">Password</th>
    </tr>
    <?php
    while($row = mysqli_fetch_array($resalt)){
         echo' <tr>';
      echo' <td>'.$row['username'].'</td>';
      echo' <td>'.$row['email'].'</td>';
      echo' <td>'.$row['pwd'].'</td>';
         echo' </tr>';
    }
        ?>
     

    </form>
</div>
  <!-- /////////////////////////////////////////////////////////////////// -->
      <script src="js/bootstrap.bundle.min.js"></script>
     <script src="js/all.min.js"></script>
</body>
</html>