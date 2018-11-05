<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Cache;
use Cookie;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        // dd("123");exit;\
        // Cookie::set("HI","cookir are set now",10);
        // return view('admin::layouts.dashboard');

        $cookie = cookie()->forever('cookie_example', '2');
        // dd($cookie->value);exit;
        return response(view('admin::layouts.dashboard'))->cookie($cookie);
        // return view('admin::layouts.login');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        // return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {

    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    /**
     * undocumented function
     *
     * @return void
     * @author
     **/
    public function clearServerCache()
    {


    }

}
