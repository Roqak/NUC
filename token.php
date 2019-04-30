<?php
if(isset($_GET['token']){
$query = mysqli_query($conn,"SELECT * FROM `token` WHERE `token`="$_GET['token']"");
$row = mysqli_fetch_array($query);
if(mysqli_num_rows($row)>0){
$university = $row['university'];
$query2 = mysqli_query($conn,"SELECT * FROM `university` WHERE `university`="$university"");
$uni = mysqli_fetch_array($query2);
if(mysqli_num_rows($uni)>0){
//get all the data and set as values for all fields
// $uni['']
}
}else{
echo "INVALID TOKEN";
}
}
?>