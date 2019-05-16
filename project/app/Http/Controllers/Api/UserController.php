<?php
namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;
use App\User;
use JWTAuthException;
use Validator;
use Hash;
use Mail;


class UserController extends Controller
{   
    private $user;
    public function __construct(User $user){
        $this->user = $user;
    }
   
    //user login
  public function login(Request $request)
  {
        $credentials = $request->only('email', 'password');
        
        $rules=['email'=>'required|string|email','password' => 'required|min:6'];

        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return response()->json(['success'=> false, 'error'=> $validator->messages()]);
        }
        
        $credentials['status'] = 1;
          
          dd(JWTAuth::attempt($credentials)); die;
        try {
            // attempt to verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['success' => false, 'error' => 'Please check credentials and you have verified your Email id.']);
            }
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to login, please try again.']);
        }
        // all good so return the token
        $user = JWTAuth::toUser($token);
        return response()->json(['success' => true,'token' => $token,'data'=> [$user]]);
    }




    /* 
      Register new user 
     */

    public function register(Request $request)
    {
        $credentials = $request->only('fname', 'lname','email','country_id', 'password');
        
        $rules = [
            'fname' => 'required|string|min:3|max:50',
            'lname' => 'required|string|max:25',
            'email' => 'required|string|email|max:100|unique:users',
            'country_id' => 'required',
            'password' => 'required|string|min:6',
        ];
    
       $validator = Validator::make($credentials, $rules);
       
        if($validator->fails()) {
            return response()->json(['success'=> false,'error'=> $validator->messages()]);
        }

        if(!empty($request->get('email'))){
          $email = $request->get('email');
        }else{
          $email = '';
        }
        $user = $this->user->create([
          'fname' => $request->get('fname'),
          'lname' => $request->get('lname'),
          'email' => $email,
          'user_group' => 1,
          'country_id' => $request->get('country_id'),
          'status' => 'active',
          'password' => bcrypt($request->get('password'))

        ]);

        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => str_random(40)
        ]);
 
 
         Mail::to($user->email)->send(new VerifyMail($user));

         return response()->json(['success'=> true, 'message'=> 'Please verify your Email Id']);
    }
    



//Login
 public function logout(Request $request) {
        try {
            JWTAuth::invalidate($request->input('token'));
            return response()->json(['success' => true, 'message'=> "You have successfully logged out."]);
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(['success' => false, 'error' => 'Failed to logout, please try again.']);
        }
  }


}