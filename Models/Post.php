<?php

namespace Models;

use Exception;

class Post extends AbstractModel
{
    protected $table = 'posts';

    public function __construct()
    {
        parent::__construct(SERVERNAME, USER, PASSWORD, DBNAME);
    }

    public function getPosts($user_id)
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
