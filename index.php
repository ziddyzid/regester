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
        .form {
            color: #031cfc;
            text-align: center;
            font-size: 20px;
        }
        .form1 {
            color: #031cfc;
            float: right ;
            font-size: 20px;
        }
        div {
            font-size: 20px;
            color: black;
            float: left;
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
      <?php
require_once("connect.php");

$item = filter_input(INPUT_POST,'item');
$cost = filter_input(INPUT_POST,'cost');
$sale = filter_input(INPUT_POST,'sale');
$profit = $sale - $cost;
$row = 0;

$result=$db->query("SELECT * FROM Product Where p_name = '$item'");
$data = $result->fetchArray();
if (empty($item)) {
    echo 'item not entered please enter item';
}
else if ($data) {
    echo '<p style="text-align: center; color: red;"><b >ITEM ALREADY IN THE REGISTER</b></p>';
}
else {
    $sql = "INSERT INTO `Product` ('p_name', 'costp', 'salep', 'profit') VALUES ('$item', '$cost', '$sale', '$profit')";
 $db->exec($sql);
    echo '<p style="text-align: center; color: red;"><b >ITEM INSERTED</b></p>';
}
?>  
    <h1>"ZID'S TECH MART"</h1>
    </head>
    <body>
    
        <form class="form" method="POST" action="index.php">
            <label>ENTER ITEM</label><br><br>
            <lable class="it">Item</lable><br><input type="text" name="item"><br>
            <label class="co">Cost Price</label><br><input type="number" min="$0.00" max="$1000000.00" step="0.01" name="cost" value="0.00"><br>
            <label class="sa">Sale Price</label><br><input type="number" min="$0.00"  max="$1000000.00" step="0.01" name="sale" value="0.00"><br>
            
            <input type="submit" value="INSERT ITEM"><br>
            
        </form><br><br>

        <table>
            <tr>
                <th>ID</th>
                <th>ITEM</th>
                <th>COST PRICE</th>
                <th>SALE PRICE</th>
                <th>PROFIT</th>
            </tr>
     <?php
     $tablesquery =$db->query("SELECT * FROM Product");
 
     while ($table = $tablesquery->fetchArray(SQLITE3_ASSOC)) {
         echo '<tr><td>' . $table['p_id'] . "</td><td>" . $table['p_name'] . "</td><td>" . $table['costp'] . "</td><td>" . $table['salep'] . "</td><td>" . $table['profit'] . '</td></tr>';
     }
     ?>  
    </table>
 

    </body>
</html>