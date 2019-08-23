<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function  addCategory(){
        return view('admin.category.add-category');
    }
    public function addNewCategory(Request $request){

        $category=new Category();

        $category->category_name=$request->category_name;
        $category->category_description=$request->category_description;
        $category->publication_status =$request->publication_status;
        $category->save();

        return redirect('/category/add-category')->with('message','Save Category Info Successfully');

    }
    public function manageCategory(){
        $manageCategory=Category::orderBy('id','desc')->get();
        return view('admin.category.manage-category',['manageCategory'=>$manageCategory]);
    }
    public function editCategory($data){
        $categoryInfo=Category::find($data);
        return view('admin.category.edit-category',['categoryInfo'=>$categoryInfo]);
    }

    public function Updateategory(Request $request){
        $UpdateById=Category::find($request->category_id);
        $UpdateById->category_name=$request->category_name;
        $UpdateById->category_description=$request->category_description;
        $UpdateById->publication_status=$request->publication_status;
        $UpdateById->update();

        return redirect('/category/manage-category')->with('message','Category Info Update Successfully');

    }
    public function deleteCategory($data){
        $deleteById=Category::find($data);
        $deleteById->delete();
        return redirect('/category/manage-category')->with('message','Delete Info Successfully');

    }
}
