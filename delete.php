<?php
$i=$_GET['id'];
$con=mysqli_connect("localhost","root","","studentdetail");

if($con)
{
    $q="delete from stdinfo where id=$i";
    $query=mysqli_query($con,$q);
    if($query)
    {
        

        header('location:main.php');


    }
    else
    {
        echo "could not data deleted";

    }
}
else{
    die("not connect".mysqli_connect_error());
}
mysqli_close($con);
?>
