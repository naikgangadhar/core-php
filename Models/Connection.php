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
            $result = $this->getRows([], ['user_id' => $user_id]);
            return toArray($result);
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
        }
    }
}
