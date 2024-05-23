<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tasks;

use function PHPUnit\Framework\isNull;

class DatabaseController extends Controller
{
    function addtask(Request $request){

        $request->validate(
            [
                'taskheading' => 'required',
                'taskdescription' => 'required'
            ]
            );


        return view('home');
    }

    function index(){
        $tasks = Tasks::all();
        $data = compact('tasks');
        return view('home')->with($data);
    }

    function store(Request $request) {
        $tasks = new Tasks;
        $tasks-> heading = $request['taskheading'];
        $tasks-> discription = $request['taskdescription'];
        $tasks-> save();
        return redirect ('/');
    }

    function delete($id){                           //Soft Delete i.e. Compleated tasks
        $task = Tasks::find($id);
        if(!is_null($id)){
            $task->delete();
        }

        return redirect('/');
    }

    function restore($id){                                  //Restoring soft deleated tasks i.e. compleated tasks moving to pending tasks.
        $task = Tasks::withTrashed()->find($id);
        if(!is_null($id)){
            $task->restore();
        }
        return redirect('/compleatedTasks');
    }


    function permanentDelete($id){                          //Deleating tasks prmanantly cannot be restored
        $task = Tasks::withTrashed()->find($id);
        if(!is_null($id)){
            $task->forceDelete();
        }
        return redirect()->back();
    }

    function edit($id) {
        $task = Tasks::find($id);
        if(!is_null($id)){
            $title = "Update '".$task->heading."' Task Here";
            $url = url('/update').'/'.$id;
            $data = compact('task','url', "title");
            return view('addtask')->with($data);
        }

    }

    function update($id,Request $request){
        $task = Tasks::find($id);
        $task-> heading = $request['taskheading'];
        $task-> discription = $request['taskdescription'];
        $task->save();
        return redirect ('/');
    }

    function search(Request $request){
        $search = $request["search"]?? "";
        if($search != "")
        {
            $tasks = Tasks::withTrashed()
            ->where(function ($query) use ($search) {
                $query->where('heading', 'LIKE', "%$search%")
                      ->orWhereDate('updated_at',"LIKE", "%$search%");
            })
            ->get();        }
        else{
            $tasks = [];
        }


        $data = compact('tasks', 'search');
        return view('search')->with($data);
    }
}
