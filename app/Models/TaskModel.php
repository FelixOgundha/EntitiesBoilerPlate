<?php

namespace App\Models;

use CodeIgniter\Model;

class TaskModel extends Model
{
    protected $table      = 'tasks';
    protected $primaryKey = 'task_id';

    protected $allowedFields=['task','task_description'];

    protected $validationRules    = [
        'task'  => 'required|alpha_numeric_space|min_length[3]',
        'task_description' => 'required|alpha_numeric_space|min_length[3]',
    ];

    protected $validationMessages = [
        'task'        => [
            'required' => 'Please enter a task before submitting',
        ],
        'task_description' => [
            'required' => 'Please describe your task submitting',
        ]

    ];

  
}