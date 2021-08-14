<?php

namespace Models;

use mysqli;
use Exception;

abstract class AbstractModel
{

    protected $connection;

    protected $table;

    public function __construct($servername, $user, $password, $dbname)
    {
        $this->connection = new mysqli($servername, $user, $password, $dbname);

        if ($this->connection->connect_error) {
            error_log("Connection failed: " . $this->connection->connect_error);
        }
    }

    public function __destruct()
    {
        $this->connection->close();
    }

    protected function insertRow($Asc_Array = [])
    {
        try {
            if (empty($this->table) || empty($Asc_Array))
                return false;

            $col = "('" . implode("','", array_keys($Asc_Array)) . "')";
            $val = "('" . implode("','", array_values($Asc_Array)) . "')";

            $sql = "INSERT INTO " . $this->table . $col . " VALUES " . $val;

            return $this->runQuery($sql);
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
        }
    }

    protected function insertRowGetID($Asc_Array = [])
    {
        try {
            if (empty($this->table) || empty($Asc_Array))
                return false;

            $col = "('" . implode("','", array_keys($Asc_Array)) . "')";
            $val = "('" . implode("','", array_values($Asc_Array)) . "')";

            $sql = "INSERT INTO " . $this->table . $col . " VALUES " . $val;

            return $this->runQuery($sql) ? $this->connection->insert_id : false;
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
        }
    }

    protected function insertMultipleRow($Asc_Array = [])
    {
        try {
            if (empty($this->table) || empty($Asc_Array))
                return false;

            $sql = "";
            foreach ($Asc_Array as $key => $row) {
                $col = "('" . implode("','", array_keys($row)) . "')";
                $val = "('" . implode("','", array_values($row)) . "')";
                $sql .= "INSERT INTO " . $this->table . $col . " VALUES " . $val . ";";
            }

            return $this->connection->multi_query($sql);
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
        }
    }
    #For child class table simple query, varable names stands as they mean 
    protected function getRows($selector = [], $where = [], $order_col = "", $order = "")
    {
        try {
            if (empty($this->table))
                return false;
            $clause = "";
            foreach ($where as $key => $val) {
                $clause .= $key . "=" . $val . "AND";
            }
            $clause = strlen($clause) > 0 ? " WHERE " . substr($clause, 0, -3) : "";
            $sel = !empty($selector) ? implode(", ", array_keys($selector)) : ' * ';
            $sql = "SELECT " . $sel . " FROM " . $this->table . $clause . " " . $order_col . " " . $order;
            $result = $this->runSql($sql);
            return $result;
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
        }
    }

    private function runQuery($sql = "")
    {
        try {
            if ($this->runSql($sql) === TRUE) {
                echo $sql . " Query Ran successfully";
                return true;
            } else {
                echo "Error: " . $sql . "<br>" . $this->connection->error;
                return false;
            }
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
        }
    }
    #Avilable for child class to run complex Query like joins
    protected function runSql($sql = "")
    {
        try {
            return $this->connection->query($sql);
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
        }
    }
}
