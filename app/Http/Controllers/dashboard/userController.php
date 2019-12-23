<?php

namespace App\Http\Controllers\dashboard;

use App\user;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        if(userController::checklogin() != 1){
            return redirect('/login');
        }

        $user = user::where('user_type', 1)->get();
        return view('user')->with('users', $user);
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


        
        if(userController::checklogin() != 1){
            return redirect('/login');
        }


        $validator = Validator::make($request->all(), [
            'name'      => 'required|min:3|max:255',
            'email'     => 'nullable|unique:users|email',
            'phone'     => 'required|unique:users|min:10|max:15',
            'password'  => 'required|confirmed|min:3|max:120',
            'address'   => 'nullable',
            // 'user_type' => 'required|min:0|max:1|numeric',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }


        $user = user::create([
            'name'      => request()->name,
            'phone'     => request()->phone,
            'address'   => request()->address,
            'password' => sha1(request()->password),
            'user_type' => 1,
        ]);


        // $user = user::create($user);

        return $this->index();
    }




    public function loginform()
    {

        return view('login');
    }




    public function login()
    {
        $validate = $this->validate(request(), [
            'user_phone'    => 'required|min:9',
            'user_password' => 'required',
        ]);

        $user = user::where('user_type', 1)->where('phone', request()->user_phone)->where('password', sha1(request()->user_password))->first();

        
        if(isset($user->id)){
            
            session()->put('id', $user->id);
            session()->put('name', $user->name);
            session()->put('phone', $user->phone);

            return view('welcome');
        }
// $request->session()->flash('status', 'Task was successful!');
        // session()->flash('error', 'phone or Password incorrect');
        return back();
    }



    public function logout()
    {

        session()->forget('id');
        session()->forget('name');
        session()->forget('phone');


        return view('login');
    }



    public static function checklogin(){

        if(empty(session('name')) || empty(session('phone')) || empty(session('id'))){
            return 0;
        }
        return 1;
    }
}
