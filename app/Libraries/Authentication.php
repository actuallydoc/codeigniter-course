<?php
namespace App\Libraries;

class Authentication {

    private $user;
    public function login($email ,$password) {

        $model = new \App\Models\UserModel();
        // Get the user from the database
        // $user = $model->where('email', $email)->first(); <-- This is the same as the next line
        $user = $model->findByEmail($email); // <-- Much cleaner
        // Check if the user exists
        if ($user === null) {
            return false;
        }
        /*
        if (!password_verify($password, $user->password_hashed)) {
            return false;           // old way
        }
        */
        $user->verifyPassword($password); // new way
        // Log the user in
        // Store the user in the session
        // make the session
        $session = session(); // This session will persist even if you close the browser 2 hours by default
        // Regenerate the session (this is a security measure)
        $session->regenerate();
        // Set the user id in the session so we can use it later to get the user from the database when we need it again
        $session->set('user_id', $user->id);
        // Redirect to the home page
        return true;
    }

    public function logout() {
        session()->destroy();
    }

    public function getCurrentUser() {

        if(!$this->isLoggedIn()) {
            return null;
        }
        // If we have already retrieved this user, don't retrieve it again this is called caching
        if($this->user === null) {

        $model = new \App\Models\UserModel();
        return $this->user= $model->find(session()->get('user_id'));
        }
        return $this->user;
    }

    public function isLoggedIn(): bool
    {
        return session()->has('user_id');
    }
}