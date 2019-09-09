<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function  AddCategory(){
        return view('admin.category.add-category');
    }
    public function addNewCategory(Request $request){

        $category=new Category();

        $category->category_name=$request->category_name;
        $category->category_description=$request->category_description;
        $category->publication_status =$request->publication_status;
        $category->save();

        return redirect('/categori/add-categori')->with('message','Save Category Info Successfully');

    }
    public function ManageCategory(){
        $manageCategory=Category::orderBy('id','desc')->get();
        return view('admin.category.manage-category',['manageCategory'=>$manageCategory]);
    }

    public function editCategory($id){
        $category_info=Category::find($id);
        return view('admin.category.edited-category',['category_info'=>$category_info]);
    }

    public function UpdatCeategory(Request $request){
        $UpdateById=Category::find($request->category_id);
        $UpdateById->category_name=$request->category_name;
        $UpdateById->category_description=$request->category_description;
        $UpdateById->publication_status=$request->publication_status;
        $UpdateById->update();

        return redirect('/categori/manage-categori')->with('message','Category Info Update Successfully');

    }
    public function deleteCategory(Request $request){
        $deleteById=Category::find($request->category_id);
        $deleteById->delete();
        return redirect('/categori/manage-categori')->with('message','Delete Info Successfully');

    }
    public function unpublishedCategory($id){
        $publication_status=Category::find($id);
        $publication_status->publication_status=0;
        $publication_status->save();
        return redirect('/categori/manage-categori')->with('message','Unpublished Info Successfully');


    }
    public function publishedCategory($id){
        $publication_status=Category::find($id);
        $publication_status->publication_status=1;
        $publication_status->save();
        return redirect('/categori/manage-categori')->with('message','Published Info Successfully');

    }
}
