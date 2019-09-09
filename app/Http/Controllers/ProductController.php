<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use App\SubImage;
use Illuminate\Http\Request;
use Image;
use DB;
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
  public function addProdct(){
      $publishedBrands= Brand::where('publication_status',1)->get();
      $publishedCategories= Category::where('publication_status',1)->get();
      return view('admin.product.add-product',[
          'publishedBrands' =>$publishedBrands,
          'publishedCategories'=>$publishedCategories

          ]);
  }
   public function saveProductInfo(Request $request){

      $productImage=$request->file('main_image');
      $imagename=$productImage->getClientOriginalName();
      $directory=('product-Image/');
       $imageUrl=$directory.$imagename;
      Image::make($productImage)->save($imageUrl);
//       return $imageUrl;
       //      $productImage->move($directory,$imagename);







       $productInfo=new Product();
       $productInfo->product_name= $request->product_name;
       $productInfo->catrgory_id= $request->category_id;
       $productInfo->brand_id=$request->brand_id;
       $productInfo->product_price=$request->product_price;
       $productInfo->product_quantity=$request->product_quantity;
       $productInfo->short_description=$request->short_description;
       $productInfo->long_description=$request->long_description;
       $productInfo->main_image=$imageUrl;
       $productInfo->publication_status=$request->publication_status;
       $productInfo->save();
       $productId=$productInfo->id;



       $SubImages=$request->file('sub_image');
       foreach ($SubImages as $SubImage){
           $Subimagename=$SubImage->getClientOriginalName();
           $Sub_directory=('sub-Image/');
           $SubImageUrl=$Sub_directory.$Subimagename;
           Image::make($SubImage)->save($SubImageUrl);

           $subImageInfo=new SubImage();
           $subImageInfo->product_id=$productId;
           $subImageInfo->sub_image=$SubImageUrl;
           $subImageInfo->save();
       }
return redirect('/product/add-product')->with('message','Save Product Info Sucessfully');

   }
   public function ManageProductInfo(){
       $productInfo=DB::table('products')
          ->join('categories','products.catrgory_id','=','categories.id')
          ->join('brands','products.brand_id','=','brands.id')
          ->select('products.id','products.product_name',
              'products.product_price','products.product_quantity',
              'products.short_description','products.long_description',
              'products.publication_status','products.main_image','categories.category_name','brands.brand_name')
           ->get();


//      $productInfo=Product::orderBy('id','desc')->get();
      return view('admin.product.manage-product',['productInfo'=>$productInfo]);
   }

   public function editProductInfo($data){

      $productInfo=Product::find($data);
      return view('admin.product.edit-product',['productInfo'=>$productInfo]);
   }

    public function updateProductInfo(Request $request){
       $updateInfo=Product::find($request->product_id);
        $updateInfo->product_name=$request->product_name;
        $updateInfo->product_price=$request->product_price;
        $updateInfo->product_quantity=$request->product_quantity;
        $updateInfo->short_description=$request->short_description;
        $updateInfo->long_description=$request->long_description;
        $updateInfo->publication_status=$request->publication_status;

        if ($request->hasFile('main_image')){
            $image_path = public_path().'/'.$updateInfo->main_image;
            if(File::exists($image_path)){
                unlink($image_path);
            }
            $productImage=$request->file('main_image');
            $imagename=$productImage->getClientOriginalName();
            $directory=('product-Image/');
            $imageUrl=$directory.$imagename;
            Image::make($productImage)->save($imageUrl);
            $updateInfo->main_image=$imageUrl;
        }

//   delete proccess for updating Image
//        $image = explode(",", $updateInfo->sub_image);
//        foreach ($image as $images) {
//            Storage::delete("uploaded-images/{$image}");
//        }

        $updateInfo->update();
        return redirect('/product/manage-product')->with('message','Updated Info Successfully');

    }
    public function viewProductInfo(){
      return view('admin.product.view-info');
    }
    public function publishedProduct($id){
      $publication_status=Product::find($id);
        $publication_status->publication_status=1;
        $publication_status->save();
        return redirect('/product/manage-product')->with('message','Published Successfully');


    }
    public function unpublishedProduct ($id){
        $publication_status=Product::find($id);
        $publication_status->publication_status=0;
        $publication_status->save();
        return redirect('/product/manage-product')->with('message','Unpublished Successfully');

    }
    public function deleteProduct(Request $request){
      $product=Product::find($request->product_id);

        $image_path = public_path().'/'.$product->main_image;
        unlink($image_path);
        $product->delete();

        $subImages=SubImage::where('product_id','=',$product->id)->get();
        foreach ($subImages as $subImage) {
            $image_path =public_path().'/'.$subImage->sub_image;
            unlink($image_path);
            $subImage->delete();
        }


        return redirect('/product/manage-product')->with('message','Delete Successfully');
    }
}
