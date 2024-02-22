<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;
use App\Models\PowerBiPanel;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.index');
    }
    //carregar ajax Datatable de listagem de usuários
    public function loadDataTable(Request $request)
    {   
        if ($request->ajax()) {   

            $users = User::select(['users.id', 'users.user_name', 'users.email',  'users.user_status', 'users.created_at']);                                             
            return DataTables::eloquent($users)
                ->addColumn('routeEdit', function ($user) {
                    return route('users.edit', $user);
                })
                ->addColumn('statusButton', function ($user) {
                    return view('users.buttonStatus', ['user' => $user]);
                })
                ->make(true);
        }      
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
    //savar novo usuário
    public function store(UserRequest $request)
    {
        //if(!auth()->user()->can('Cadastrar Usuário')){
        //    throw new UnauthorizedException('403', 'Oops! Você não tem a autorização necessária.');
        //}
        try{
            DB::beginTransaction();
            $user = new User;
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->save();
            DB::commit();
            return redirect()->route('users.index')->with(['color' => 'success', 'message' => 'Usuário cadastrado com sucesso!']);
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with(['color' => 'danger', 'message' => 'Erro! Tente novamente mais tarde ou contate o suporte.' ]);
        }       
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //if(!auth()->user()->can('Editar Usuário')){
        //    throw new UnauthorizedException('403', 'Oops! Você não tem a autorização necessária.');
        //}

        $user = User::where('id', $user->id)->first();
        $roles = Role::all();
        foreach($roles as $role){
            if($user->hasRole($role->name)){
                $role->can = true;
            }else{
                $role->can = false;
            }
        }
    
        return view('users.edit',[
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    //atualizar cadastro de usuário
    public function update(UserRequest $request, User $user)
    {
        //if(!auth()->user()->can('Editar Usuário')){
        //    throw new UnauthorizedException('403', 'Oops! Você não tem a autorização necessária.');
        //}
        try{
            DB::beginTransaction();
            $user = User::where('id', $user->id)->first();
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            if (!empty($request->password)) {
                $user->password =$request->password;
            }
            $user->save();
            $rolesRequest = $request->all();
            $roles = null;
            foreach($rolesRequest as $key => $value){
                if(Str::is('acl_*', $key) == true){
                    $roles[] = Role::where('id', ltrim($key, 'acl_') )->first();
                }
            }                      
            if(!empty($roles)){
                $user->syncRoles($roles);
            }else{
                $user->syncRoles(null);
            }
            DB::commit();
            return redirect()->route('users.edit', [
                'user' => $user
            ])->with(['color' => 'success', 'message' => 'Usuário atualizado com sucesso!']);
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with(['color' => 'danger', 'message' => 'Erro! Tente novamente mais tarde ou contate o suporte.' ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //if(!auth()->user()->can('Excluir Usuário')){
        //    throw new UnauthorizedException('403', 'Oops! Você não tem a autorização necessária.');
        //}
    }

    public function profile(User $user)
    {
        $user = User::where('id', $user->id)->first();        
        return view('users.profile',[
            'user' => $user,         
        ]);
    }
    //atualizar perfil de usuário
    public function updateProfile(Request $request, User $user)
    {
        try{
            $validate = Validator::make($request->all(),[
                'email' => 'required',                
                ]);
            if($validate->fails()){
                return redirect()->route('users.profile', [
                    'user' => $user
                ])->withInput()->withErrors($validate);
            }
            DB::beginTransaction();
            $user = User::where('id', $user->id)->first();
            $user->email = $request->email;
            if (!empty($request->password)) {
                $user->password =$request->password;
            }
            $user->save();
            DB::commit();
            return redirect()->route('users.profile', [
                'user' => $user
            ])->with(['color' => 'success', 'message' => 'Perfil atualizado com sucesso!']);
        }catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withInput()->with(['color' => 'danger', 'message' => 'Erro! Tente novamente mais tarde ou contate o suporte.' ]);
        }   
    }

    //ativar usuário
    public function activeUser(Request $request,User $user)
    {

        if ($request->ajax()) { 
            //if(!auth()->user()->can('Ativar/Desativar Usuário')){
            //    return response()->json(['message' => '403! Você não tem a autorização necessária.'], 500);
            //}
            try{
                DB::beginTransaction();
                $user = User::where('id', $user->id)->first();
                $user->user_status = true;
                $user->save();
                DB::commit();
                return response()->json(['message' => 'Usuário ativado com sucesso']);
            }catch (\Exception $e) {
                DB::rollback();
                return response()->json(['message' => 'Erro! Tente novamente mais tarde ou contate o suporte'], 500);
            } 
        }  

    }
    //desativar usuário
    public function deactivateUser(Request $request, User $user)
    {
        if ($request->ajax()) {
            if(!auth()->user()->can('Ativar/Desativar Usuário')){
                return response()->json(['message' => '403! Você não tem a autorização necessária.'], 500);
            }   
            try{
                DB::beginTransaction();
                $user = User::where('id', $user->id)->first();
                $user->user_status = false;
                $user->save();
                DB::commit();
                return response()->json(['message' => 'Usuário desativado com sucesso']);
            }catch (\Exception $e) {
                DB::rollback();
                return response()->json(['message' => 'Erro! Tente novamente mais tarde ou contate o suporte'], 500);
            } 
        } 
    }

}
