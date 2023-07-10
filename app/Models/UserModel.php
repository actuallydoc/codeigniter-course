<?php

namespace App\Models;

class UserModel extends \CodeIgniter\Model
{
    protected $table = "user";
    protected $useTimestamps = true;

    protected $allowedFields = ['name', 'email', 'password'];
    protected $validationRules = [
        'name' => 'required',
        'email' => 'required|valid_email|is_unique[user.email]',
        'password' => 'required|min_length[6]',
        'password_confirm' => 'required|matches[password]', // This will check if the password matches the password_confirm field
    ];
    protected $returnType = 'App\Entities\User';
    protected $beforeInsert = ['hashPassword']; // This function will be called before inserting the data into the database and it needs to be protected
    protected function hashPassword(array $data) {
        if(isset($data['data']['password'])) {
            $data['data']['password_hashed'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

            unset($data['data']['password']);
        }
        return $data;
    }
    public function findByEmail($email) {

        return $this->where('email', $email)->first();
    }



}