<?php

namespace Models;

use Exception;

class Comment extends AbstractModel
{
    protected $table = 'comments';

    public function __construct()
    {
        parent::__construct();
    }

    public function getComments($user_id)
    {
        try {
            $result = $this->getRows([], ['user_id' => $user_id]);
            return toArray($result);
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
        }
    }
}
