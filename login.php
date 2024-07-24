<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //  establish a database connection 
    $connection = mysqli_connect("localhost", "root", "password", "my");

    // Check if connection is successful
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username and password against the database
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        // User authenticated
        $user = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user['role'];

        // Redirect to the appropriate dashboard
        if ($user['role'] == 'admin') {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: user_dashboard.php");
        }
        exit();
    } else {
        // Authentication failed
        $error = "Invalid username or password";
        header("Location: index.php?error=$error");
        exit();
    }
} else {
    // If user tries to access this page directly without submitting the form
    header("Location: index.php");
    exit();
}
?>

<?php
session_start();

// Check if user is logged in and is admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}
?>
<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //  establish a database connection 
    $connection = mysqli_connect("localhost", "root", "password", "my");

    // Check if connection is successful
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username and password against the database
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) == 1) {
        // User authenticated
        $user = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user['role'];

        // Redirect to the appropriate dashboard
        if ($user['role'] == 'admin') {
            header("Location: admin_dashboard.php");
        } else {
            header("Location: user_dashboard.php");
        }
        exit();
    } else {
        // Authentication failed
        $error = "Invalid username or password";
        header("Location: index.php?error=$error");
        exit();
    }
} else {
    // If user tries to access this page directly without submitting the form
    header("Location: index.php");
    exit();
}
?>

<?php
session_start();

// Check if user is logged in and is admin
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <h4 align="center"><a href="../index.php" style="color:#000;">IAA Projector management system |  Admin Login</a></h4>

     <li class="no-padding"><a class="waves-effect waves-grey" href="index.php">Employe Login</a></li>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <?php
    if (isset($error_message)) {
        echo "<p style='color:red;'>$error_message</p>";
    }
    ?>
</body>
</html>

