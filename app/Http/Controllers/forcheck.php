function checkout(Request $request)
    {   
        // dd(auth('user')->user()); 
        $items = Cart::getContent();
        $subtotal = Cart::getSubTotal();
        
       if (request()->has('cancel')) {
             Cart::clear();
             return back()->with('success', 'Your order has been canceled successfully.');  
        } 
        if (request()->isMethod('post')) {
            request()->validate([
                'first_name' => 'required|min:3|max:20',
                'last_name' => 'nullable|min:3|max:20',
                'number' => 'required',
                'address' => 'required|min:5|max:500',
                'message' => 'nullable|max:5000',
                'payment_via' => 'required|in:cod,easypaisa',
            ],[
                'number.required' => 'The phone no field is required',
                'payment_via.in' => 'Please choose correct payment method',
            ]);
            $prod_ids = array();
            $_detail = array();
            $t_qty = 0;
            if (count($items) > 0) {
                foreach($items as $key => $value){
                    $prod_ids[] = $value->id;
                    $_detail[] = $value;
                    $t_qty = $t_qty + $value->quantity;

                    $product = Product::find($value->id);
                    // dd($value->size);
                    if ($product) {
                        if ($product->type == 'qty') {
                            if ($product->qty < $value->quantity) {
                                return back()->with('error' , $value->name." quantity is greater than to available quantity ".$product->qty);
                            }else{
                                $product->qty = $product->qty - $value->quantity;
                            }
                        }
                        $product->save();
                    }
                }
            }
            // dd($subtotal);
            $order = New Order;
            $order->user_id = auth('user')->user()->id;
            $order->product_id = implode(',',$prod_ids);
            // dd($order->product_id);
            $order->cart_detail = json_encode($_detail);
            $order->qty = $t_qty;
            $order->price = $subtotal;
            if ($request->coupon_price) {
                $order->subtotal = $subtotal - $request->coupon_price;
                $order->coupon_price = $request->coupon_price;
            }else{
                $order->subtotal = $subtotal;
            }
            $order->address = request('address');
            $order->message = request('message');
            $order->status = 'pending';
            $order->created_at = date('Y-m-d H:i:s');
            // dd($order->created_at);
            $order->save();
            Cart::clear();
            $user = User::find(auth('user')->user()->id);
            $user->name = implode(' ',[request('first_name'),request('last_name')]);
            $user->address = request('address');
            $user->number = request('number');
            $user->save();

            $data = ['name'=>"ubaid"];
            $user['to'] = 'obaidurrehman841@gmail.com';
            Mail::send('email_template',$data,function($messages) use ($user){
                $messages->to($user['to']);
                $messages->subject('Hello Dev');
            });
            return redirect('order-history')->with('success','Your order has been placed successfully.');
        }

        return view('checkout',compact('items','subtotal'));
    }