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
<div id="auto">
<?php
//$conn = mysqli_connect("localhost", "root", "", "dd") or die("Not Connected");
$conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12341314", "hqbvkCemu1", "sql12341314") or die("Not Connected");
$result=mysqli_query($conn, "SELECT username,email ,password FROM  `request` ") or die ('Problem with query' . mysqli_error($conn));
function reply_click($clicked_id,$conn,$user,$passw){
      //echo "hi";
      //echo $clicked_id;
      $userf=$user[ $clicked_id];
      $p=$passw[ $clicked_id];
      //echo $userf;
      $sql = mysqli_query($conn, "INSERT INTO `register` (`id`, `username`,`password`) VALUES ('', '".$userf."','".$p."')");
      $sq=mysqli_query($conn, "DELETE FROM `request` WHERE username='$userf' ");
}
if (mysqli_num_rows($result)>0)
{
 $i=0;
 $user=[];
 $mail=[];
 $passw=[];
 $j=0;
 $h=0;

       while($row = $result->fetch_assoc())
        {

          $user[$i]=$row["username"];
          $mail[$i]=$row["email"];
          $passw[$i]=$row["password"];
          $i++;
         }

   foreach($user as $item)
    {

        ?><div class="alert alert-primary" role="alert">
        <?php echo htmlspecialchars($item); ?></p><br>
        <?php echo htmlspecialchars($mail[$j])?><br>
        <form action="" method="POST"> <div align="right">
          <input type="hidden" name="id_director" value="<?= $h ?>" />
          <button  type="submit" class="btn btn-primary" name="button1">Accept</button>
        </div></form>
        </div><br><?php
        $j++;
        $h++;
          }
          if(array_key_exists('button1', $_POST)) {
            $clicked_id=$_POST['id_director'];
            reply_click($clicked_id,$conn,$user,$passw);
          }

        }
 ?>
 </div>




 <meta http-equiv="refresh" content="3">
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
