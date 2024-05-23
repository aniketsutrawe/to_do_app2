<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    function home(){
        return view('home');
    }

    function addtask(){
        $task = "";
        $url = url('/addtask');
        $title = "Add New Task Here";
        $data = compact('url', 'title', 'task');
        return view('addtask')->with($data);
    }

    function compleatedTasks(){
        $tasks = Tasks::onlyTrashed()->get();
        $data = compact('tasks');
        return view('compleated-tasks')->with($data);
    }
}
