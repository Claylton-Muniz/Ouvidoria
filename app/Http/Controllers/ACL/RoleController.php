<?php

namespace App\Http\Controllers\ACL;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Controllers\Controller;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
//use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //if(!auth()->user()->can('Listar Perfis de Usuário')){
        //    throw new UnauthorizedException('403', 'Você não tem a autorização necessária.');
        //}
        return view('acl.roles.index');
    }

    public function loadDataTable(Request $request)
    {   
        if ($request->ajax()) {
            $roles = Role::select() ;                                           
            return DataTables::of($roles)
                ->addColumn('routeEdit', function ($role) {
                    return route('roles.edit', ['role'=>$role]);
                })
                ->addColumn('action', function ($role) {
                    return view('acl.roles.buttonsDataTable', ['role' => $role]);
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
        //if(!auth()->user()->can('Cadastrar Perfil de Usuário')){
        //    throw new UnauthorizedException('403', 'Você não tem a autorização necessária.');
        //}
        try{
            $validate = Validator::make($request->all(),[
                'name' => 'required',                
                ]);
            if($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $role = Role::where('name', $request->name)->get();
            if($role->count() > 0){
                return redirect()->back()->withInput()->with(['color' => 'danger', 'message' => 'Ooops, o nome desse perfil já está em uso!']);
            }
            DB::beginTransaction();
            $role = new Role();
            $role->name = $request->name;
            $role->save();
    
            DB::commit();
            return redirect()->route('roles.index')->with(['color' => 'success', 'message' => 'Perfil cadastrado com sucesso!']);
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
    public function edit(Role $role)
    {
        //if(!auth()->user()->can('Editar Perfil de Usuário')){
        //    throw new UnauthorizedException('403', 'Você não tem a autorização necessária.');
        //}
        $role = Role::where('id', $role->id)->first();
        return view('acl.roles.edit',[
            'role' => $role
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        //if(!auth()->user()->can('Editar Perfil de Usuário')){
        //    throw new UnauthorizedException('403', 'Você não tem a autorização necessária.');
        //}
        try{
            $validate = Validator::make($request->all(),[
                'name' => 'required',                
                ]);
            if($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $roleCheck = Role::where('name', $request->name)->where('id', '!=', $role->id)->get();
            if($roleCheck->count() > 0){
                return redirect()->back()->withInput()->with(['color' => 'danger', 'message' => 'Ooops, o nome desse perfil já está em uso!']);
            }
            DB::beginTransaction();
            $role = Role::where('id', $role->id)->first();
            $role->name = $request->name;
            $role->save();
            DB::commit();
            return redirect()->route('roles.edit', [
                'role' => $role
            ])->with(['color' => 'success', 'message' => 'Perfil alterardo com sucesso!']);
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with(['color' => 'danger', 'message' => 'Erro! Tente novamente mais tarde ou contate o suporte.' ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //if(!auth()->user()->can('Excluir Perfil de Usuário')){
        //    throw new UnauthorizedException('403', 'Você não tem a autorização necessária.');
        //}
        //try{
        //    DB::beginTransaction();
        //    $role = Role::where('id', $role->id)->first();
        //    $role->delete();
        //    DB::commit();
        //    return redirect()->back()->with(['color' => 'success', 'message' => 'Perfil excluido com sucesso.']);
        //}catch (\Exception $e) {
        //    DB::rollback();
        //    return redirect()->back()->withInput()->with(['color' => 'danger', 'message' => 'Erro! Tente novamente mais tarde ou contate o suporte.' ]);
        //}
    }

    public function permissions(Role $role){
        //if(!auth()->user()->can('Associar Permissões ao Perfil de Usuário')){
        //    throw new UnauthorizedException('403', 'Você não tem a autorização necessária.');
        //}
        $role = Role::where('id', $role->id)->first();
        $permissions = Permission::all()->sortBy('name')->groupBy('group');
        foreach ($permissions as $group => $groupPermissions) {
            foreach ($groupPermissions as $permission) {
                if($role->hasPermissionTo($permission->name)){
                    $permission->can = true;
                }else{
                    $permission->can = false;
                }
            }
        }
        return view('acl.roles.permissions',[
            'role' => $role,
            'permissions' => $permissions
        ]);
    }

    public function permissionsSync(Request $request, Role $role){
        //if(!auth()->user()->can('Associar Permissões ao Perfil de Usuário')){
        //    throw new UnauthorizedException('403', 'Você não tem a autorização necessária.');
        //}
        try{
            $permissionsRequest = $request->except(['_token', '_method']);
            foreach($permissionsRequest as $key => $value){
                $permissions[] = Permission::where('id', $key )->first();
            }
            DB::beginTransaction();
            $role = Role::where('id', $role->id)->first();
            if(!empty($permissions)){
                $role->syncPermissions($permissions);
            }else{
                $role->syncPermissions(null);
            }
            DB::commit();
            return redirect()->route('roles.permissions',[
                'role' => $role,
            ])->with(['color' => 'success', 'message' => 'Perfil sincronizado com sucesso!']);
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with(['color' => 'danger', 'message' => 'Erro! Tente novamente mais tarde ou contate o suporte.' ]);
        }
    }


}
