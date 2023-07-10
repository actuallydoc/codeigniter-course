<?php

namespace App\Controllers;


// Only have Create method in this controller
class Signup extends \App\Controllers\BaseController
{
    public function new(): string
    {
        return view('Signup/new');
    }

    public function create() {
        $user = new \App\Entities\User($this->request->getPost());
        $model = new \App\Models\UserModel();

        if($model->insert($user)) {
            return redirect()->to('/signup/success')->with('info', 'User created successfully');
        } else {
            return redirect()->back()->with('errors', $model->errors())->with('warning', 'Invalid data')->withInput();
        };
    }
    public function success(): string
    {
        return view('Signup/success');
    }
}