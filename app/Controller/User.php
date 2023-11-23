<?php

namespace App\Controller;

use App\Model\Users;

class User
{
    public function signUp(array $data) : string
    {
        $user = new Users();
        if($user->find("user_email = :email", "email=" . $data["user_email"])->fetch()) {
            return message("Email ja esta cadastrado", "danger");
        } else {
            if ($data["user_pass"] != $data["user_r_pass"]) {
                return message("As senhas não correspondem", "danger");
            } else {
                $user->full_name = $data["first_name"];
                $user->user_email = $data["user_email"];
                $user->user_pass = password_hash($data["user_pass"], PASSWORD_DEFAULT);
                $user->save();
                return message("Usuário cadastrado com sucesso", "success");
            }
        }
    }
    public function signIn(array $data) : string
    {
        $user = (new Users())->find("user_email = :email", "email=" . $data["user_email"])->fetch()->data;
        if($user) {
            if(password_verify($data["user_pass"], $user->user_pass)) {
                $_SESSION["user_id"] = $user->id;
                $_SESSION["user_name"] = $user->full_name;
                $_SESSION["logged_in"] = true;
                return $user->id;
            } else {
                return "A senha esta incorreta";
            }
        } else {
            return message("Email não encontrado", "danger");
        }
    }

    public function signOut()
    {
        session_destroy();
    }
}