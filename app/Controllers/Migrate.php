<?php
namespace App\Controllers;

// This is not recommended probably /migrate in the url to run the migration
class Migrate extends BaseController {
    public function index() {
        $migrate = \Config\Services::migrations();
        try {
            $migrate->latest();
            echo 'Migrations ran successfully!';
        } catch (\Exception $e) {
            // Do something with the error here...
            die($e->getMessage());
        }
    }
}