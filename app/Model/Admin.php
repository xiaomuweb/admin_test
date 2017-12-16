<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Admin extends User
{
    //定义一个受保护的属性，将remember_token定义为空即可
    protected $rememberTokenName = '';
}
