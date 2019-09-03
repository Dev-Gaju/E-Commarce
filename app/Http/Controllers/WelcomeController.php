<?php

namespace App\Http\Controllers;


use App\Product;
use App\SubImage;
use DB;

class WelcomeController extends Controller
{
    public function index(){
        $productInfo=Product::where('publication_status',1)->get();
//        return $productInfo;
        return view('front.home.home-content',['productInfo'=>$productInfo]);

    }

    public function category($id){
        $products=Product::where('catrgory_id', $id /**AND 'publication_status',1**/)
            ->where('publication_status',1)->get();

        return view('front.category.category-content', ['products'=>$products]);

    }
    public function register(){
        return view('front.register.register-content');

    } public function login(){
        return view('front.login.login-content');

    }
    public function wishlist(){
        return view('front.wishlist.wishlist-content');

    }

    public function categoryDetails($id){
        $product=DB::table('products')
            ->join('categories','products.catrgory_id','=','categories.id')
            ->join('brands','products.brand_id','=','brands.id')
        ->select('products.*','categories.category_name','brands.brand_name')
        ->where('products.id',$id)
        ->first();
//      dd($product);
        $subImages=SubImage::where('product_id',$id)->get();
        $latestProducts=Product::where('publication_status',1)->orderBy('id','desc')->take(5)->get();
        $categoryProducts=Product::where('catrgory_id',$product->catrgory_id)->orderBY('id','desc')->take(6)->get();
        return view('front.category.details.details-content',
           [
               'product'=>$product,
               'subImages'=>$subImages,
               'latestProducts'=>$latestProducts,
               'categoryProducts'=>$categoryProducts

            ]);

    }
    public function blog(){
        return view('front.blog.blog-content');
    }
    public function blogs_single(){
        return view('front.blog.blog_single.blog-single-content');

    }
}
