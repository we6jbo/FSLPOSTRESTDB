<html>
<head>
  <title>Write</title>
</head>
<body>
<p><a href="more.php">More options (Updated every week!)</a></p>
<?php
  
mysql_connect("ONCE AGAIN THIS IS THE DOMAIN", "AND THE USER NAME", "AND THE PASSWORD")or die("cannot connect server "); 
mysql_select_db("and the table")or die("cannot select DB");

$datetime=date("y-m-d h:i:s"); //date time

$name = $_POST['name'];
$email = $_POST['email'];
$comment = $_POST['comment'];
  
if (!preg_match('/[^A-Za-z0-9]/', $name))
{
  echo "Adding: ";
  echo $name;
  echo ". ";
  $namedw=$name;
}
  else
  {
  $namedw="Name can only contain A-Za-z";
  }
  
if (!preg_match('/[^A-Za-z0-9]/', $email))
{
  echo "Adding: ";
  echo $email;
  echo ". ";
  $emaildw=$email;
}
else
{
  $email="Email can only contain A-Za-z";
}
  
if (!preg_match('/[^A-Za-z0-9]/', $comment))
{
  echo "Adding: ";
  echo $comment;
  echo ". ";
  $commentdw=$comment;
}
else
{
  $commentdw="Comment can only contain A-Za-z";
}
  
  
  
$sql="INSERT INTO data(name, email, comment, datetime)VALUES('$namedw', '$emaildw', '$commentdw', '$datetime')";
$result=mysql_query($sql);

if($result){
echo "Good!";
echo "<p>";

echo "<a href='read.php'>Read database</a>";
echo "<p>Please report any problems you find to we6jbo@gmail.com<p>";
}

else {
echo "Failed!!";
}
mysql_close();
?>
</body>
</html>
