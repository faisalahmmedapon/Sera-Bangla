<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use DB;
class FrontendController extends Controller
{
    public function index(){
        $data['products'] = Product::where('status',1)->latest()->limit(15)->get();
        $data['sliders'] = Slider::where('status',1)->limit(10)->get();
        $data['categories'] = Category::where('status', 1)->get();
        return view('frontend.home',$data);
    }




    public function details($slug){
        $data['product'] = Product::where('product_name_slug',$slug)->first();

        $data['product_materials'] = DB::table('product_materials')
            ->where('product_id',$data['product']->id)
            ->join('materials','materials.id','product_materials.product_material_id')
            ->select('materials.*')
            ->get();


        $data['product_colors'] = DB::table('product_colors')
            ->where('product_id',$data['product']->id)
            ->join('colors','colors.id','product_colors.product_color_id')
            ->select('colors.*')
            ->get();



        $data['product_category'] = DB::table('product_categories')
            ->where('product_id',$data['product']->id)
            ->join('categories','categories.id','product_categories.product_category_id')
            ->select('categories.*','product_categories.product_category_id')
            ->get();


        $data['product_brand'] = Brand::where('id',$data['product']->product_brand_id)->first();

        $data['brand_products'] = Product::where('product_brand_id',$data['product_brand']->id)->latest()->paginate(12);
        $data['product_images'] =  json_decode( $data['product']->product_image);

        return view('frontend.details',$data);

    }



    public function categoryProduct($slug){
        $data['category'] = Category::where('category_name_slug',$slug)->first();
        $data['category_products'] = DB::table('product_categories')
            ->where('product_category_id',$data['category']->id)
            ->join('products','products.id','product_categories.product_id')
            ->select('products.*')
            ->orderBy('id','desc')->paginate(1);


        return view('frontend.category_product',$data);

    }
}
