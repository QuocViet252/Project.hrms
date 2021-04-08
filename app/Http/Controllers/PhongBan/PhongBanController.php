<?php

namespace App\Http\Controllers\PhongBan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\PhongBan;
use App\Http\Requests\PhongBanRequest;

class PhongBanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phongban = PhongBan::all();
        return view('admin.Department.danhsach',compact('phongban'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getThem()
    {
        return view('admin.Department.them');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postThem(PhongBanRequest $request)
    {
        
        

        $phongban = new PhongBan;
        
        $phongban->name = $request->name;
        $checkActiveOrClose = $request->get('group1');
        if( $checkActiveOrClose == 'active' ){
            $phongban->tinhtrang = "Hoạt động";
        }
        else if($checkActiveOrClose == 'close'){
            $phongban->tinhtrang = "Tạm ngừng";
        }
        
        if($phongban->save()){
            
            

            return redirect('phongban')->with('success',__('Bạn đã thêm phòng ban mới thành công'));
        }
        
        

        
        
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSua($id)
    {
        $editPhongBan = PhongBan::find($id);
        
        return view('admin.Department.sua',compact('editPhongBan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postSua(Request $request,$id)
    {
        $phongban = PhongBan::find($id);
        $phongban->name = $request->name;
        $checkActiveOrClose = $request->get('group1');
        if( $checkActiveOrClose == 'active' ){
            $phongban->tinhtrang = "Hoạt động";
        }
        else if($checkActiveOrClose == 'close'){
            $phongban->tinhtrang = "Tạm ngừng";
        }
        
        if($phongban->save()){
            
            

            return redirect('phongban')->with('success',__('Bạn đã chỉnh sửa phòng ban thành công'));
        }
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
    public function delete($id)
    {
        $phongban = PhongBan::find($id);
        if($phongban->delete()){
            return redirect('phongban')->with('success',__('Đã xóa thành công phòng ban'));
        }
        
    }
}
