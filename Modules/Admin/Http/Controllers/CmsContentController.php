<?php
namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
// use Modules\Admin\Http\Requests\EmailTemplateRequest;
// use Datatables;
use Crypt;
use App\Models\CmsContent;

class CmsContentController extends Controller
{
    public function __construct(){

        $this->objModel = new CmsContent;
    } 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin::cms_content.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin::cms_content.addedit');
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
            return $this->objModel->saveCmsContent($request);
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
        $cmsContent=$this->objModel->getCmsContent(Crypt::decrypt($id));
        $encryptedId=$id;
        return view('admin::cms_content.addedit',compact("cmsContent","encryptedId"));
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
        return $this->objModel->saveCmsContent($request,$id);
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
        return $this->objModel->getCmsContentListData($r);
     
    }
    public function deleteAll(Request $request){
        
        return $this->objModel->deleteAll($request);
    }
}
