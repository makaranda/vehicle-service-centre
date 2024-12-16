<?php
// Database connection details
$host = 'localhost';  // MySQL host (usually 'localhost')
$username = 'root';   // MySQL username
$password = '';       // MySQL password
$dbname = 'php_autoonlinedb';  // Database name to backup

// Set the filename for the backup (based on the database name and timestamp)
$backupFile = $dbname . '_' . date('Y-m-d_H-i-s') . '.sql';

// Command to create the backup using mysqldump
//$command = "mysqldump --opt --host=$host --user=$username --password=$password $dbname > $backupFile";
$command = "D:\\xampp\\mysql\\bin\\mysqldump --opt --host=$host --user=$username --password=$password $dbname > $backupFile";
// Execute the command
exec($command, $output, $return_var);

// Check if the backup was successful
if ($return_var == 0) {
    // Set the headers to prompt for file download
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="' . basename($backupFile) . '"');
    header('Content-Length: ' . filesize($backupFile));

    // Read the file and output it to the browser
    readfile($backupFile);

    // Optionally, delete the backup file after download
    //unlink($backupFile);
    exit;
} else {
    // If backup fails, show an error
    echo "Error: Unable to create database backup.";
}
?>
