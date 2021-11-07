<?php

namespace App\Controllers;
use  App\Models\TaskModel;

class Task extends BaseController
{
    public function index()
    {   
        $model = new TaskModel();
        $data = $model->findAll();
      
        return view('Tasks/index',['data'=>$data]);
    }

    public function show($id){
        $model = new TaskModel();
        $data = $model->find($id);

        return view('Tasks/single',['data'=>$data]);
    }

    public function new(){
        return view('Tasks/new');
    }

    public function create(){
        $model = new TaskModel();

        $result=$model->insert([
            'task'=>$this->request->getPost('task'),
            'task_description'=>$this->request->getPost('task_description')
        ]);

        if($result === false){
          return redirect()->back()
                           ->with('errors',$model->errors());
        };
        $data = $model->findAll();
        return view('Tasks/index',['data'=>$data]);
    }

    public function edit($id){
        $model = new TaskModel();
        $data = $model->find($id);

        return view('Tasks/edit',['data'=>$data]);
    }

    public function update($id)
    {
        $model =new TaskModel();

        $result=  $model->update($id,[
            'task_description' => $this->request->getPost('task_description'),
            'task'             => $this->request->getPost('task')
        ]);

        if($result){
            return redirect()->to("/Task/show/$id")
                            ->with('info','Task Updated successfully');
        }else{
            return redirect()->back()
                             ->with('errors',$model->errors());
                             
        }

        

    }
}
