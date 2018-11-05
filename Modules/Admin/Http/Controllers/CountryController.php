<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
// use Modules\Admin\Http\Requests\EmailTemplateRequest;
// use Datatables;
use Crypt;
use App\Models\Country;

class CountryController extends Controller
{
    public function __construct(){

        $this->objModel = new Country;
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin::country.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin::country.addedit');
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
            return $this->objModel->saveCountry($request);
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
        $country=$this->objModel->getCountry(Crypt::decrypt($id));
        $encryptedId=$id;
        return view('admin::country.addedit',compact("country","encryptedId"));
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
        return $this->objModel->saveCountry($request,$id);
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
        return $this->objModel->getCountryListData($r);
     
    }
    public function deleteAll(Request $request){
        
        return $this->objModel->deleteAll($request);
    }
}
