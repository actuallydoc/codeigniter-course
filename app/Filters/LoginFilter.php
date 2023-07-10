<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LoginFilter implements FilterInterface
{
    // This is a filter that will run before any of the functions in the controller are called

    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if(!service('auth')->isLoggedIn()) {
            // This will store the current url in the session and then redirect the user to the login page
            session()->set('redirect_url', current_url());
            return redirect()->to('/login')->with('info', 'You must be logged in to view this page');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}