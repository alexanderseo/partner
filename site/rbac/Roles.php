<?php

namespace app\rbac;

class Roles
{
    const ROLE_ADMIN = 'admin';
    const ROLE_PARTNER = 'partner';

    public static function getAllRoles()
    {
        return [
            self::ROLE_ADMIN => self::ROLE_ADMIN,
            self::ROLE_PARTNER => self::ROLE_PARTNER
        ];
    }
}