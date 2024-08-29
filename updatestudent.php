<?php

$con = mysqli_connect("localhost","root","","studentdetail");


$id = $_GET['id'];

$sql = "SELECT * FROM stdinfo WHERE id='$id' ";
$b1=mysqli_query($con,$sql);
    $data=mysqli_fetch_array($b1);
   $firstname=$data['firstname'];
   $lastname=$data['lastname'];
   $emailid=$data['emailid'];
   $mobilenumber=$data['mobilenumber'];
   $address=$data['address'];
   $city=$data['city'];
   $pincode = $data['pincode'];
   $state = $data['state'];
   $gender = $data['gender'];
   $hobbies = $data['hobbies'];
   $imagePath = $data['image_path'];
   //echo "<td><img src='http://localhost/php/studentproject/$row[image_path]' height='100px' width='100px'></td>";

   

?>
<!DOCTYPE html>
<html>
<head>
  <title>Student Update Form</title>
  <style>
    body {
      font-family: 'Calibri', sans-serif;
      background-color: #f0f0f0;
      margin: 0;
      padding: 0;
    }

    h3 {
      font-size: 25pt;
      font-weight: bold;
      color: SlateBlue;
      text-align: center;
      text-decoration: underline;
    }

    table {
      width: 60%;
      margin: 20px auto;
      border-collapse: collapse;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table td, table th {
      padding: 10px;
      border: 1px solid #ddd;
      text-align: left;
    }

    table th {
      background-color: SlateBlue;
      color: white;
    }

    input[type=text], textarea {
      width: calc(100% - 16px);
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
      font-family: inherit;
    }

    input[type=radio], input[type=checkbox] {
      margin-right: 5px;
    }

    input[type=submit], input[type=reset] {
      background-color: SlateBlue;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 14px;
      margin-top: 10px;
    }

    input[type=submit]:hover, input[type=reset]:hover {
      background-color: #4CAF50;
    }

    .center {
      text-align: center;
    }

    .note {
      font-size: 10pt;
      color: #666;
    }

  </style>
</head>
<body>

<h3>STUDENT UPDATE FORM</h3>

<form action="" method="post" enctype="multipart/form-data">
  <table>
    <tr>
      <th colspan="2">PERSONAL INFORMATION</th>
    </tr>
    <tr>
      <td>FIRST NAME</td>
      <td><input type="text" name="firstname" maxlength="30"value="<?php echo $firstname;?>"required></td>
    </tr>
    <tr>
      <td>LAST NAME</td>
      <td><input type="text" name="lastname" maxlength="30"value="<?php echo $lastname;?>" required></td>
    </tr>
    <tr>
      <td>EMAIL ID</td>
      <td><input type="text" name="emailid" maxlength="100"value="<?php echo $emailid;?>" required></td>
    </tr>
    <tr>
      <td>MOBILE NUMBER</td>
      <td><input type="text" name="mobilenumber" maxlength="10"value="<?php echo $mobilenumber;?>"></td>
    </tr>
    <tr>
      <td>GENDER</td>
      <td>
        <input type="radio" name="gender" value="male" <?php if($gender == "male") { echo 'checked="checked"'; } ?>> Male
        <input type="radio" name="gender" value="female" <?php if($gender == "female") { echo 'checked="checked"';} ?>> Female
      </td>
    </tr>
    <tr>
      <td>ADDRESS</td>
      <td><textarea name="address" rows="4" cols="30"value="<?php echo $address;?>"></textarea></td>
    </tr>
    <tr>
      <td>CITY</td>
      <td><input type="text" name="city" maxlength="30"value="<?php echo $city;?>"></td>
    </tr>
    <tr>
      <td>PIN CODE</td>
      <td><input type="text" name="pincode" maxlength="6"value="<?php echo $pincode;?>"></td>
    </tr>
    <tr>
      <td>STATE</td>
      <td><input type="text" name="state" maxlength="30"value="<?php echo $state;?>"></td>
    </tr>
    <tr>
      <td>COUNTRY</td>
      <td><input type="text" name="country" value="India" readonly="readonly"value="<?php echo $state;?>"></td>
    </tr>
    <tr>
      <td>HOBBIES</td>
      <td>
        <input type="checkbox" name="hobbies" value="drawing" <?php if($hobbies == "drawing") { echo 'checked = "checked"'; } ?> >
         Drawing
       <input type="checkbox" name="hobbies" value="singing" <?php if($hobbies == "singing") { echo 'checked = "checked"'; } ?> >Singing  
     <br>
      </td>
    </tr>
    <tr>
      <td>
          Profile Image
      </td>
      <td><input type="file" name="image">
      <img src="http://localhost/php/studentproject/<?php echo $imagePath;?>"alt="" height="100px" width="100px"></td>
    </tr>
    <tr>
    
    <tr>
      <td colspan="2" class="center">
        <input type="submit" name="update" value="Update">
      </td>
    </tr>
  </table>
</form>
<?php

if(isset($_POST['update']))
{

    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $emailid=$_POST['emailid'];
    $mobilenumber=$_POST['mobilenumber'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $pincode = $_POST['pincode'];
    $state = $_POST['state'];
    $gender = $_POST['gender'];
    $hobbies = $_POST['hobbies'];

    $image = $_FILES['image']['name'];
    $target = "uploads/".basename($image);
  


    $con=mysqli_connect("localhost","root","","studentdetail");
    if($con)
    {
        $q="UPDATE stdinfo SET firstname='$firstname', lastname='$lastname',emailid='$emailid',mobilenumber='$mobilenumber',address='$address', city='$city',pincode='$pincode',state='$state',gender='$gender',hobbies='$hobbies',image_path='$target' WHERE id='$id'";
        
        if(move_uploaded_file($_FILES['image']['tmp_name'],$target)){
        echo "Image uploaded successfully";
        }else{
        echo "Failed to upload image";
        }

        $b1=mysqli_query($con,$q);
        if($b1)
        {
            header("location:main.php");
        }
        else
        {
            echo mysqli_error($con);
        }
    }
    else
    {
            echo "not updated";
    }

}
?>
</body>
</html>







