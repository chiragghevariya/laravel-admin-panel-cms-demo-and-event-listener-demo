<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\LoginRequest;
use Auth;
use Illuminate\Support\Facades\Session;
use App\Events\UserLoginEvent;

class LoginController extends Controller
{
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
    public function login(){
        // dd("123");exit;
         return view('admin::layouts.login');
    }

    public function postLogin(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {

            event(new UserLoginEvent(\Auth::user()));
            // flashMessage('success',"Login Successfully Done.");
            return response()
                ->json([
                    'message' => 'Success',
                    'status' => 1
                ]);
        } else {

           flashMessage('error',"Please enter valid email address and password.");
            // $redirect_login= route('admin.login.main');
            return response()
                ->json([
                    'message' => 'Incorrect Credentials',
                    'status' => 0,
                ]);
        }
    }

    public function logout(){

        \Auth::logout();
        flashMessage('success','you are successfully logout');
        return redirect(route('admin.login.main'));
    }
}
