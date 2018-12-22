<?php
/**
 * Created by PhpStorm.
 * User: Hong
 * Date: 2018/4/12
 * Time: 10:15
 * Function:
 */

namespace App\Contracts;


interface JwtAuthContract
{
    public function login();

    public function refresh();

    public function logout();

    public function info();
}