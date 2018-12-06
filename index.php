<?php
    require_once("functions/conection.php");
    if(!$con){
        die("Conection failed. ". mysqli_connect_error());
    }   
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Profiles</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="functions/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="functions/css/search.css" />
    <script src="main.js"></script>
    
</head>
<body>
    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search fot name...">
    <table id="myTable">
        <tr class="header">
            <th style="width:60%; text-align: center; font-size: 120%;">NAME</th>
            <th style="width:60%; text-align: center; font-size: 120%;">PHOTO</th>
        </tr>
        <?php
            $query = $dato;
            $result = mysqli_query($con, $query);
            while($row = $result->fetch_assoc()){
                $name = $row["Name"];
                $img = $row["image"];
                $conf = $row["link"];
        ?>
        <tr>
                <td style="text-align: center; font-size: 190%;"><a href="<?php echo $conf?>"><?php echo $name;?></a></td>
                <td style="text-align: center;"><a href="<?php echo $conf?>"><img src="<?php echo $img;?>" style="width:200px; height:200px;align-self: center;"></a></td>
        </tr>
        <?php
            }
        ?>
    </table>

<script>
function myFunction() {
  // Declare variables 
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    } 
  }
}
</script>
</body>

</html>