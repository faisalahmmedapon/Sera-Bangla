<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Coupon;
use App\Models\Material;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductMaterial;
use Illuminate\Http\Request;

use DB;
use Hash;
use Intervention\Image\Facades\Image;
use Session;
use Validator;
use Str;


class ProductController extends Controller
{
    public function index(){
        $data['products'] = Product::all();
        return view('backend.product.index',$data);
    }
    public function create(){
        $data['coupons'] = Coupon::all();
        $data['brands'] = Brand::all();
        $data['colors'] = Color::all();
        $data['materials'] = Material::all();
        $data['categories'] = Category::all();
        return view('backend.product.create',$data);
    }

    public function store(Request $request){


        $validator = Validator::make($request->all(), [
            //'product_name' => 'required|unique:products',
            'product_name' => 'required',
            'product_quantity' => 'required',
            'product_sku' => 'required',
            'product_selling_price' => 'required',
            'product_discount_type' => 'required',
            'product_discount' => 'required',
            'product_discount_price' => 'required',
//            'product_brand' => 'required',
            'product_category' => 'required',
//            'product_color' => 'required',
//            'product_material' => 'required',
            'product_image' => 'required',
            'product_image.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'product_short_description' => 'required',
            'product_description' => 'required',
            'product_specification' => 'required',

        ]);

        if ($validator->fails()) {
            $notification = array(
                'message' => 'Opps! Something went wrong .Please Try Again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->withErrors($validator)->withInput()->with($notification);

        }else {

            $product = new Product();
            $product->product_name = $request->product_name;
            $product->product_name_slug = Str::slug($request->product_name);
            $product->product_quantity = $request->product_quantity;
            $product->product_sku = $request->product_sku;
            $product->product_selling_price = $request->product_selling_price;
            $product->product_discount_type = $request->product_discount_type;
            $product->product_discount = $request->product_discount;
            $product->product_discount_price = $request->product_discount_price;
            $product->product_brand_id = $request->product_brand;
            $product->product_short_description = $request->product_short_description;
            $product->product_description = $request->product_description;
            $product->product_specification = $request->product_specification;
            if($request->hasfile('product_image'))
            {
                foreach($request->file('product_image') as $image)
                {
                    $product_image = $image;
                    $extension = $product_image->getClientOriginalExtension();
                    $product_name = "product_" . time() . "." . $extension;
                    Image::make($product_image)->resize(1920, 1500)->save(public_path().'/uploads/product/'.$product_name);
//                    $image->move(public_path('uploads/product/'), $product_name);
                    $data[] = 'uploads/product/'.$product_name;
                }
            }
            $product->product_image = json_encode($data);
            $product->status = 1;
            $product->save();


            //Product category
            $product_categories = $request->product_category;
            if (!empty($product_categories)) {
                foreach ($product_categories as $product_category) {
                    $productCategory = new ProductCategory();
                    $productCategory->product_id = $product->id;
                    $productCategory->product_category_id = $product_category;
                    $productCategory->save();
                }
            }

            //Product category
            $product_colors = $request->product_color;
            if (!empty($product_colors)) {
                foreach ($product_colors as $product_color) {
                    $productColor = new ProductColor();
                    $productColor->product_id = $product->id;
                    $productColor->product_color_id = $product_color;
                    $productColor->save();
                }
            }

            //Product material
            $product_materials = $request->product_material;
            if (!empty($product_materials)) {
                foreach ($product_materials as $product_material) {
                    $productMaterial = new ProductMaterial();
                    $productMaterial->product_id = $product->id;
                    $productMaterial->product_material_id = $product_material;
                    $productMaterial->save();
                }
            }




            $notification = array(
                'message' => 'New Product publish Successfully',
                'alert-type' => 'success'
            );
            return redirect('/products')->withErrors($validator)->withInput()->with($notification);

        }


    }




    public function details($id){

        $data['product'] = Product::where('id',$id)->first();
        //$data['product_material'] = ProductMaterial::where('product_id',$id)->get();

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


//        $data['product_category'] = ProductCategory::where('product_id',$id)->get();

        $data['product_category'] = DB::table('product_categories')
            ->where('product_id',$data['product']->id)
            ->join('categories','categories.id','product_categories.product_category_id')
            ->select('categories.*')
            ->first();

        $data['product_brand'] = Brand::where('id',$data['product']->product_brand_id)->first();
        $data['product_images'] =  json_decode( $data['product']->product_image);


        //return  $data['product_materials'];


        return view('backend.product.details',$data);

    }




    public function edit($id){

        $data['product'] = Product::findOrFail($id);
        $data['coupons'] = Coupon::all();
        $data['brands'] = Brand::all();
        $data['colors'] = Color::all();
        $data['product_colors'] = ProductColor::select('product_color_id')->where('product_id',$id)->get()->toArray();
        $data['materials'] = Material::all();
        $data['product_materials'] = ProductMaterial::select('product_material_id')->where('product_id',$id)->get()->toArray();

        $data['categories'] = Category::all();
        $data['product_categories'] = ProductCategory::select('product_category_id')->where('product_id',$id)->get()->toArray();
//        return  $data['product_colors'];
//        return $data;
        return view('backend.product.edit',$data);
    }


    public function update(Request $request,$id){

        $product = Product::findOrFail($id);
        $product->product_name = $request->product_name;
        $product->product_name_slug = Str::slug($request->product_name);
        $product->product_quantity = $request->product_quantity;
        $product->product_sku = $request->product_sku;
        $product->product_selling_price = $request->product_selling_price;
        $product->product_discount_type = $request->product_discount_type;
        $product->product_discount = $request->product_discount;
        $product->product_discount_price = $request->product_discount_price;
        $product->product_brand_id = $request->product_brand;
        $product->product_short_description = $request->product_short_description;
        $product->product_description = $request->product_description;
        $product->product_specification = $request->product_specification;

        $product_images =  $request->hasfile('product_image');
        if($product_images)
        {
            $get_product_images = json_decode($product->product_image);
            foreach ($get_product_images as $get_product_image){
                if (file_exists($get_product_image)) {
                    @unlink($get_product_image);
                }
            }

            foreach($request->file('product_image') as $image)
            {
                $product_image = $image;
                $extension = $product_image->getClientOriginalExtension();
                $product_name = "product_" . time() . "." . $extension;
                Image::make($product_image)->resize(1920, 1500)->save(public_path().'/uploads/product/'.$product_name);
//                    $image->move(public_path('uploads/product/'), $product_name);

                $data[] = 'uploads/product/'.$product_name;
            }
            $product->product_image = json_encode($data);
        }
        $product->status = 1;
        $product->save();


        //Product category
        $product_categories = $request->product_category;
        if (!empty($product_categories)) {
            $product_category_delete = ProductCategory::where('product_id', $id)->delete();

            foreach ($product_categories as $product_category) {
                $productCategory = new ProductCategory();
                $productCategory->product_id = $product->id;
                $productCategory->product_category_id = $product_category;
                $productCategory->save();
            }
        }else{
            return  'Data not found';
        }

        //Product category
        $product_colors = $request->product_color;
        if (!empty($product_colors)) {
            $product_color_delete = ProductColor::where('product_id', $id)->delete();

            foreach ($product_colors as $product_color) {
                $productColor = new ProductColor();
                $productColor->product_id = $product->id;
                $productColor->product_color_id = $product_color;
                $productColor->save();
            }
        }else{
            return  'Data not found';
        }

        //Product material
        $product_materials = $request->product_material;
        if (!empty($product_materials)) {
            $product_material_delete = ProductMaterial::where('product_id', $id)->delete();

            foreach ($product_materials as $product_material) {
                $productMaterial = new ProductMaterial();
                $productMaterial->product_id = $product->id;
                $productMaterial->product_material_id = $product_material;
                $productMaterial->save();
            }
        }else{
            return  'Data not found';
        }




        $notification = array(
            'message' => 'New  Update Successfully',
            'alert-type' => 'success'
        );
        return redirect('/products')->with($notification);

    }





    public function status($id){
        $product = Product::findOrFail($id);
        if ($product->status == 1) {
            $product->status = 0;
        } else {
            $product->status = 1;
        }
        $product->save();

        $notification = array(
            'message' => 'The Product status update successfully',
            'alert-type' => 'success'
        );

        return redirect('/products')->with($notification);
    }
    public function delete($id){

        $product = Product::findOrFail($id);
        $product_material = DB::table('product_materials')
            ->where('product_id',$product->id)->delete();

        $product_category = DB::table('product_categories')
            ->where('product_id',$product->id)->delete();

        $product_color = DB::table('product_colors')
            ->where('product_id',$product->id)->delete();

//
//        $product_category = ProductCategory::where('product_id',$product->id)->get();
//        $product_color = ProductColor::where('product_id',$product->id)->get();

        $get_product_images = json_decode($product->product_image);
        foreach ($get_product_images as $get_product_image){
            if (file_exists($get_product_image)) {
                @unlink($get_product_image);
            }

        }

        $product->delete();

        $notification = array(
            'message' => 'The Product delete successfully',
            'alert-type' => 'success'
        );

        return redirect('/products')->with($notification);

    }



}
