<?php

namespace Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class GuestFilter implements FilterInterface
{
    // This is a filter that will run before any of the functions in the controller are called

    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
        if(service('auth')->isLoggedIn()) {
            return redirect()->to('/');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}