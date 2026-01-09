<?php
session_start();
require 'database.php'; // Connect to SQLite

// Security check: Redirect to login if not authenticated
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: index.php");
    exit();
}

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_slip'])) {
    $text = $_POST['dischargeText'];
    $age = $_POST['age'];
    $lang = $_POST['language'];

    $stmt = $db->prepare("INSERT INTO discharge_slips (content, age, language) VALUES (:content, :age, :lang)");
    $stmt->bindValue(':content', $text, SQLITE3_TEXT);
    $stmt->bindValue(':age', $age, SQLITE3_INTEGER);
    $stmt->bindValue(':lang', $lang, SQLITE3_TEXT);
    
    if ($stmt->execute()) {
        $msg = "Record saved successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Discharge Slip Assistant</title>
    <style>/* ... (Your original dashboard CSS) ... */</style>
</head>
<body>
<div class="overlay"></div>
<div class="container">
    <h2>🏥 Hospital Discharge Slip Assistant</h2>
    <?php if(isset($msg)) echo "<p style='color:green'>$msg</p>"; ?>

    <form method="POST">
        <label for="dischargeText">Paste Discharge Slip Text</label>
        <textarea name="dischargeText" id="dischargeText" placeholder="Paste discharge summary here..."></textarea>

        <label for="age">Patient Age</label>
        <input type="number" name="age" id="age" min="0" max="120">

        <label for="language">Preferred Language</label>
        <select name="language" id="language">
            <option value="English">English</option>
            <option value="Tamil">Tamil</option>
            <option value="Hindi">Hindi</option>
        </select>

        <button type="submit" name="submit_slip">Submit and Save to Database</button>
    </form>

    <a href="logout.php"><button type="button" class="logout-btn">Logout</button></a>
</div>
</body>
</html>