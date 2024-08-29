<!DOCTYPE html>
<html>
<head>
  <title>Student Registration Form</title>
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

<h3>STUDENT REGISTRATION FORM</h3>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
  <table>
    <tr>
      <th colspan="2">PERSONAL INFORMATION</th>
    </tr>
    <tr>
      <td>FIRST NAME</td>
      <td><input type="text" name="firstname" maxlength="30" required></td>
    </tr>
    <tr>
      <td>LAST NAME</td>
      <td><input type="text" name="lastname" maxlength="30" required></td>
    </tr>
    <tr>
      <td>EMAIL ID</td>
      <td><input type="text" name="emailid" maxlength="100" required></td>
    </tr>
    <tr>
      <td>MOBILE NUMBER</td>
      <td><input type="text" name="mobilenumber" maxlength="10"></td>
    </tr>
    <tr>
      <td>GENDER</td>
      <td>
        <input type="radio" name="gender" value="male"> Male
        <input type="radio" name="gender" value="Female"> Female
      </td>
    </tr>
    <tr>
      <td>ADDRESS</td>
      <td><textarea name="address" rows="4" cols="30"></textarea></td>
    </tr>
    <tr>
      <td>CITY</td>
      <td><input type="text" name="city" maxlength="30"></td>
    </tr>
    <tr>
      <td>PIN CODE</td>
      <td><input type="text" name="pincode" maxlength="6"></td>
    </tr>
    <tr>
      <td>STATE</td>
      <td><input type="text" name="state" maxlength="30"></td>
    </tr>
    <tr>
      <td>COUNTRY</td>
      <td><input type="text" name="country" value="India" readonly="readonly"></td>
    </tr>
    <tr>
      <td>HOBBIES</td>
      <td>
        <input type="checkbox" name="hobbies[]" value="drawing"> Drawing
        <input type="checkbox" name="hobbies[]" value="singing"> Singing
        <br>
      
    
      </td>
    </tr>
    <tr>
      <td colspan="2" class="center">
        <input type="file" name="image">
        <input type="submit" name="submit" value="Submit">
      </td>
    </tr>
  </table>
</form>

<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "studentdetail";

// Create connection
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
  // Escape user inputs for security
  $fn = mysqli_real_escape_string($conn, $_POST['firstname']);
  $ln = mysqli_real_escape_string($conn, $_POST['lastname']);
  $ei = mysqli_real_escape_string($conn, $_POST['emailid']);
  $mn = mysqli_real_escape_string($conn, $_POST['mobilenumber']);
  $add = mysqli_real_escape_string($conn, $_POST['address']);
  $ct = mysqli_real_escape_string($conn, $_POST['city']);
  $pc = mysqli_real_escape_string($conn, $_POST['pincode']);
  $st = mysqli_real_escape_string($conn, $_POST['state']);
  $gen = isset($_POST['gender']) ? $_POST['gender'] : '';
  $hobbies = isset($_POST['hobbies']) ? implode(',', $_POST['hobbies']) : '';
  $other_hobby = isset($_POST['other_hobby']) ? mysqli_real_escape_string($conn, $_POST['other_hobby']) : '';

  
  $sql = "INSERT INTO stdinfo (firstname, lastname, emailid, mobilenumber, address, city, pincode, state, gender, hobbies) VALUES ('$fn', '$ln', '$ei', '$mn', '$add', '$ct', '$pc', '$st', '$gen', '$hobbies')";
      

  if (mysqli_query($conn, $sql)) {
    //echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}

// Displaying data from database
$sql = "SELECT * FROM stdinfo";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo "<table border='1' bgcolor='grey' align='center' width='60%'>";
  echo "<tr><th>ID</th><th>First Name</th><th>Last Name</th><th>Email ID</th><th>Mobile Number</th><th>Address</th><th>City</th><th>Pin Code</th><th>State</th><th>Gender</th><th>Hobbies</th><th>Action</th></br>
  
  </tr>";
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['firstname']."</td>";
    echo "<td>".$row['lastname']."</td>";
    echo "<td>".$row['emailid']."</td>";
    echo "<td>".$row['mobilenumber']."</td>";
    echo "<td>".$row['address']."</td>";
    echo "<td>".$row['city']."</td>";
    echo "<td>".$row['pincode']."</td>";
    echo "<td>".$row['state']."</td>";
    echo "<td>".$row['gender']."</td>";
    echo "<td>".$row['hobbies']."</td>";
    echo "<td><a href='updatestudent.php?id=$row[id]'>Edit</a></td>";
    echo "<td><a href='delete.php?id=$row[id]'>Delete</a></td>";

  

 echo "</tr>";
 
  
  }
  echo "</table>";
} else {
  echo "0 results";
}

mysqli_close($conn);
?>

</body>
</html>
