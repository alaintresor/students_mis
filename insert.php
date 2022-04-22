<?php
include('connection.php');
if (isset($_POST['sub_btn'])) {

    // get data form html form 
    $reg_nber = $_POST['reg_nber'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];

    $sql = "INSERT INTO `students` (`id`, `reg_nber`, `fname`, `lname`, `gender`, `dob`) VALUES (NULL, '$reg_nber', '$fname', '$lname', '$gender', '$dob');";

    $done = mysqli_query($connect, "$sql");

    if ($done) {

?>
        <script>
            alert("data inserted well done")
        </script>
<?php
    } else {
        echo "error" . mysqli_error($connect);
    }
}

// get data for update 
$regNber = '';
$fname = '';
$lname = '';
$gender = '';
$dob = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $selectQuery = "SELECT * FROM `students` WHERE `id`='$id'";
    $dataToUpdate = mysqli_query($connect, "$selectQuery");
    $arrayData = mysqli_fetch_array($dataToUpdate);
    $regNber = $arrayData[1];
    $fname = $arrayData[2];
    $lname = $arrayData[3];
    $gender = $arrayData[4];
    $dob = $arrayData[5];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form {
            margin-top: 10rem;
        }

        table {
            background-color: skyblue;
            padding: 1rem;
            /* color: white; */
            font-weight: bold;
        }

        caption {
            color: blue;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <center>
        <form action="#" method="post">
            <caption>Register New Student</caption>
            <table>
                <tr>
                    <td>Reg Number: </td>
                    <td> <input type="number" required name="reg_nber" value="<?php echo $regNber ?>"></td>
                </tr>
                <tr>
                    <td>Firstname: </td>
                    <td> <input type="text" required name="fname" value="<?php echo $fname ?>"></td>
                </tr>
                <tr>
                    <td>Lastname: </td>
                    <td> <input type="text" required name="lname" value="<?php echo $lname ?>"></td>
                </tr>
                <tr>
                    <td>Gender: </td>
                    <td> Male <input type="radio" name="gender" value="M"> Female <input type="radio" name="gender" value="F"></td>
                </tr>
                <tr>
                    <td>DOB: </td>
                    <td> <input type="text" required name="dob" value="<?php echo $dob ?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><button type="submit" name="sub_btn">Save</button>
        </form>
        </table>

    </center>
</body>

</html>


https://github.com/alaintresor/student_mis