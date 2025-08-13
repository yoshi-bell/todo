<?php

namespace App\Http\Controllers;


use App\Http\Requests\TodoRequest;
use App\Models\Category;
use App\Models\Todo;
use CreateCategoriesTable;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::with('Category')->get();
        $categories = Category::all();
        return view('index', compact('todos','categories'));
    }
    public function store(TodoRequest $request)
    {
        $todo = $request->only(['content','category_id']);
        Todo::create($todo);

        return redirect('/')->with('message', 'Todoを作成しました');
    }
    public function update(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        Todo::find($request->id)->update($todo);
        return redirect('/')->with('message', 'Todoを更新しました');
    }
    public function destroy(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/')->with('message', 'Todoを削除しました');
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function search(Request $request)
    {
        $todos = Todo::with('category')->CategorySearch($request->category_id)->KeywordSearch($request->keyword)->get();
        $categories = Category::all();
        return view('index',compact('todos','categories'));
    }

}