<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
// use Modules\Admin\Http\Requests\EmailTemplateRequest;
// use Datatables;
use Crypt;
use App\Models\Area;

class AreaController extends Controller
{
    public function __construct(){

        $this->objModel = new Area;
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin::area.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin::area.addedit');
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
            return $this->objModel->saveArea($request);
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
        $area=$this->objModel->getArea(Crypt::decrypt($id));
        $encryptedId=$id;
        return view('admin::area.addedit',compact("area","encryptedId"));
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
        return $this->objModel->saveArea($request,$id);
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
        return $this->objModel->getAreaListData($r);
     
    }
    public function deleteAll(Request $request){
        
        return $this->objModel->deleteAll($request);
    }
    public function getStateDropDown(Request $request){

        $data=$request->all();
        $country_id=$data['country_id'];
        return view('admin::area.get_state_list',compact("country_id"));
    }
    public function getCityDropDown(Request $request){

        $data=$request->all();
        // print_r($data);
        $state_id=$data['state_id'];
        return view('admin::area.get_city_list',compact("state_id"));
    }
}
