<?php

namespace Models;

use Exception;

class User extends AbstractModel
{
    protected $table = 'users';

    public function __construct()
    {
        parent::__construct();
    }

    public function getUser($user_id)
    {
        try {
            $result = $this->getRows([], ['id' => $user_id]);
            return toArray($result);
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
        }
    }
}
