
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
    if($_SESSION["name"]) {
      ?>
      Welcome <?php echo $_SESSION["name"]; ?>. Click here to <a href="logout.php" tite="Logout">Logout.</a>

    <div class="container">
    <h1 align = "center" style="color:red;">OnePlace</h1>
    <div align="center">
    <iframe src="frame1.php" width="350" height="400"></iframe>
    </div>
    <div id="bottom">
    <form method="post" enctype="multipart/form-data">
    <textarea rows = "2" cols = "30" name = "desc" placeholder="Enter your text here"></textarea><br>
    <label for="myfile">Select a file:</label>
    <input type="file" id="file" name="file"><br><br>
    <button type="submit" class="btn btn-primary" name="count_sub">Submit</button>
    </form>
    </div>
     <?php
     if($un=="dd" and $p=="deva"){
       
       ?>
       <div align="right">
       <form action="request.php" method="POST">
       <button type="submit" class="btn btn-primary" name="count_sub">View Requests</button>
     </form>
     <br>
     </div>
       <?php
     }
     $conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12341314", "hqbvkCemu1", "sql12341314") or die("Not Connected");
     //$conn = mysqli_connect("localhost", "root", "", "dd") or die("Not Connected");
     if(isset($_POST['count_sub'])){

       $u=$_POST['desc'];

       if($u != ""){

       date_default_timezone_set('Asia/Kolkata');
       $d=date('Y-m-d H:i:s');
       $sql = mysqli_query($conn, "INSERT INTO `chat` (`id`, `message`,`Type`,`datetimes`,`name`) VALUES ('', '".$u."','0','".$d."','".$un."')");
     }
       if($_FILES['file']['name']!= ""){

         move_uploaded_file($_FILES['file']['tmp_name'], 'Downloads/'. $_FILES['file']['name']);
         date_default_timezone_set('Asia/Kolkata');
         $da=date('Y-m-d H:i:s');
         $sql1 = mysqli_query($conn, "INSERT INTO `chat` (`id`, `message`,`Type`,`datetimes`,`name`) VALUES ('', '". $_FILES['file']['name'] ."', '1','".$da."','".$un."')");
}
}
}
      ?>
    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
