
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>OnePlace</title>

  </head>
  <body>
    <?php 
session_start();
?>
    <div class="container">
    <h1 align = "center" style="color:red;">OnePlace</h1>

    <br><br>
    <form action="" method="POST">
    <div class="form-group">
      <label for="uname" >User Name</label>
      <input type="text" class="form-control" id="uname" name="uname" required>
      <small id="info" class="form-text text-muted">This name is used further to represent you.</small>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1">Password</label>
      <input type="password" class="form-control" name=password id="exampleInputPassword1" required>
    </div>
    New User ? Register<a href="Register.php">here</a><br>
    <div align="right"><a href="forgetpassword.php">forgetpassword</a></div><br>
    <button type="submit" class="btn btn-primary" name="sub">Login</button>
  </form>
    <?php
  if(isset($_POST["sub"])){
  $_SESSION["name"]=$_POST["uname"];
  $_SESSION["password"]=$_POST["password"];
  $un=$_POST['uname'];
  $p=$_POST['password'];
   $conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12341314", "hqbvkCemu1", "sql12341314") or die("Not Connected");
  $result=mysqli_query($conn, "SELECT id FROM  `register` WHERE username='$un' and password='$p' ") or die ('Problem with query' . mysqli_error($conn));
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  $count = mysqli_num_rows($result);
  if($count==0)
  {
    ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        invalid username/password try with proper credentials.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
  }
else {
    header("Location:index1.php");
}
}
  ?>

    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>