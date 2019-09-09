<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function addBrand(){
        return view('admin.brand.add-brand');
    }
    public function addNewBrand(Request $request){
        $brandInfo=new Brand();
        $brandInfo->brand_name=$request->brand_name;
        $brandInfo->brand_description=$request->brand_description;
        $brandInfo->publication_status=$request->publication_status;
        $brandInfo->save();
        return redirect('/brand/add-brand')->with('message', 'Brand Info Saved');

    }
    public function manageBrand(){
       $manageBrand=Brand::all();
      return view('admin.brand.manage-brand',['manageBrand'=>$manageBrand]);
}
 public function EditBrand($data){
        $BrabdInfo=Brand::find($data);
        return view('admin.brand.edit-brand',['BrabdInfo'=>$BrabdInfo]);
 }
 public function updateBrand(Request $request){

     $brandupdate=Brand::find($request->brand_id);
     $brandupdate->brand_name=$request->brand_name;
     $brandupdate->brand_description=$request->brand_description;
     $brandupdate->publication_status=$request->publication_status;
     $brandupdate->update();
     return redirect('/brand/manage-brand')->with('message','Brand Info updated');
 }
 public function deleteBrand(Request $request)
 {
     $deleteBrand=Brand::find($request->brand_id);
    $deleteBrand->delete();
    return redirect('/brand/manage-brand');


 }

 public function unpublishedBrand($id){
        $brandStatus=Brand::find($id);
     $brandStatus->publication_status=0;
     $brandStatus->save();
     return redirect('brand/manage-brand')->with('message','Deleted Info Carefully');


 }
 public function publishedBrand($id){
     $brandStatus=Brand::find($id);
     $brandStatus->publication_status=1;
     $brandStatus->save();
     return redirect('brand/manage-brand')->with('message','Deleted Info Carefully');
 }
}
