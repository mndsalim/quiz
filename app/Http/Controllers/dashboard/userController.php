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
        return user::all();
        return view('welcome');
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
        $validator = Validator::make($request->all(), [
            'name'      => 'required|min:3|max:255',
            'email'     => 'nullable|unique:users|email',
            'phone'     => 'required|unique:users|min:10|max:15',
            'password'  => 'nullable|min:3|max:120',
            'address'   => 'nullable',
            'birthdate' => 'nullable',
            'user_type' => 'required|min:0|max:1|numeric',
        ]);

        if ($validator->fails()) {
            return ['errors' => $validator->errors()];
        }

        $user =request()->all()
        $user['password'] = sha1(request()->password);
        $user = user::create($user);

        return $user;
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
            
            session()->put('user', [ 'id' => $user->id, 'name' => $user->name]);

            return view('welcome');
        }
// $request->session()->flash('status', 'Task was successful!');
        // session()->flash('error', 'phone or Password incorrect');
        return back();
    }



    public function logout()
    {
        return view('login');
    }
}
