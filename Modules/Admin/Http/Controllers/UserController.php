<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Crypt;

class UserController extends Controller
{
    public function __construct(){

        $this->objModel = new \App\Models\User;
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin::user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin::user.addedit');
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
            return $this->objModel->saveUser($request);
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
        $user=$this->objModel->getUser(Crypt::decrypt($id));
        $encryptedId=$id;
        return view('admin::user.addedit',compact("user","encryptedId"));
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
        return $this->objModel->saveUser($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        $request['checkbox']=[$id];
        return $this->objModel->deleteAll($request);
    }

    public function anyData(Request $r)
    {
        return $this->objModel->getUserListData($r);
     
    }
    public function deleteAll(Request $request){
        
        return $this->objModel->deleteAll($request);
    }
}
