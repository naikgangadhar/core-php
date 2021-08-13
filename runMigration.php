<?php
include __DIR__ . '/settings.php';

$conn = new mysqli(SERVERNAME, USER, PASSWORD, DBNAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$ranMigrations = [];
$batch_id = 1;
$Query = "";
$result = $conn->query("SELECT * FROM migration");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $ranMigrations[] = $row['name'];
        if ($batch_id <= $row['batch_id']) $batch_id = $row['batch_id'] + 1;
    }
}

try {
    foreach (glob(__DIR__ . '/migrations/*.php') as $file) {
        if (!in_array(basename($file, ".php"), $ranMigrations)) {
            shell_exec("php " . $file);
            $Query .= "INSERT INTO migration (name , batch_id) VALUES ( '" . basename($file, ".php") . "' , '" . $batch_id . "' );";
        }
    }
    echo $Query . "\n";
    if ($conn->query($Query) === TRUE)
        echo $Query . " Query Ran successfully";
    else
        echo "Error: " . $Query . "<br>" . $conn->error;

    $conn->close();
} catch (Exception $e) {
    error_log("Exception: " . $e->getMessage());
}
