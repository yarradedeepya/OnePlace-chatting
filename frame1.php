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
<div id="auto">
<?php
$conn = mysqli_connect("sql12.freemysqlhosting.net", "sql12341314", "hqbvkCemu1", "sql12341314") or die("Not Connected");
$result=mysqli_query($conn, "SELECT message,Type,datetimes,name FROM  `chat` ") or die ('Problem with query' . mysqli_error($conn));
if (mysqli_num_rows($result)>0)
{
 $i=0;
 $arr=[];
 $type=[];
 $date=[];
 $name=[];
 $j=0;
       while($row = $result->fetch_assoc())
        {

          $arr[$i]=$row["message"];
          $type[$i]=$row["Type"];
          $date[$i]=$row["datetimes"];
          $name[$i]=$row["name"];
          $i++;
         }

   foreach($arr as $item)
    {
      if($type[$j]==0){
        ?><div class="alert alert-primary" role="alert">
        <p align="right"><?php echo $name[$j]; ?></p><br>
        <?php echo htmlspecialchars($item)?><br><br><p align="right"><?php echo $date[$j];?></p></div><br><?php

        $j++;
      }
      else{
        ?><p align="right"><?php echo $name[$j]; ?></p><br>
          <img src="text-plain-icon.png" alt="clickme" height="42" width="42">
          <a href="/Downloads/<?php echo $item ?>" download>
          <img src="downloadicon.png" alt="clickme" height="42" width="42"></a><br><?php
        echo $item;?><p align="right"><?php echo $date[$j];?></p><br><?php
        $j++;
      }
    }
  }
 ?>
 </div>
 <meta http-equiv="refresh" content="3">
