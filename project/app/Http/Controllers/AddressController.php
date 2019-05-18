<?php

namespace App\Http\Controllers;

use Auth;
use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     *
     * Bind Address Model
     *
     */
    protected $address;
    
    /**
     * Constructor for Controller
     * 
     * @param 
     */
    public function __construct(Address $address)
    {
        $this->middleware('web');
        $this->middleware('auth:profile');
        $this->middleware('auth');
        $this->address = $address;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $authUser = Auth::user();
        # Get the data from Request and Set to Array
        $data = [
            'user_id'       => Auth::user()->id,
            'full_name'     => $request->get('fullName') ?? null,
            'mobile'        => $request->get('mobile')   ?? null,
            'postalcode'    => $request->get('postalCode') ?? null,
            'city'          => $request->get('city') ?? null,
            'state'         => $request->get('state') ?? null,
            'house_number'  => $request->get('house') ?? null,
            'area'          => $request->get('area') ?? null,
            'landmark'      => $request->get('landmark') ?? null,
            'phone_number'  => $request->get('phone') ?? null,
        ];

        # Create Address for User
        $this->address->create($data);

        # Get all the address of User
        $userAddresses =  $authUser->all_addresses;

        # return to View
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
