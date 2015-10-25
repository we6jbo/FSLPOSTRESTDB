<?php
  mysql_connect("CHANGE THIS TO YOUR DOMAIN NAME WHERE YOUR DATABASE IS LOCATED", "CHANGE THIS TO THE USER NAME WITH ACCESS TO MYSQL", "AND THE PASSWORD")or die("cannot connect server "); 
  mysql_select_db("change this to the table")or die("cannot select DB");

  $rId = isset($_GET['id']) ? mysql_real_escape_string($_GET['id']) :  "";
  $name = isset($_GET['name']) ? mysql_real_escape_string($_GET['name']) :  "";
  
if (!preg_match('/[^A-Za-z0-9]/', $rId))
{
  $rIddw=$rId;
}
else
{
  $rIddw="123";
}
  
if (!preg_match('/[^A-Za-z0-9]/', $name))
{
  $namedw=$name;
}
else
{
  $name="Name can only contain A-Za-z";
}
  
  if(!empty($rIddw) && !empty($namedw)){
    $qur = mysql_query("select id,name,email,comment from `data` where id='$rIddw' OR name='$namedw'");
    $result =array();
    while($r = mysql_fetch_array($qur)){
      extract($r);
      $result[] = array("id" => $id, "name" => $name, "email" => $email, "comment" => $comment); 
    }
    $json = array("service" => 1, "info" => $result);
  }else{
    $json = array("service" => 0, "msg" => "Please use restv1.php?id=1&name=Jon -id and name must be A-Za-z0-9. Jon@ wont work but Jon1 will.");
  }
  @mysql_close($conn);

  /* Output header */
  header('Content-type: application/json');
  echo json_encode($json);
