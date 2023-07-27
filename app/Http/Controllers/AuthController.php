<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Product_Category;
use App\Models\varition;
use App\Models\Measurment;
use App\Models\Parent_category;
use App\Models\color;
use App\Models\cord;
use App\Models\tilt;
use App\Models\order;
use App\Models\OrderDetail;
use App\Models\Payment;
use Omnipay\Omnipay;

class AuthController extends Controller
{
    // ===================== Register Auth Code =============================

    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function register(){
        return view('register');
    }
    public function cat_index(){
        $main_cat = Parent_category::orderBy('id','desc')->take(6)->get();
        $main_cat_id = Parent_category::pluck('id');
        $category = Product_Category::whereIn('p_cat_id',$main_cat_id)->get();
        $data = compact('category','main_cat');
        return view('index')->with($data);
    }
    public function product_data($id){
        $product = Product::find($id);
         $varition = varition::where('product_id',$id)->get();
         $v_id = varition::where('product_id',$id)->first();
        //  dd($v_id->id);
         $main_veriat_id = varition::pluck('id');
        $color = color::where('v_id',$v_id->id)->where('p_id',$product->id)->get();
        $cord = cord::where('v_id',$v_id->id)->where('p_id',$product->id)->get();
        $tilt = tilt::where('v_id',$v_id->id)->where('p_id',$product->id)->get();

         $measurment = Measurment::all();

         $main_cat = Parent_category::orderBy('id','desc')->take(6)->get();
         $main_cat_id = Parent_category::pluck('id');

         $category = Product_Category::whereIn('p_cat_id',$main_cat_id)->get();


        //  $category = Product_Category::all();
         // dd($varition);
        $data = compact('category','product','varition','measurment','main_cat','color','cord','tilt','v_id');
        return view('product_data')->with($data);
    }


    public function register_store(Request $request){
        $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users',
            'password'=>'required|string|confirmed',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success','Your Registration has been Successfully!');
    }

    // ===================== Login Auth Code =============================
    public function login(){
        return view('login');
    }

    public function login_store(Request $request){
        $request->validate([

            'email'=>'required|string',
            'password'=>'required|string',
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('dashboard');
        }else{
            return back()->with('error','Email && Password is Incorrect Plz Try Again!');
        }
    }

    public function dashboard(){
            return redirect('admin/dashboard');
    }

// ===================== User Logout Code =============================
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    function product_detail($id){
        // show product
        $product =  Product::where('c_id',$id)->get();
        // cat image desc
        $category = Product_Category::find($id);
        // for menu
        $main_cat = Parent_category::orderBy('id','desc')->take(6)->get();
        $main_cat_id = Parent_category::pluck('id');
        $category_all = Product_Category::whereIn('p_cat_id',$main_cat_id)->get();

        // $category_all = Product_Category::all();
        $data = compact('category_all','category','product','main_cat');
        return view('product_detail')->with($data);
    }

    function land_categories(Request $req){

        $html='';
        $category = Product_Category::all();

        foreach($category as $category){
          $html.=' <a href="/product-detail" id="category_id" data-category_description="'.$category->description.'" data-category_image="'.$category->image.'"     class="nav-item nav-link" style="color: #db5151;">'.$category->name.'</a>' ;

        }
        return  response()->json($html);
    }

    public function cart()
    {
        // $cart = session()->get('cart', []);
        // dd($cart);
        return view('cart');
    }

     public function addToCart(Request $req)
    {
        // dd($req->all());
        $product = Product::findOrFail($req->product_id);
        // dd($product);
        $cart = session()->get('cart', []);
 
        if(isset($cart[$req->product_id])) {
            $cart[$req->product_id]['quantity']++;
        }  else {
            $cart[$req->product_id] = [
                "product_id" => $product->id,
                "product_name" => $product->name,
                "photo" => $product->image,
                "price" => $req->PriceId,
                "product_description" => $req->product_des,
                "verity" => $req->verity,
                "width" => $req->width,
                "discount" => $req->discount,
                "height" => $req->height,
                "mount" => $req->mount,
                "valanceStyle1" => $req->valanceStyle1,
                "valanceStyle2" => $req->valanceStyle2,
                "controlleftPosition" => $req->controlleftPosition,
                "controlrightPosition" => $req->controlrightPosition,
                "cord" => $req->cord,
                "tilt" => $req->tilt,
                "personalize" => $req->personalize,
                "room_type" => $req->room_type,
                "window_description" => $req->window_description,
                "quantity" => 1
            ];
        }
 
        session()->put('cart', $cart);
        $product = Product::findOrFail($req->product_id);
        $items = session()->get('cart', []);
        $total = 0;
            if (count($items) > 0) {
                foreach ($items as $key => $value) {
                    $total += (int)$value['price'] * $value['quantity'];
                }
            }
        return response()->json([
            'msg' => 'Product add to cart successfully',
            'name' => $product->name,
            'desc' => $req->product_des,
            'photo' => $product->image,
            'qty' => 1,
            'price'=> $req->PriceId,
            'discount'=> $req->discount,
            'subtotal' => $total,
        ]);
        // return response()->json(['msg'=>'Product add to cart successfully!']); 
        // return redirect()->back()->with('success', 'Product add to cart successfully!');
    }

   public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart successfully updated!');
        }
    }
 
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully removed!');
        }
    }

    public function checkout(Request $request){

        $items = session()->get('cart', []);
        if (request()->isMethod('post')) {
            request()->validate([
                'email' => 'required',
                'first_name' => 'required|min:3',
                'last_name' => 'required|min:3',
                'address' => 'required',
                'zipcode' => 'required',
                'number' => 'required',
                'city' => 'required',
                'state' => 'required',
            ],[
                'number.required' => 'The phone no field is required',
            ]);
            $total = 0;
            if (count($items) > 0) {
                foreach ($items as $key => $value) {
                    $total += $value['price'] * $value['quantity'];
                    $order_detail_id = OrderDetail::count();
                    $order = new order;
                    $order->order_detail_id = $order_detail_id+1;
                    $order->product_id = $value['product_id'];
                    $order->product_name = $value['product_name'];
                    $order->price = $value['price'];
                    $order->product_description = $value['product_description'];
                    $order->verity = $value['verity'];
                    $order->width = $value['width'];
                    $order->hieght = $value['height'];
                    $order->mount = $value['mount'];
                    $order->valanceStyle1 = $value['valanceStyle1'];
                    $order->valanceStyle2 = $value['valanceStyle2'];
                    $order->cord = $value['cord'];
                    $order->tilt = $value['tilt'];
                    $order->personalize = $value['personalize'];
                    $order->room_type = $value['room_type'];
                    $order->window_description = $value['window_description'];
                    // $order->quantity = $value['quantity'];
                    $order->save();

                    Session::forget('cart');
                }

                $order_detail = new OrderDetail;
                $order_detail->email= $request->email;
                $order_detail->firstname= $request->first_name;
                $order_detail->lastname= $request->last_name;
                $order_detail->address= $request->address;
                $order_detail->zipcode= $request->zipcode;
                $order_detail->state= $request->state;
                $order_detail->city= $request->city;
                $order_detail->phone= $request->number;
                $order_detail->notes= $request->message;
                $order_detail->total_price= $total;
                $msg = ['success','Your Order has been successfully placed'];
                $order_detail->save();

                try {
                    $response = $this->gateway->purchase(array(
                        'amount' => $total,
                        'currency' => env('PAYPAL_CURRENCY'),
                        'returnUrl' => url('success'),
                        'cancelUrl' => url('error')
                    ))->send();

                    if ($response->isRedirect()) {
                        $response->redirect();
                    }
                    else{
                        return $response->getMessage();
                    }

                } catch (\Throwable $th) {
                    return $th->getMessage();
                }


                 return back()->with($msg);
            }else {
                return back()->with(['error'=> 'First shopping something']);
            }
        }
        return view ('checkout');
    }

        public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];

                $payment->save();
                return redirect('/')->with("success","Payment is Successfull. Your Transaction Id is :".$arr['id']);
                // return "Payment is Successfull. Your Transaction Id is : " . $arr['id'];

            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return 'Payment declined!!';
        }
    }

    public function error()
    {
        return 'User declined the payment!';   
    }

}
