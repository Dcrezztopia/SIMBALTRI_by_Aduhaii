<?php

namespace App\Http\Controllers;

use App\Components\Sidebar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    protected $sidebarItems;
    protected $activeSidebarItem = [];
    protected $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::user();
            return $next($request);
        });
        $this->sidebarItems = new Sidebar();
    }

    public function index()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['users'];
        $users = User::all();
        return view('users.index')
            ->with('user', $this->user)
            ->with('users', $users)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required|unique:users',
            'role' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('/register')
                ->withErrors($validator)
                ->withInput();
        }
        $request['password'] = Hash::make($request->password);

        User::create($request->all());

        return redirect()->route('users.index');
    }

    public function create()
    {
        $this->sidebarItems->for($this->user->role);
        $this->activeSidebarItem = ['users'];
        return view('users.create')
            ->with('user', $this->user)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }


    public function edit($id)
    {
        $this->sidebarItems->for($this->user->role);
        $userToEdit = User::find($id);
        $this->activeSidebarItem = ['users'];
        return view('users.edit')
            ->with('user', $this->user)
            ->with('userToEdit', $userToEdit)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function show($id)
    {
        $this->sidebarItems->for($this->user->role);
        $userToShow = User::find($id);
        $this->activeSidebarItem = ['users'];
        return view('users.detail')
            ->with('user', $this->user)
            ->with('userToShow', $userToShow)
            ->with('sidebarItems', $this->sidebarItems)
            ->with('activeSidebarItem', $this->activeSidebarItem);
    }

    public function update(Request $request, $id)
    {
// dd($request);
        $request->validate([
            'nama' => 'required',
            'username' => 'required',
            'role' => 'required',
        ]);
        $user = User::find($id);
        if ($user) {
            $user->nama = $request->nama;
            $user->username = $request->username;
            $user->role = $request->role;
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
            return redirect()->route('users.index');
        } else {
            return redirect()->back()->withErrors(['User not found']);
        }
    }

    public function destroy($id) {
        User::destroy($id);
        return redirect()->route('users.index');
    }
}
