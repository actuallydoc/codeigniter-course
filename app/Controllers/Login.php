<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Config\Services;

class Login extends BaseController
{
    public function new()
    {
        return view('Login/new');
    }
    public function create()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Load the authentication library which we created earlier in app\Libraries\Authentication.php
        $auth = new  \App\Libraries\Authentication; // Old way without services
        //$auth = Services::auth(); // New way with services 1
        $auth = service('auth'); // New way with services 2

        // Load the model
        $model = new \App\Models\UserModel();
        // Get the user from the database
        $user = $model->findByEmail($email);
        // Check if the user exists
        if(!$user) {
            // User doesn't exist
            return redirect()->back()->withInput()->with('warning', 'Invalid login');
        }
        if($auth->login($email, $password)) {
            // This is set so that we can redirect the user to the page they were on before they logged in otherwise redirect them to the home page
            $redirect_url = session()->get('redirect_url') ?? '/';

            unset($_SESSION['redirect_url']);
            return redirect()->to($redirect_url)->with('info', 'Login successful');

        } else {
            // User doesn't exist
            return redirect()->back()->withInput()->with('warning', 'Invalid login');
        }
    }
        public function delete(): \CodeIgniter\HTTP\RedirectResponse
        {
            // Destroy the session
            service('auth')->logout();
            // Redirect to the login page this will go to the new function because we destroyed the session but the flashdata is inside the session so we redirect and append new data in another route
            return redirect()->to('/login/showLogoutMessage');
        }
        public function showLogoutMessage() {
            return redirect()->to('/')->with('info', 'Logout successful');
        }
}