<?php
session_start();
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hardcoded check (In production, check against database)
    if ($email === "kenny@gmail.com" && $password === "password") {
        $_SESSION['admin_logged_in'] = true;
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Global Hospitals - Admin Login</title>
    <style>/* ... (Your original login CSS) ... */</style>
</head>
<body>
    <div class="login-card">
        <div class="hospital-icon">🏥</div>
        <h2>Admin Login</h2>
        <?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
        <form method="POST">
            <div class="form-group">
                <label>Email-ID:</label>
                <input type="email" name="email" value="kenny@gmail.com" required>
            </div>
            <div class="form-group">
                <label>Password:</label>
                <input type="password" name="password" value="password" required>
            </div>
            <button type="submit" name="login" class="login-btn">Login</button>
        </form>
    </div>
</body>
</html>
