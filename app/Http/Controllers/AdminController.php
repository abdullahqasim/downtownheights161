<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Product_Category;
use App\Models\varition;
use App\Models\Measurment;
use App\Models\order;
use App\Models\Parent_category;
use App\Models\product_price;
use App\Models\color;
use App\Models\cord;
use App\Models\tilt;
use App\Models\Position;
use DB;

class AdminController extends Controller
{
    //
    public function index(){
        return view('admin.dashboard');
    }
    // Product Method
    public function add_product(){
        $category = Product_Category::all();
        $data =compact('category');
        return view('admin.add_product')->with($data);
    }
    public function list_product(){
        $product = Product::all();
        $get_c_id = Product::pluck('c_id');
        $sub_category = Product_Category::whereIn('id',$get_c_id)->get();
        $data = compact('product','sub_category');
        return view('admin.list_product')->with($data);
    }
    public function store_product(Request $request){
        $request->validate([
            'name'=>'required|string',
            'description'=>'required|string',
            // 'price'=>'required',
            'image' => 'mimes:jpg,png,jpeg,gif|max:10048',
        ]);
        $Product = new Product;
        $Product->name = $request->name;
        $Product->description = $request->description;
        // $Product->price = $request->price;
        $Product->product_type =$request->product_type;
        $Product->c_id =$request->c_id;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images'), $filename);
            $Product->image=$filename;
            }
        $Product->save();
        return back()->with('success','Add Product has been Successfully!');
    }
    public function edit_product($id){
        $product = Product::find($id);
        $category = Product_Category::all();
        $data = compact('product','category');
        return view('admin.update_product')->with($data);
    }
    public function update_product(Request $req){
        $product = Product::find($req->id);
        $product->name   =  $req->name;
        $product->c_id   =  $req->c_id;
        $product->description =     $req->description;
        $product->product_type = $req->product_type;
        if($req->file('image')){
            $file= $req->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images'), $filename);
            $product->image=$filename;
            }
        $product->update();
        return redirect('admin/list-product');
    }
    public function delete_product($id){
        $product =  Product::find($id)->delete();
        return redirect('admin/list-product');
    }
    
    // Category Method
    public function add_category(){
        $category = Parent_category::all();
        $data = compact('category');
        return view('admin.add_category')->with($data);
    }
    public function store_category(Request $request){
        $request->validate([
            'name'=>'required|string',
            'description'=>'required|string',
            'image' => 'mimes:jpg,png,jpeg,gif|max:10048',
        ]);
        $cat = new Product_Category;
        $cat->name = $request->name;
        $cat->p_cat_id = $request->p_cat_id;
        $cat->description = $request->description;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images'), $filename);
            $cat->image=$filename;
            }
        $cat->save();
        return back()->with('success','Add Category has been Successfully!');
    }
    public function list_category(){
        $category = Product_Category::all();
        $get_parent_id = Product_Category::pluck('p_cat_id');
        $Parent_category = Parent_category::whereIn('id',$get_parent_id)->get();
        $data = compact('category','Parent_category');
        return view('admin.list_category')->with($data);
    }
    public function cat_index(){
        $category = Product_Category::all();
        $data = compact('category');
        return view('admin.list_category')->with($data);
    }
    public function edit_category($id){
        $p_category = Parent_category::all();
        $category = Product_Category::find($id);
        $data = compact('category','p_category');
        return view('admin.update_category')->with($data);
    }
    public function update_category(Request $request){
        $cat =  Product_Category::find($request->id);
        $cat->name = $request->name;
        $cat->p_cat_id = $request->p_cat_id;
        $cat->description = $request->description;
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images'), $filename);
            $cat->image=$filename;
            }
            $cat->update();
        return redirect('admin/list-category');
    }
    public function delete_category($id){
        $Product_Category =  Product_Category::find($id)->delete();
        return redirect('admin/list-category');
    }
   
    // Variants Method
    function add_variants(Request $request){
        $product = Product::all();
        $data = compact('product');
        return view('admin.add_variation')->with($data);
    }
    function store_variants(Request $request){
        // dd($request->all());
        foreach($request->width as  $key =>  $data){
        $product_price = new product_price();
        $product_price->product_id = $request->product_id;
        $product_price->width =  $data;
        $product_price->height = isset($request->height[$key]) !=NULL ? $request->height[$key] : NULL;
        $product_price->price =  isset($request->price[$key]) !=NULL ? $request->price[$key] : NULL;
        $product_price->double_valance =  isset($request->double_valance[$key]) !=NULL ? $request->double_valance[$key] : NULL;
        $product_price->save();
        }
        
        $varition_json =new varition();
        $varition_json->variation = json_encode($request->except(['_token','inside','outside','product_id','title1','image1','title2','image2','images_multiple','name','cord_image','cord','tilt_image','tilt','replacement_valance','color_id','position_left','position_right']));
        $varition_json->product_id = $request->product_id;
        $varition_json->title1 = $request->title1;
        $varition_json->title2 = $request->title2;
        // $varition_json->position = $request->position;
        $varition_json->position_left = $request->position_left;
        $varition_json->position_right = $request->position_right;
        $varition_json->discount = $request->discount;
        $varition_json->shipping = $request->shipping;
        $varition_json->tax = $request->tax;
        // End
        // $v_id = varition::count();
        // $position = new Position;
        // $position->name = $request->position;
        // $position->v_id = $v_id+1;
        // $position->p_id = $request->product_id;
        // $position->save();

        if($request->file('outside')){
            $file= $request->file('outside');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images'), $filename);
            $varition_json->outside_mount=$filename;
            }

        if($request->file('inside')){
                $file= $request->file('inside');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('images'), $filename);
                $varition_json->inside_mount=$filename;
             }

        if($request->file('image1')){
                $file= $request->file('image1');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('images'), $filename);
                $varition_json->image1=$filename;
        }
        if($request->file('image2')){
                $file= $request->file('image2');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('images'), $filename);
                $varition_json->image2=$filename;
        }
        
        $varition_json->save();
// new Code
        if($request->hasfile('images_multiple')){
            foreach($request->file('images_multiple') as $key => $images){
                $image_name = $images->getClientOriginalName();
                $images->move(public_path('images'), $image_name);
                $color = new color();
                $color->color_image = $image_name;
                $color->v_id = $varition_json->id;
                $color->color_name = isset($request->name[$key]) !=NULL ? $request->name[$key] : NULL;
                $color->p_id = $request->product_id;
                $color->save();
            }
        }

        if($request->hasfile('cord_image')){
            foreach($request->file('cord_image') as $key => $images){
                $image_name = $images->getClientOriginalName();
                $images->move(public_path('images'), $image_name);
                $cord = new cord();
                $cord->cord_image = $image_name;
                $cord->v_id = $varition_json->id;
                $cord->cord_name = isset($request->cord[$key]) !=NULL ? $request->cord[$key] : NULL;
                $cord->p_id = $request->product_id;
                $cord->save();
            }
        }

        if($request->hasfile('tilt_image')){
            foreach($request->file('tilt_image') as $key => $images){
                $image_name = $images->getClientOriginalName();
                $images->move(public_path('images'), $image_name);
                $tilt = new tilt();
                $tilt->tilt_image = $image_name;
                $tilt->v_id = $varition_json->id;
                $tilt->tilt_name = isset($request->tilt[$key]) !=NULL ? $request->tilt[$key] : NULL;
                $tilt->p_id = $request->product_id;
                $tilt->save();
            }
        }
        return redirect()->back();
    }
    public function list_variants(){
        $varition = varition::all();
        $get_product_id = varition::pluck('product_id');
        $Product = Product::whereIn('id',$get_product_id)->get();
        $data = compact('varition','Product');
        return view('admin.list_variation')->with($data);
    } 
    public function edit_variants($id){
        // \Artisan::call("optimize:clear");
        $varition =  varition::find($id);
        // dd($varition->product_id);
        // dd(json_decode($varition->variation));
        $all_product =Product::all();
        $color = color::where('v_id',$id)->where('p_id',$varition->product_id)->get();
        $cord = cord::where('v_id',$id)->where('p_id',$varition->product_id)->get();
        $tilt = tilt::where('v_id',$id)->where('p_id',$varition->product_id)->get();
        $data = compact('varition','all_product','color','cord','tilt');
        return view('admin.update_variation')->with($data);
    }
    public function delete_variants($id){
        varition::find($id)->delete();
        return redirect('admin/list-variants');
    } 
    public function update_variants(Request $request){
        // dd($request->all());
        // $color_name = color::where('v_id',$request->id)->where('p_id',$request->product_id)->pluck('color_name');
        // $data = $color_name->toArray();
        // $new_color = $request->name;
        // $color_differ = array_diff($data,$new_color);
        // dd($color_differ);
        product_price::where('product_id',$request->product_id)->delete();
        if(isset($request->width)){

            foreach($request->width as  $key =>  $data){
                $product_price = new product_price();
                $product_price->product_id = $request->product_id;
                $product_price->width =  $data;
                $product_price->height = isset($request->height[$key]) !=NULL ? $request->height[$key] : NULL;
                $product_price->price =  isset($request->price[$key]) !=NULL ? $request->price[$key] : NULL;
                $product_price->double_valance =  isset($request->double_valance[$key]) !=NULL ? $request->double_valance[$key] : NULL;
                $product_price->save();
            }
        }
        
        $varition_json = varition::find($request->id);
        $varition_json->variation = json_encode($request->except(['_token','inside','outside','product_id','title1','image1','title2','image2','images_multiple','name','cord_image','cord','tilt_image','tilt','replacement_valance','color_id','position_left','position_right']));
        $varition_json->product_id = $request->product_id;
        $varition_json->title1 = $request->title1;
        $varition_json->title2 = $request->title2;
        // $varition_json->position = $request->position;
        $varition_json->position_left = $request->position_left;
        $varition_json->position_right = $request->position_right;
        $varition_json->discount = $request->discount;
        $varition_json->shipping = $request->shipping;
        $varition_json->tax = $request->tax;
        
        if ($request->has('color_id')) {
            $color_name = color::where('v_id',$request->id)->where('p_id',$request->product_id)->pluck('id');
            $data = $color_name->toArray();
            $new_color = $request->color_id;
            $color_differ = array_diff($data,$new_color);
            // dd($color_differ);
            foreach ($color_differ as  $value) {
                    $color = color:: where('id',$value)->delete();
            }

        } else {
            $color = color:: where('v_id',$request->id)->where('p_id',$request->product_id)->delete();
        }

        if ($request->has('cord_id')) {
            $cord_name = cord::where('v_id',$request->id)->where('p_id',$request->product_id)->pluck('id');
            $data = $cord_name->toArray();
            $new_cord = $request->cord_id;
            $cord_differ = array_diff($data,$new_cord);
            // dd($color_differ);
            foreach ($cord_differ as  $value) {
                    $cord = cord:: where('id',$value)->delete();
            }

        }else {
            $cord = cord:: where('v_id',$request->id)->where('p_id',$request->product_id)->delete();
        }

        if ($request->has('tilt_id')) {
            $tilt_name = tilt::where('v_id',$request->id)->where('p_id',$request->product_id)->pluck('id');
            $data = $tilt_name->toArray();
            $new_tilt = $request->tilt_id;
            $tilt_differ = array_diff($data,$new_tilt);
            // dd($tilt_name);
            foreach ($tilt_differ as  $value) {
                    $tilt = tilt:: where('id',$value)->delete();
            }

        }
        else {
            $tilt = tilt:: where('v_id',$request->id)->where('p_id',$request->product_id)->delete();
        }

        if($request->hasfile('images_multiple')){
            foreach($request->file('images_multiple') as $key=> $images){
                $image_name = $images->getClientOriginalName();
                $images->move(public_path('images'), $image_name);
                if(isset($request->color_id[$key])){
                    $color = color::find($request->color_id[$key]);
                    $color->color_image = $image_name;
                    $color->v_id = $request->id;
                    $color->color_name = isset($request->name[$key]) !=NULL ? $request->name[$key] : NULL;
                    $color->p_id = $request->product_id;
                    $color->update();
                }else{
                    $color = new color();
                    $color->color_image = $image_name;
                    $color->v_id = $request->id;
                    $color->color_name = isset($request->name[$key]) !=NULL ? $request->name[$key] : NULL;
                    $color->p_id = $request->product_id;
                    $color->save();
                }
            }
        }

        if($request->hasfile('cord_image')){
            foreach($request->file('cord_image') as $key=> $images){
                $image_name = $images->getClientOriginalName();
                $images->move(public_path('images'), $image_name);
                if(isset($request->cord_id[$key])){
                    $cord = cord::find($request->cord_id[$key]);
                    $cord->cord_image = $image_name;
                    $cord->v_id = $request->id;
                    $cord->cord_name = isset($request->cord[$key]) !=NULL ? $request->cord[$key] : NULL;
                    $cord->p_id = $request->product_id;
                    $cord->update();
                }else{
                    $cord = new cord();
                    $cord->cord_image = $image_name;
                    $cord->v_id = $request->id;
                    $cord->cord_name = isset($request->cord[$key]) !=NULL ? $request->cord[$key] : NULL;
                    $cord->p_id = $request->product_id;
                    $cord->save();
                }
            }
        }

        if($request->hasfile('tilt_image')){
            foreach($request->file('tilt_image') as $key=> $images){
                $image_name = $images->getClientOriginalName();
                $images->move(public_path('images'), $image_name);
                if(isset($request->tilt_id[$key])){
                    $cord = tilt::find($request->tilt_id[$key]);
                    $cord->tilt_image = $image_name;
                    $cord->v_id = $request->id;
                    $cord->tilt_name = isset($request->tilt[$key]) !=NULL ? $request->tilt[$key] : NULL;
                    $cord->p_id = $request->product_id;
                    $cord->update();
                }else{
                    $cord = new tilt();
                    $cord->tilt_image = $image_name;
                    $cord->v_id = $request->id;
                    $cord->tilt_name = isset($request->tilt[$key]) !=NULL ? $request->tilt[$key] : NULL;
                    $cord->p_id = $request->product_id;
                    $cord->save();
                }
            }
        }

        if($request->file('outside')){
            $file= $request->file('outside');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('images'), $filename);
            $varition_json->outside_mount=$filename;
            }

        if($request->file('inside')){
                $file= $request->file('inside');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('images'), $filename);
                $varition_json->inside_mount=$filename;
             }

        if($request->file('image1')){
                $file= $request->file('image1');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('images'), $filename);
                $varition_json->image1=$filename;
        }
        if($request->file('image2')){
                $file= $request->file('image2');
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('images'), $filename);
                $varition_json->image2=$filename;
        }
              
         $varition_json->update();
         return redirect('admin/list-variants');
    }

    // Price Method
    public function add_measurment(){
        $Product_Category = Product_Category::all();
        $data = compact('Product_Category');
        return view('admin.add_measurment')->with($data);
    }
    public function store_measurment(Request $request){
        $measurments_json = new Measurment();
        $measurments_json->measurments = json_encode($request->except(['_token','category_id']));
        $measurments_json->category_id = $request->category_id;
        $measurments_json->save();
        return redirect()->back();
    }
    public function list_measurment(){
        $measurment = Measurment::all();
        $data = compact('measurment');
        return view('admin.list_measurment')->with($data);
    }
    public function edit_measurment($id){
        $masurmenter =  Measurment::find($id);
        $Product_Category = Product_Category::all();
        $data = compact('masurmenter','Product_Category');
        return view('admin.update_measurment')->with($data);
    }
    public function update_measurment(Request $request){
        $measurments_json =  Measurment::find($request->id);
        $measurments_json->measurments = json_encode($request->except(['_token','category_id']));
        $measurments_json->category_id = $request->category_id;
        $measurments_json->update();
        return redirect('admin/list-measurment');
    }
    public function delete_measurment($id){
        $Measurmenter =  Measurment::find($id)->delete();
        return redirect('admin/list-measurment');
    } 
    
    // Order Method
    public function book_order(Request $req){
        $order = new order();
        $order->product_id = $req->product_id;
        $order->product_name = $req->product_name;
        $order->product_description = $req->product_des;
        $order->price = $req->PriceId;
        $order->width = $req->width;
        $order->hieght = $req->height;
        $order->verity = $req->verity;
        $order->width_friction = $req->width_friction;
        $order->hieght_friction = $req->hieght_friction;
        $order->mount = $req->mount;
        $order->valancestyle1 = $req->valanceStyle1;
        $order->valancestyle2 = $req->valanceStyle2;
        $order->cord = $req->cord;
        $order->tilt = $req->tilt;
        $order->personalize = $req->personalize;
        $order->room_type = $req->room_type;
        $order->window_description = $req->window_description;
        $order->save();
        return response()->json(['msg'=>'Order Booked Successfully!']); 
    }
    public function order_list(){
        $order = order::all();
        $data = compact('order');
        return view('admin.order_list')->with($data);
    }
    public function edit_order($id){
        $order =  order::find($id);
        $product_id = $order->product_id;
        $varition = varition::where('product_id',$product_id)->get();
        $measurment = Measurment::all();
        $data = compact('measurment','order','varition');
       return view('admin.update_order')->with($data);
    }
    public function update_order(Request $req){
        $order =  order::find($req->id);
        $order->product_name = $req->name;
        $order->product_description = $req->description;
        $order->price = $req->price;
        $order->width = $req->width;
        $order->hieght = $req->height;
        $order->verity = $req->verity;
        $order->update();
        return redirect('admin/list-order');
    }
    public function delete_order($id){
        $order =  order::find($id)->delete();
        return redirect('admin/list-order');
    }
    
    // Main Category Method
    public function add_main_category(){
        return view('admin.add_main_category');
    }
    public function store_main_category(Request $req){
        $Parent_category = new Parent_category();
        $Parent_category->name = $req->name;
        $Parent_category->save();

        return redirect()->back();
    }
    public function list_main_category(){
       $category = Parent_category::orderBy('id', 'DESC')->get();
       $data = compact('category');
        return view('admin.list_main_category')->with($data);
    }
    
    // Parent Category Method
    public function edit_parent_category($id){
        $category = Parent_category::find($id);
        $data = compact('category');
        return view('admin.update_main_category')->with($data);
    }
    public function delete_parent_category($id){
        $category = Parent_category::find($id)->delete();
        return redirect('admin/list-parent-category');
    }
    public function update_parent_category(Request $req){
        $category = Parent_category::find($req->id);
        $category->name = $req->name;
        $category->update();
        return redirect('admin/list-parent-category');
    }
    
    // Product Filter Method
    function filter_products(Request $req){
        $filter_data = Product::where('c_id',$req->c_id)->where('product_type',$req->filter)->get();
        $html='';
        foreach($filter_data as $data){
        $html.='
        <div class="col-md-6 col-lg-3">
        <a href="/products/'.$data->id.'">
        <div class="job-item">
            <div class="item-overlay">
                <div class="job-info">
                    <ul class="tr-list job-meta text-center">
                        <li>'.$data->description.'</li>
                    </ul>
                </div>
            </div>
            <div class="job-info">
                <div class="company-logo">
                    <img src="'.asset('images/'.$data->image.'').'" alt="images" class="img-fluid">
                </div>

                <ul class="tr-list job-meta text-center">
                    <li><h6>'.$data->name.'</h6></li>
                </ul>
            </div>
        </div>
    </div>';
       }
       return  response()->json($html);
    }

    public function get_price(Request $req){
        // dd($req->all());
        if ($req->valance == "double_valance") {
            if ($req->height == null) {
                $product_price = product_price::where('product_id',$req->product_id)->where('width',$req->width)->first();
                $price = $product_price->price + $product_price->double_valance;
                $discount_price = $price -(($price*$req->discount)/100);
            }
            else {
                $product_price = product_price::where('product_id',$req->product_id)->where('width',$req->width)->where('height',$req->height)->first();
                if($product_price == null){
                    $product_price = product_price::where('product_id',$req->product_id)->where('width',$req->width)->first();
                }
                
                $price = $product_price->price + $product_price->double_valance;
                $discount_price = $price -(($price*$req->discount)/100);
            }
            
        }
        else{
            if ($req->height == null) {
                $product_price = product_price::where('product_id',$req->product_id)->where('width',$req->width)->first();
                $price = $product_price->price;
                $discount_price = $price -(($price*$req->discount)/100);
            }
            else {
                $product_price = product_price::where('product_id',$req->product_id)->where('width',$req->width)->where('height',$req->height)->first();
                if($product_price == null){
                    $product_price = product_price::where('product_id',$req->product_id)->where('width',$req->width)->first();
                }
                $price = $product_price->price;
                $discount_price = $price -(($price*$req->discount)/100);
            }
        }
        return  response()->json([
            'price'=>$price,
            'discount_price'=>$discount_price,
        ]);
    }

    public function double_price(Request $req){
        $product_price = product_price::where('product_id',$req->product_id)->where('width',$req->width)->where('height',$req->height)->first();
        if($product_price == null){
            $product_price = product_price::where('product_id',$req->product_id)->where('width',$req->width)->first();
            $product_price->price = $product_price->price + $product_price->double_valance;
            $discount_price = $product_price->price -(($product_price->price*$req->discount)/100);
        }else{
            $product_price->price = $product_price->price + $product_price->double_valance;
            $discount_price = $product_price->price -(($product_price->price*$req->discount)/100);    
        }
        
        
        // dd($product_price);
        return  response()->json([
            'price'=>$product_price->price,
            'discount_price'=>$discount_price,
        ]);

    }
    
     public function single_price(Request $req){
        $product_price = product_price::where('product_id',$req->product_id)->where('width',$req->width)->where('height',$req->height)->first();
        // dd($product_price->price);
        if($product_price == null){
            $product_price = product_price::where('product_id',$req->product_id)->where('width',$req->width)->first();
            $price = $product_price->price;
            $discount_price = $price -(($price*$req->discount)/100);
        }else{
            $price = $product_price->price;  
            $discount_price = $price -(($price*$req->discount)/100);  
        }
        // if($req->height == null){
        //     $product_price = product_price::where('product_id',$req->product_id)->where('width',$req->width)->first();
        // }
        return  response()->json([
            'price'=>$price,
            'discount_price'=>$discount_price,
        ]);

    }
}
