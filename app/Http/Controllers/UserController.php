<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller{
    protected $model;

    public function __construct(User $user){
        $this->model = $user;
    }

    public function index(Request $request){
        $users = $this->model->getAll(search: $request->search ?? '');

        return view('users.index', compact('users'));
        
    }

    public function show($id){
        $user = $this->model->find($id);

        if(isset($user))
            return view('users.show', compact('user'));
        else
            return redirect()->route('users.index');

    }

    public function create(){
        return view('users.create');

    }

    public function store(StoreUpdateUser $request){
        $this->model->create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('users.index');

    }

    public function edit($id){
        $user = $this->model->find($id);

        if(isset($user))
            return view('users.edit', compact('user'));
        else
            return redirect()->route('users.index');
        
    }

    public function update(StoreUpdateUser $request, $id){
        $user = $this->model->find($id);
        
        if(isset($user)){
            if($request->password){
                $user->fill([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password)
                ]);

            } else {
                $user->fill([
                    'name' => $request->name,
                    'email' => $request->email
                ]);
                
            }

            $user->save();

        }

        return redirect()->route('users.index');

    }

    public function destroy($id){
        $user = $this->model->find($id);

        if(isset($user)){
            $user->delete();

            return redirect()->route('users.index');

        } else
            return redirect()->route('users.index');

    }


}
