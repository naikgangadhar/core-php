<?php

namespace Models;

use Exception;

class LoginDetail extends AbstractModel
{
    protected $table = 'login_details';

    public function __construct()
    {
        parent::__construct();
    }

    public function getLoginDetails($user_id)
    {
        try {
            $result = $this->getRows([], ['user_id' => $user_id]);
            return toArray($result);
        } catch (Exception $e) {
            error_log("Exception: " . $e->getMessage());
        }
    }
}
