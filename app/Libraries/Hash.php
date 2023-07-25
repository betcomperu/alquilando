<?php 

namespace App\libraries;

class Hash
{
    public static function hacer($password){
        return password_hash($password, PASSWORD_BCRYPT);
    }
}


?>