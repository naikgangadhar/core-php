<?php

#Pass arugumet as rollback for rollback or else to run migration pass run or none.
#Mind the migrations directory and class name and file names

include __DIR__ . '/settings.php';

class migration
{
    protected $connection;

    protected $ranMigrations = [];

    protected $lastBatch = [];

    protected $batch_id = 1;

    public function __construct($type = "")
    {
        $this->setConnection();

        $this->setRanMigrations();

        if ($type == "" || $type == 'run') {
            if ($this->runMigrations() === TRUE)
                echo "Migration Ran successfully";
            else
                echo "Error:" . $this->connection->error;
        } else if ($type == 'rollback') {
            if ($this->rollbackMigrations() === TRUE)
                echo "Rollbacked Last Migration successfully";
            else
                echo "Error:" . $this->connection->error;
        }
    }

    public function __destruct()
    {
        $this->connection->close();
    }

    protected function setConnection()
    {
        $this->connection = new mysqli(SERVERNAME, USER, PASSWORD, DBNAME);

        if ($this->connection->connect_error)
            error_log("Connection failed: " . $this->connection->connect_error);
    }

    protected function setRanMigrations()
    {
        $result = $this->connection->query("SELECT * FROM migration");
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $this->ranMigrations[] = $row['name'];
                $this->lastBatch[$row['batch_id']][] = $row['name'];
                if ($this->batch_id < $row['batch_id']) $this->batch_id = $row['batch_id'];
            }
        }
        $this->lastBatch = $this->lastBatch[$this->batch_id];
    }
    protected function runMigrations()
    {
        $Query = "";
        foreach (glob(DOCUMENT_ROOT . '/migrations/*.php') as $file) {
            if (!in_array(basename($file, ".php"), $this->ranMigrations)) {
                $class = "migrations\\" . basename($file, ".php");
                $this->runQuery($class::UP);
                $Query .= "INSERT INTO migration (name , batch_id) VALUES ( '" . basename($file, ".php") . "' , " . ($this->batch_id + 1) . " );";
            }
        }
        return $this->connection->multi_query($Query);
    }

    protected function rollbackMigrations()
    {
        foreach ($this->lastBatch as $migration) {
            $class = "migrations\\" . $migration;
            $this->runQuery($class::DOWN);
        }
        return $this->runQuery("DELETE FROM migration WHERE batch_id =" . $this->batch_id . ";");
    }

    protected function runQuery($sql = "")
    {
        return $this->connection->query($sql);
    }
}
$type = !empty($argv[1]) ? $argv[1] : "";
new migration($type);
