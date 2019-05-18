<?php

namespace App\Http\Controllers;

use Auth;
use App\Cart;
use App\Order;
use App\Product;
use App\Review;
use App\Settings;
use App\Wishlist;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserProfileController extends Controller
{

 /**
     *
     * Bind Order model
     *
     */
    protected $order;

    /**
     *
     * Bind Wishlist Model
     *
     */
    protected $wishlist;
    
    /**
     * Constructor For Controller
     * 
     * @param Wishlist $wishlist
     */
   
    public function __construct(Wishlist $wishlist, Order $order)
    {
        $this->middleware('auth:profile',['except' => 'checkout','cashondelivery']);
        $this->middleware('web');
        $this->middleware('auth:profile');
        $this->wishlist = $wishlist;
        $this->order = $order;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         #Get the User
        $user = Auth::user();

        # Get the User Id
        $userId = Auth::user()->id;

         # Get the Orders of User
         $orders = $this->order
                        ->where('customerid', $userId)
                        ->orderBy('id','desc')
                        ->take(15)
                        ->get();

        # Get the user Wishlist
        $wishlists = $this->wishlist->with('product')->where('user_id', $userId)->get();

        $user = UserProfile::find(Auth::user()->id);
        $orders = Order::where('customerid', Auth::user()->id)->orderBy('id','desc')->take(15)->get();
        return view('account',compact('user','orders', 'wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    //Submit Review
    public function checkout()
    {
        $this->middleware('auth');
        # Get the Authenticated User
        $user = Auth::user();

        # Check wheather User is Log In or Not
        if (Auth::check()) {
            // The user is logged in...
            return view('address')->withUser($user);
        } else {
            dd(12);
        }
           /* $product = 0;
            $quantity = 0;
            $sizes = 0;
            $settings = Settings::findOrFail(1);
            $carts = Cart::where('uniqueid',Session::get('uniqueid'));
            $cartdata = $carts->get();
            if($carts->count() > 0){
                $total = $carts->sum('cost') + $settings->shipping_cost;
                foreach ($carts->get() as $cart){
                    if ($product==0 && $quantity==0){
                        $product = $cart->product;
                        $quantity = $cart->quantity;
                        $sizes = $cart->size;
                    }else{
                        $product = $product.",".$cart->product;
                        $quantity = $quantity.",".$cart->quantity;
                        $sizes = $sizes.",".$cart->size;
                    }
                }
                return view('checkout',compact('product','sizes','quantity','total','cartdata','user'));
            }

        return redirect()->route('user.cart')->with('message','You don\'t have any product to checkout.');*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = UserProfile::findOrFail($id);
        $input = $request->all();
        $user->update($input);
        return redirect()->back()->with('message','Account Information Updated Successfully.');

    }

    /**
     * Chnage Password
     * 
     * @param Request $request, $id
     */
    
    public function passchange(Request $request, $id)
    {
        # Get the User
        $user = UserProfile::findOrFail($id);

        # Initialize Input
        $input = [];

        # Check the validation of Password
        if ($request->currentPassword){
            if (Hash::check($request->currentPassword, $user->password)){

                if ($request->newPassword == $request->confimNewPassword){
                    $input['password'] = Hash::make($request->newPassword);
                }else{
                    Session::flash('error', 'Confirm Password Does not match.');
                    return redirect()->back()->with('message','New Password Does not match with Confirm Password.');
                }
            }else{
                Session::flash('error', 'Current Password Does not match');
                return redirect()->back()->with('message','Current Password Does not match.');
            }
        }

        # Update the Password of User
        $user->update($input);

        # Redirect Back
        return redirect()->back()
                         ->with('message','Account Password Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
