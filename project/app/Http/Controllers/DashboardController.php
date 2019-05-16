<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
     *
     * Constructor For Controller
     *
    */
    public function __construct(Wishlist $wishlist, Order $order)
    {
        # Set all the middlewares
        $this->middleware('web');
        $this->middleware('auth:profile');
        $this->middleware('auth');
        $this->order = $order;
        $this->wishlist = $wishlist;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # Get the User Id
        $userId = Auth::user()->id;

        # Get the Orders of User
         $orders = $this->order
                        ->where('customerid', Auth::user()->id)
                        ->orderBy('id','desc')
                        ->take(15)
                        ->get();

        # Get the Authenticated User
        $user = Auth::user();

        # Get the user Wishlist
        $wishlists = $this->wishlist->with('product')->where('user_id', $userId)->get();

        # return to view
        return view('account')->with([
                                        'user'   => $user,
                                        'orders' => $orders,
                                        'wishlists' => $wishlists,
                                    ]);
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
        //
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
