<?php

namespace app\commands;

use app\models\User;
use yii\console\Controller;
use yii\console\ExitCode;
use app\rbac\Roles;

class UserController extends Controller
{
    public function actionCreate()
    {
        $name = $this->prompt('Name:', ['required' => true]);
        $password = $this->prompt('Password:', ['required' => true]);
        $mail = $this->prompt('E-mail:', ['required' => true]);
        $roleName = $this->select('Role:', Roles::getAllRoles());

        $user = User::create($name, $password, $mail, $roleName);
        $result = $user->save();

        if ($result) {
            $this->stdout('User created' . PHP_EOL);
        } else {
            $this->stdout('Can\'t create user' . PHP_EOL);
            $this->stdout(implode(', ', $user->errors));
        }

        return ExitCode::OK;
    }
}
