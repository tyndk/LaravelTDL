<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;
use App\Models\Reviews;

class MainController extends Controller
{
    public function index(){
        return view('index');
    }

    public function about(){
        return view('about');
    }

    public function tasks(){    
        $tasks = new Tasks();
        return view('tasks', ['task' => $tasks->all()]);
        //dd($notes->all());
    }

    public function tasks_check(Request $request){
        //dd($request);
        $valid = $request->validate([
            'task'=>'required|min:3|max:100',
        ]);

        $task = new Tasks();
        $task->title = $request->input('task');

        $task->save();

        return redirect()->route('tasks');
    }

    public function tasks_delete($id){
        //dd($request);

        $task = Tasks::find($id);
        $task->delete();

        return redirect()->route('tasks');
    }

    public function tasks_edit($id, Request $request){
        // $valid = $request->validate([
        //     'task'=>'required|min:3|max:100',
        // ]);

        $task = Tasks::find($id);
        $task->title = $request->input('task_editInput');//all();
        $task->save();
        
        //return response()->json(['success' => true]);
        return redirect()->route('tasks'); 
    }


    public function review(){    
        $reviews = new Reviews();
        return view('review', ['review' => $reviews->all()]);
        //dd($notes->all());
    }

    public function review_check(Request $request){
        //dd($request);
        $valid = $request->validate([
            'email'=>'required|min:3|max:100',
            'score'=>'required',
            'caption'=>'required|min:3|max:255',
        ]);
        
        $review = new Reviews();
        $review->email = $request->input('email');
        $review->score = $request->input('score');
        $review->caption = $request->input('caption');
        $review->save();

        return redirect()->route('review')->with('message', "Комментарий добавлен");
    }

    public function review_delete($id){
        //dd($request);

        $review = Reviews::find($id);
        $review->delete();

        return redirect()->route('review')->with('message', 'Комментарий удален');
    }

    public function review_page($id){
        $review = new Reviews();// Reviews::find($id);

        return view('review-page', ['data' => $review->find($id)]);
    }

    public function review_edit($id, Request $request){
        $valid = $request->validate([
            'caption'=>'required|min:3|max:255',
            'score'=>'required',
        ]);

        $review = Reviews::find($id);
        $review->score = $request->input('score');
        $review->caption = $request->input('caption');//all();
        $review->save();
        
        //return response()->json(['success' => true]);
        return redirect()->route('review')->with('message', 'Комментарий обновлен');
    }
}
