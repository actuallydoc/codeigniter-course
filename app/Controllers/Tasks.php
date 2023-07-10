<?php

namespace App\Controllers;
use App\Entities\Task;
// Standard is capitalized first letter

class Tasks extends BaseController
{
    //We can call the constructor to load the model
    public function __construct() {
        // Load the model
        $this->model = new \App\Models\TaskModel();
    }
    public function index()
    {
       //$model = new \App\Models\TaskModel(); no need for this anymore since u can call it in the constructor and it will be available through all the functions
       $data = $this->model->findAll();
       //This is a name of the data
        //dd($data); //<-- This is a function that will dump the data to the screen for debugging or var_dump($data);
        //dd will give you a nicer format and output for quick debugging
        return view('Tasks/index', ['tasks' => $data]);
    }
    // Get the task from the database with a unique id
    public function show($id) {
        //$model = new \App\Models\TaskModel();
        $data = $this->model->find($id);
        return view('Tasks/show', ['task' => $data]);
    }
    public function new() {
        // Make a new task object to pass to the view so it can be used in the form
        $task = new Task();
    // Load the helper form to use the form functions
        return view('Tasks/new', [
            'task' => $task,
        ]);
    }

    public function create() {
        //Before inserting we need to validate the form in the model
        //$model = new \App\Models\TaskModel();
        // Get the data from the form
        // Request is a class that is available to us that will help us get the data from the form wihtout needing to check if the value is set
        //$description = $this->request->getPost('description');
        // We can just pass the whole request object to the model and it will take care of the rest.
        $task = new Task($this->request->getPost());
        //$data = [
        //    'description' => $description
        //];
        // Insert the data into the database
        //$result = $model->insert($task); <-- This is the old way
        //dd($result);
        if($this->model->insert($task)) {
            // If the result is false then we have an error
            //dd($model->errors());
            return redirect()->to('/tasks/show/' . $this->model->getInsertID())->with('info', 'Task created successfully');

          } else {
            // Returns the id
            //dd($result);
            return redirect()->back()->with('errors', $this->model->errors())->with('warning', 'Invalid data')->withInput();

        }

    }

    public function edit($id) {
        //$model = new \App\Models\TaskModel();
        $data = $this->model->find($id);
        return view('Tasks/edit', ['task' => $data]);
    }

    public function update($id) {
        //$model = new \App\Models\TaskModel();
        $task = $this->model->find($id);

        //This is the new way to fill the data from the form directly into the object after it u need to save it
        $task->fill($this->request->getPost());

        //$model->save($task); // <-- This is the new way

        //$description = $this->request->getPost('description');

        //$data = [
        //    'description' => $description                 All old way
        //];
        //$result = $model->update($id, $data);
        // Before updating we need to validate if the any data has been changed
        if(!$task->hasChanged()){

            return  redirect()->back()->with('warning', 'No changes made')->withInput();
        }
            if($this->model->save($task)) { // <--- new way here into the if statement
            // If the result is false then we have an error
            //dd($model->errors());
                return redirect()->to('/tasks/show/' . $id)->with('info', 'Task updated successfully');
        } else {
            // Returns the id
            //dd($result);
                return redirect()->back()->with('errors', $this->model->errors())->with('warning', 'Invalid data')->withInput();
        } }
}
