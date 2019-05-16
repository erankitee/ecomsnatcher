<?php

namespace App\Http\Controllers;

use Auth;
use App\Order;
use App\Product;
use App\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
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
        # Set all the middlewares
        $this->middleware('web');
        $this->middleware('auth:profile');
        $this->middleware('auth');
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
        $wishlists = $this->wishlist->where('user_id', $userId)->get();

        # Return to view
        return view('account')->with([
            'wishlists' => $wishlists,
            'user'      => $user,
            'orders'    => $orders
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
        # Get the Product id to add to wish list
        $productId = $request->all()['prodid'];

        #Get the User Id
        $userId = Auth::user()->id;

        # Set the Data to Create New Model
        $data = [
            'product_id' => $productId,
            'user_id'    => $userId,
        ];

        # Get if model already is in wishlist
        $alreadyExisting = $this->wishlist
                                ->where('user_id', $userId)
                                ->where('product_id', $productId)
                                ->get(); 

        # Create the Wishlist Model if it is not already existing
        if($alreadyExisting->isNotEmpty()) {
             # Redirect Back
            return response()->json(['msg' => 'Product already is in your Wishlist.']);
        } else {
            $this->wishlist->create($data);
             # Redirect Back
            return response()->json(['msg' => 'Product added to your Wishlist Successfully.']);
        }
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
        # Get the wishList
        $wishlist = $this->wishlist->find($id);

        # Delete the Wishlist
        $wishlist->delete(); 

         # Redirect Back
            return response()->json(['msg' => 'Product has been deleted from Wishlist Successfully.']);
    }
}
