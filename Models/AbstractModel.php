<?php

//namespace Models;

abstract class AbstractModel
{

    protected $connection = null;

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

    protected function insertRow($table, $Asc_Array = [])
    {
        try {
            if (empty($table) || empty($Asc_Array))
                return false;

            $col = $val = "";
            $col = "('" . implode("','", array_keys($Asc_Array)) . "')";
            $val = "('" . implode("','", array_values($Asc_Array)) . "')";

            $sql = "INSERT INTO " . $table . $col . " VALUES " . $val;

            if ($this->connection->query($sql) === TRUE) {
                echo "New record created successfully";
                return true;
            } else {
                echo "Error: " . $sql . "<br>" . $this->connection->error;
                return false;
            }
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
        }
    }

    protected function insertRowGetID($table, $Asc_Array = [])
    {
        try {
            if (empty($table) || empty($Asc_Array))
                return false;

            $col = $val = "";
            $col = "('" . implode("','", array_keys($Asc_Array)) . "')";
            $val = "('" . implode("','", array_values($Asc_Array)) . "')";

            $sql = "INSERT INTO " . $table . $col . " VALUES " . $val;

            if ($this->connection->query($sql) === TRUE) {
                echo "New record created successfully";
                return $this->connection->insert_id;
            } else {
                echo "Error: " . $sql . "<br>" . $this->connection->error;
                return false;
            }
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
        }
    }

    protected function insertMultipleRow($table, $Asc_Array = [])
    {
        try {
            if (empty($table) || empty($Asc_Array))
                return false;

            $col = $val = $sql = "";
            foreach ($Asc_Array as $key => $row) {
                $col = "('" . implode("','", array_keys($row)) . "')";
                $val = "('" . implode("','", array_values($row)) . "')";

                $sql .= "INSERT INTO " . $table . $col . " VALUES " . $val . ";";
            }

            if ($this->connection->query($sql) === TRUE) {
                echo "New records created successfully";
                return true;
            } else {
                echo "Error: " . $sql . "<br>" . $this->connection->error;
                return false;
            }
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
        }
    }

    protected function getRows($table, $selector = [], $where = [], $order_col = "", $order = "")
    {
        try {
            if (empty($table))
                return false;
            $clause = "";
            foreach ($where as $key => $val) {
                $clause .= $key . "=" . $val . "AND";
            }
            $clause = strlen($clause) > 0 ? " WHERE " . substr($clause, 0, -3) : "";
            $sel = !empty($selector) ? implode(", ", array_keys($selector)) : ' * ';
            $sql = "SELECT " . $sel . " FROM " . $table . $clause . " " . $order_col . " " . $order;
            $result = $this->connection->query($sql);
            return $result;
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
        }
    }
}
