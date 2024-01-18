<?php

namespace App;

class Login
{
    public function checkLogin()
    {
        $account = [];
        if (isset($_SESSION['account'])) {
            $account =  $_SESSION['account'];
        }
        if (count($account) > 0) {
            return true;
        }
        return false;
    }
}
