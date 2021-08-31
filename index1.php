<!DOCTYPE html>
<html>
    <title>trade</title>
    
    <head>
 <style>
    html {
            background-image: url('getty.jpg');
            height: 100%; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    h1 {
            color: #298704;
            text-align: center;
        }
    .header {
            text-align: center;
        }
    .list {
            text-align: center; 
        }
        
    ul li {
        cursor: pointer;

}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
th{
    color:darkred
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
  
}

tr:nth-child(even) {
  background-color: #dddddd;
}
        </style>


    <h1>"ZID'S TECH MART"</h1>
    </head>
    <body>
      
    <form class="header" method="POST" action="index1.php" >
  <h2>Cashed Items</h2>
  <input name="item" id="myInput" type="text">
 <input type="submit" value="item">
</form>
    




  <table>
            <tr>
                <th>ID</th>
                <th>ITEM</th>
                <th>SALE PRICE</th>
                <th><b>TOTAL</b></th>
            </tr>
  

<?php
require_once("connect.php");
require_once("connect1.php");

$item = filter_input(INPUT_POST,'item');
$result=$db->query("SELECT * FROM Product WHERE p_name = '$item'");
$data = $result->fetchArray();

if (empty($item)){
  echo 'please insert item';
  $tablesquery =$db1->query("SELECT * FROM regester");
  $total = 0;
     while ($table = $tablesquery->fetchArray(SQLITE3_ASSOC)) {
       $total += floatval($table['salep']);
       echo '<tr><td>' . $table['id'] . "</td><td>" . $table['item'] . "</td><td>" . $table['salep'] . "</td><td>" . number_format( $total, 2 ) . "</td></tr>" ;
        
     }

}
else if($data){
 
$cashed = $data['p_name'];
$price = $data['salep'];

  $sql1 = "INSERT INTO regester ('item', 'salep') VALUES ('$cashed', '$price')";
 $db1->exec($sql1);
    echo '<p style="text-align: center; color: red;"><b >ITEM INSERTED</b></p>';

 $tablesquery =$db1->query("SELECT * FROM regester");
 $total = 0;
    while ($table = $tablesquery->fetchArray(SQLITE3_ASSOC)) {
      $total += floatval($table['salep']);
      echo '<tr><td>' . $table['id'] . "</td><td>" . $table['item'] . "</td><td>" . $table['salep'] . "</td><td>" . number_format( $total, 2 ) . "</td></tr>" ;
       
    }
}
  else{
echo 'item not in regester';
$tablesquery =$db1->query("SELECT * FROM regester");
 $total = 0;
    while ($table = $tablesquery->fetchArray(SQLITE3_ASSOC)) {
      $total += floatval($table['salep']);
      echo '<tr><td>' . $table['id'] . "</td><td>" . $table['item'] . "</td><td>" . $table['salep'] . "</td><td>" . number_format( $total, 2 ) . "</td></tr>" ;
       
    }

  }
  
?>

 
    
    </table>

    </body>
</html>

       