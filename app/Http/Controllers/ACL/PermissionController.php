<?php

namespace App\Http\Controllers\ACL;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->hasRole('Super Admin')) {
            throw new UnauthorizedException('403', 'Oops! Você não tem a autorização necessária.');
        }
        return view('acl.permissions.index');
    }

    public function loadDataTable(Request $request)
    {   
        if ($request->ajax()) {
            $permissions = Permission::select(['id', 'name','group','created_at']) ;                                           
            return DataTables::of($permissions)
                ->addColumn('routeEdit', function ($permission) {
                    return route('permissions.edit', ['permission'=>$permission]);
                })                                                                                    
                ->make(true);  
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->hasRole('Super Admin')) {
            throw new UnauthorizedException('403', 'Oops! Você não tem a autorização necessária.');
        }
        try{
            $validate = Validator::make($request->all(),[
                'name' => 'required',    
                'group' => 'required',            
                ]);
            if($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $permission = Permission::where('name', $request->name)->get();
            if($permission->count() > 0){
                return redirect()->back()->withInput()->with(['color' => 'danger', 'message' => 'Ooops, o nome dessa permissão já está em uso!']);
            }
            DB::beginTransaction();
            $permission = new Permission();
            $permission->name = $request->name;
            $permission->group = $request->group;
            $permission->save();
            DB::commit();
            return redirect()->route('permissions.index')->with(['color' => 'success', 'message' => 'Permissão cadastrada com sucesso!']);
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with(['color' => 'danger', 'message' => 'Erro! Tente novamente mais tarde ou contate o suporte.' ]);
        }
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
    public function edit(Permission $permission)
    {
        if (!auth()->user()->hasRole('Super Admin')) {
            throw new UnauthorizedException('403', 'Oops! Você não tem a autorização necessária.');
        }
        $permission = Permission::where('id', $permission->id)->first();
        return view('acl.permissions.edit', [
            'permission' => $permission
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        if (!auth()->user()->hasRole('Super Admin')) {
            throw new UnauthorizedException('403', 'Oops! Você não tem a autorização necessária.');
        }
        try{
            $validate = Validator::make($request->all(),[
                'name' => 'required',    
                'group' => 'required',            
                ]);
            if($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $permissionCheck = Permission::where('name', $request->name)->where('id', '!=', $permission->id)->get();
            if($permissionCheck->count() > 0){
                return redirect()->back()->withInput()->with(['color' => 'danger', 'message' => 'Ooops, o nome dessa permissão já está em uso!']);
            }
            DB::beginTransaction();
            $permission = Permission::where('id', $permission->id)->first();
            $permission->name = $request->name;
            $permission->group = $request->group;
            $permission->save();
            DB::commit();
            return redirect()->route('permissions.edit', [
                'permission' => $permission
            ])->with(['color' => 'success', 'message' => 'Permissão alterada com sucesso!']);
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with(['color' => 'danger', 'message' => 'Erro! Tente novamente mais tarde ou contate o suporte.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        if (!auth()->user()->hasRole('Super Admin')) {
            throw new UnauthorizedException('403', 'Oops! Você não tem a autorização necessária.');
        }
        //try{
        //    DB::beginTransaction();
        //    $permission = Permission::where('id', $permission->id)->first();
        //    $permission->delete();
        //    DB::commit();
        //    return redirect()->back()->with(['color' => 'green', 'message' => 'Permissão excluida com sucesso.']);
        //}catch (\Exception $e) {
        //    DB::rollback();
        //    return redirect()->back()->withInput()->with(['color' => 'red', 'message' => 'Erro! Tente novamente mais tarde ou contate o suporte.' ]);
        //}
    }
}
