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
   

   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-2 w-25" style="border:2px solid black;">
        <h5> Update Form </h5>
        <form action="<?php $_SERVER["PHP_SELF"]; ?>" method="post"> 
      
            <div class="form-floating mt-2 mb-2">
                <input type="text" class="form-control" id="ui" placeholder="Enter firstname " name="firstname" value="<?php echo $firstname;?>" required>
                <label for="ui"> firstname </label>
            </div>

            <div class="form-floating mt-2 mb-2">
                <input type="text" class="form-control" id="ui" placeholder="Enter lastname " name="lastname" value="<?php echo $lastname;?>" required>
                <label for="ui"> lastname </label>
            </div>

            <div class="form-floating mt-2 mb-2">
                <input type="text" class="form-control" id="email" placeholder="Enter emailid" name="emailid" value="<?php echo $emailid;?>" required>
                <label for="email"> emailid</label>
            </div>

            <div class="form-floating mt-2 mb-2">
                <input type="text" class="form-control" id="mobilenumber" placeholder="Enter mobile Number" name="mobilenumber" value="<?php echo $mobilenumber;?>" required>
                <label for="phone">  mobile number </label>
            </div>

            <div class="form-floating mt-2 mb-2">
                <input type="text" class="form-control" id="address" placeholder="Enter address " name="address" value="<?php echo $address;?>" required>
                <label for="ui"> address </label>
            </div>

            <div class="form-floating mt-2 mb-2">
                <input type="text" class="form-control" id="city" placeholder="Enter city " name="city" value="<?php echo $city;?>" required>
                <label for="ui"> city </label>

            </div>

            <div class="form-floating mt-2 mb-2">
                <input type="text" class="form-control" id="pincode" placeholder="Enter pincode " name="pincode" value="<?php echo $pincode;?>" required>
                <label for="ui"> pincode </label>
            </div>

            <div class="form-floating mt-2 mb-2">
                <input type="text" class="form-control" id="state" placeholder="Enter state " name="state" value="<?php echo $state;?>" required>
                <label for="ui"> state </label>
            </div>

            <legend> gender:</legend>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="male"<?php if($gender == "male") { echo 'checked="checked"';; } ?> name="gender" value="male">
                <label class="form-check-label" for="male">
                 Male
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" id="female" <?php if($gender == "female") { echo 'checked="checked"';; } ?> name="gender" value="female">
                <label class="form-check-label" for="female">
                  Female
                </label>
            </div>

             <legend>hobbies:</legend>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="drawing" id="flexCheckDefault" <?php if($hobbies == "drawing") { echo 'checked="checked"'; } ?> name="hobbies">
                <label class="form-check-label" for="flexCheckDefault">
                 drawing
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="singing" id="flexCheckChecked" <?php if($hobbies == "singing") { echo 'checked="checked"'; } ?> name="hobbies">
                <label class="form-check-label" for="flexCheckChecked">
                  singing
                </label>
            </div>

            
            <button type="submit" class="btn btn-info mt-2" name="update"> Submit </button>
        </form>
    </div>
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

    $con=mysqli_connect("localhost","root","","studentdetail");
    if($con)
    {
        $q="UPDATE stdinfo SET firstname='$firstname', lastname='$lastname',emailid='$emailid',mobilenumber='$mobilenumber',address='$address', city='$city',pimcode='$pincode',state='$state'gender='$gender'hobbies='$hobbies' WHERE id='$id'";
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


