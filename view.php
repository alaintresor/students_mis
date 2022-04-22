<?php
include('connection.php');


// get data from database 

$query = "SELECT * FROM `students`";
$data = mysqli_query($connect, "$query");


// delete data 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM `students` WHERE `id`='$id'";
    $done = mysqli_query($connect, "$sql");
    if ($done) {
?>
        <script>
            alert("Data deleted well done");
            window.open('view.php', 'self');
        </script>
<?php
    } else {
        echo "error: " . mysqli_error($connect);
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <center>
        <br><br><br>
        <h1>Data From database</h1>
        <br><br>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Reg_number</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Gender</th>
                <th>DOB</th>
                <th>Options</th>
            </tr>
            <?php
            $nber = 1;
            while ($row = mysqli_fetch_array($data)) {
            ?>

                <tr>
                    <td><?php echo $nber ?></td>
                    <td><?php echo $row[1] ?></td>
                    <td><?php echo $row[2] ?></td>
                    <td><?php echo $row[3] ?></td>
                    <td><?php echo $row[4] ?></td>
                    <td><?php echo $row[5] ?></td>
                    <td><a href="insert.php?id=<?php echo $row[0] ?>"> <button>Edit</button></a> &nbsp;&nbsp; <a href="?id=<?php echo $row[0] ?>"><button>Delete</button></a> </td>
                </tr>
            <?php
                $nber++;
            }
            ?>
        </table>
    </center>
</body>

</html>