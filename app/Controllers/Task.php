<?php

namespace App\Controllers;
use  App\Models\TaskModel;
use App\Entities\Tasks;

class Task extends BaseController
{
    public function index()
    {   
        $model = new TaskModel();
        $data = $model->findAll();
      
        return view('Tasks/index',['data'=>$data]);
    }

    public function show($id){
        $data=$this->getTaskor404($id);

        return view('Tasks/single',['data'=>$data]);
    }

    public function new(){
        return view('Tasks/new');
    }

    public function create(){
        $model = new TaskModel();

        $task = new Tasks($this->request->getPost());

        $result=$model->insert($task);

        if($result === false){
          return redirect()->back()
                           ->with('errors',$model->errors());
        };
        $data = $model->findAll();
        return view('Tasks/index',['data'=>$data]);
    }

    public function edit($id){
        $data=$this->getTaskor404($id);

        return view('Tasks/edit',['data'=>$data]);
    }

    public function update($id)
    {
        $model =new TaskModel();
        $task = $model ->find($id);
        
        $task->fill($this->request->getPost());

        if(!$task->hasChanged()){
            return redirect()->back()
                             ->with('errors',$model->errors())
                             ->with('warning','invalid input');
        }
        else{
            $model->save($task);
            return redirect()->to("/Task/show/$id")
                             ->with('info','Task Updated successfully');
        }

  

    }

    private function getTaskor404($id){
        $model = new TaskModel();
        $data = $model->find($id);

        if($data === NULL){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return $data;
    }

}
