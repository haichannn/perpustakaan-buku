<?php

class ValidationAuthForms
{
    private $username;
    private $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    function ValidationRegister(): array
    {
        $errors = [];

        if (empty($this->username)) {
            $errors["username"] = "username tidak boleh kosong";
        }

        // maksimal username adalah 50 dan minimal adalah 5
        else if (strlen($this->username) < 5) {
            $errors["username"] = "username tidak boleh kurang dari 5 karakter";
        } else if (strlen($this->username) > 50) {
            $errors["username"] = "username tidak boleh lebih dari 50 karakter";
        }

        if (empty($this->password)) {
            $errors["password"] = "password tidak boleh kosong";
        }

        // maksimal password adalah 200 dan minimal adalah 5
        else if (strlen($this->password) < 5) {
            $errors["password"] = "password tidak boleh kurang dari 5 karakter";
        } else if (strlen($this->password) > 200) {
            $errors["password"] = "password tidak boleh lebih dari 200 karakter";
        }

        return $errors;
    }

    function ValidationLogin(): array
    {
        $errors = [];
        
        if (empty($this->username)) {
            $errors["username"] = "username tidak boleh kosong";
        }

        if (empty($this->password)) {
            $errors["password"] = "password tidak boleh kosong";
        }

        return $errors;
     }
}
