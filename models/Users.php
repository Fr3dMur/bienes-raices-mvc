<?php

namespace Model;

use JetBrains\PhpStorm\Internal\ReturnTypeContract;


class Users extends ActiveRecord
{
    protected static $tabla = 'users';
    protected static $columnasDb = ['id', 'email', 'password', 'username'];
    // {   }

    public $id;
    public $email;
    public $password;
    public $username;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? NULL;
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->username = $args['username'] ?? '';
    }
}
// {}
