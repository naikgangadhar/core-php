<?php

namespace Models;

use Exception;

class User extends AbstractModel
{
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct(SERVERNAME, USER, PASSWORD, DBNAME);
    }

    public function getUser($user_id)
    {
        try {
            $data = [];
            $result = $this->getRows([], ['id' => $user_id]);
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
