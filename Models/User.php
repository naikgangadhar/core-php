<?php

//namespace Models;
include __DIR__ . '/AbstractModel.php';

class User extends AbstractModel
{
    protected $table = 'user';

    public function __construct()
    {
        parent::__construct(SERVERNAME, USER, PASSWORD, DBNAME);
    }

    public function getUsers()
    {
        try {
            $data = [];
            $result = $this->getRows($this->table);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
            }
            return $data;
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
        }
    }
}
