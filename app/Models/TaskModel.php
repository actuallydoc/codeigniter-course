<?php
namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model {
    protected $table = 'tasks';
    //Allowed fields are the fields that we want to allow to be inserted into the database and protect against mass assignments
    protected $allowedFields = ['description'];
    protected $useTimestamps = true;

    protected $returnType = 'App\Entities\Task';

    // Validation rules are rules that we want to apply to the data before we insert it into the database to check that everything is correct
    protected $validationRules = [
        'description' => 'required|min_length[3]|max_length[255]',
    ];
    //Lahko uporabiš tudi spodnji zapis za sporočila v drugem jeziku
    protected $validationMessages = [
        'description' => [
            'required' => 'Please enter a description',
            'min_length' => 'The description must be at least 3 characters long',
        ]
    ];
}