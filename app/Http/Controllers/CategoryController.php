<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(5);
        return view('pages.category.index',compact('categories'));
    }
    public function add(){
        return view('pages.category.add');
    }
    public function create(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'price'=>['required','numeric',]
        ]);
        Category::create([
            'name'=>$request->name,
            'price'=>$request->price
        ]);
        return redirect()->route('categoryIndex');

    }
    public function edit($id){
        $category = Category::find($id);
        return view('pages.category.edit',compact('category'));
    }
    public function update(Request $request,$id){
        $this->validate($request,[
            'name'=>['required','unique:categories,name,'.$id],
            'price'=>['required','numeric',]
        ]);
        $category = Category::find($id);
        $category->name = $request->name;
        $category->price = $request->price;
        $category->save();
        return redirect()->route('categoryIndex')->with('success','Katgorya tahrirlandi');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->back()->with('success', 'Kategorya O\'chirildi');
    }
}
