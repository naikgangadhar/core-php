<?php

namespace Models;

use Exception;

class Connection extends AbstractModel
{
    protected $table = 'connections';

    public function __construct()
    {
        parent::__construct(SERVERNAME, USER, PASSWORD, DBNAME);
    }

    public function getConnections($user_id)
    {
        try {
            $data = [];
            $result = $this->getRows([], ['user_id' => $user_id]);
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
