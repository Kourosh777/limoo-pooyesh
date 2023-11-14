<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Ostan;
use App\Models\Shahrestan;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::paginate(10);
        $ostans=Ostan::all();
        $shahrestans=Shahrestan::where('ostan',$ostans->first()->id)->get();
        return view('admin.user.index',compact('users','ostans','shahrestans'));
    }
    public function filterUsers(Request $request){
//        dd($request->all());
        return redirect()->route('users.search.show')->with(['ostan'=>$request->ostan,'shahrestan'=>$request->shahrestan]);
    }
    public function filterUsersShow(Request $request){
        $login_user=auth()->user();
//      dd(Route::currentRouteName());
        $selected=[];
        $selected['ostan']=null;
        $selected['shahrestan']=null;
//        $selected['role']=null;
//        $selected['status']=null;
//        dd($request->all());
//        dd($request->session()->get('ostan'));
        if ($request->session()->get('ostan')){
//        dd($request->session()->get('ostan'));
            $users=user::where('ostan_id',$request->session()->get('ostan'));
//            dd($users);
            $selected['ostan']=$request->session()->get('ostan');
            if ($request->session()->get('shahrestan')){
                $users=$users->where('shahrestan_id',$request->session()->get('shahrestan'));
                $selected['shahrestan']=$request->session()->get('shahrestan');
            }
        }
        else{
            $users=User::query();
        }
        /*if ($request->session()->has('role')){
            $users=$users->where('role',$request->session()->get('role'));
            $selected['role']=$request->session()->get('role');
        }
        else{
            $selected['role']=null;
        }*/
        /*if (!is_null($request->session()->get('status'))){
            $selected['status']=$request->session()->get('status');
            $users=$users->where('status',$request->session()->get('status'));
        }
        else{
            $selected['status']=null;
        }*/
//       UserController::$excel_data=$users->get();
        /*$excel_data=$users->get();
        session()->flash('excel',$excel_data);*/
//    $excel_data='';
//        dd($excel_data);
        $users=$users->paginate(10);
        $ostans=Ostan::all();
//        dd(isset($selected['shahrestan']));
        if ( isset( $selected['ostan']) ){
            $shahrestans = Shahrestan::where('ostan', $selected['ostan'])->get();
        }
        else {
            $shahrestans = Shahrestan::where('ostan', $ostans->first()->id)->get();
//            dd($shahrestans);
        }
        /*if (isset($selected['shahrestan'])){
            $shahrestan_name=Shahrestan::where('id',$selected['shahrestan'])->first()->name;
    //      $masjeds=masjed::where('shahrestan',"LIKE",$shahrestan_name)->get();
        }*/
//        $roles=Role::all();
//    dd($selected);
//    dd($selected['status']);
        $request->session()->keep(['ostan', 'shahrestan']);
        return view('admin.user.index',compact('users','ostans','shahrestans','selected'));
    }
    public function exportExcel(Request $request){
        if ($request->ostan) {
            $users = User::where('ostan_id', $request->ostan);
            $selected['ostan'] = $request->ostan;
            if ($request->shahrestan) {
                $users = $users->where('shahrestan_id', $request->shahrestan);
                $selected['shahrestan'] = $request->shahrestan;
            }
           /* if ($request->role) {
                $selected['role'] = $request->role;
                $users = $users->where('role', $request->role);
            }
            if ($request->status){
                $selected['status']=$request->status;
                $users=$users->where('status',$request->status);
            }*/
        } else {
            $users = User::query();
        }
        $excel_data = $users->get();
        $request->session()->keep(['ostan','shahrestan']);
//        dd(session()->get('excel'));
//        $excel_data=session()->get('excel');
//        dd(UserController::$excel_data);
        /* $aaa=new UserController();
        $aaa->excel_data=1;
     //        dd($aaa::excel_data);
             dd($aaa->excel_data);*/
//        $obj=new SingleResultExport();
        return Excel::download(new UsersExport($excel_data), 'users.xlsx');
//        return Excel::download($obj->collection(), 'users.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
