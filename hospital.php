<?php
$db = new SQLite3('hospital.db');

// Create table for discharge records if it doesn't exist
$db->exec("CREATE TABLE IF NOT EXISTS discharge_slips (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    content TEXT,
    age INTEGER,
    language TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
)");

// Note: For a real app, you'd store users here too. 
// For this demo, we use the hardcoded credentials from your original code.
?>