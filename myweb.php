<!DOCTYPE html>
<html>
<head>
    <title>Student Data</title>
</head>
<body>
    <h1>WELCOME TO MY WEBSITE</h1>

    <form method="post">
        Name: <input type="text" name="name"><br>
        Age: <input type="text" name="age"><br>
        Mobile_no: <input type="text" name="mobile"><br>
        <input type="submit" name="sub" value="Submit">
    </form>

    <?php
    // Connect to the database
    $con = mysqli_connect('localhost', 'root', '', 'logindb');

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Handle form submission
    if (isset($_POST['sub'])) {
        $Name = mysqli_real_escape_string($con, $_POST['name']);
        $Age = mysqli_real_escape_string($con, $_POST['age']);
        $Mobile_no = mysqli_real_escape_string($con, $_POST['mobile']);

        $query = "INSERT INTO signin (Name, Age, Mobile_no)
                  VALUES ('$Name', '$Age', '$Mobile_no')";

        $run = mysqli_query($con, $query);

        if ($run) {
            echo "Data inserted successfully.";
        } else {
            echo "Error: " . mysqli_error($con);
        }
    }
    ?>
</body>
</html>
