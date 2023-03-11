<?php

namespace Controllers;

use \Model\Users;

class Authentication {
    public static function loginIndex() {
        include 'views/login.php';
    }

    public static function processLogin() {
        $users = new Users;

        $user = $users->getRecordsBy([
            'email' => $_POST['email'],
            'password' => md5($_POST['password'])
        ]);

        if(!$user->recordExists()) {
            $error = [
                'message' => 'This user doesnt exists',
                'status' => 'danger'
            ];

            header('Location: ?page=login&' . http_build_query($error));
            exit;
        }

        $_SESSION['user_id'] = $user->records[0]['id'];
        $_SESSION['user_name'] = $user->records[0]['user_name'];

        header('Location: ?page=/');
        exit;
    }

    public static function registerIndex() {
        include 'views/register.php';
    }

    public static function processRegister() {
        $users = new Users;

        if($users->getRecordsBy([
            'email' => $_POST['email'],
            'user_name' => $_POST['user_name']
        ], 'OR')->recordExists()){
            $error = [
                'message' => 'This user already exists',
                'status' => 'danger'
            ];

            header('Location: ?page=register&' . http_build_query($error));
            exit;
        }

        $_POST['password'] = md5($_POST['password']);

        $users->addRecord($_POST);

        $error = [
            'message' => 'User succesfully registered',
            'status' => 'success'
        ];

        header('Location: ?page=login&' . http_build_query($error));
        exit;
    }
}