<?php

namespace Models;

use Exception;

class Post extends AbstractModel
{
    protected $table = 'posts';

    public function __construct()
    {
        parent::__construct();
    }

    public function getPosts($user_id)
    {
        try {
            $result = $this->getRows([], ['user_id' => $user_id]);
            return toArray($result);
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
        }
    }
}
