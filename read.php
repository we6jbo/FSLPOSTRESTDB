<html>
<head>
  <title>Database</title>
</head>
<body>
<p><a href="begin.php">Write to database</a></p>

<p><a href="https://github.com/we6jbo/FSLPOSTRESTDB">Source code</a></p>

<p><strong>Please report any problems you find to we6jbo@gmail.com</strong></p>


<?php

mysql_connect("bm", "fb", "")or die("cannot connect server "); 
mysql_select_db("fb")or die("cannot select DB");
$sql="SELECT * FROM da";
$result=mysql_query($sql);
while($rows=mysql_fetch_array($result)){
?>

  
<table border="1" cellpadding="1" cellspacing="1" style="width: 500px;">
  <tbody>
    <tr>
      <td>Row: </td>
      <td><? echo $rows['id']; ?></td>
    </tr>
    <tr>
      <td>Name: </td>
      <td><? echo $rows['name']; ?></td>
    </tr>
    <tr>
      <td>Email: </td>
      <td><? echo $rows['email']; ?></td>
    </tr>
    <tr>
      <td>Comment: </td>
      <td><? echo $rows['comment']; ?></td>
    </tr>
    <tr>
      <td>Date: </td>
      <td><? echo $rows['datetime']; ?></td>
    </tr>
  </tbody>
</table>  

<?php
}
mysql_close(); //close database
?>

<p>&nbsp;</p>
</body>
</html>
