<?php

namespace App\Http\Controllers\Super;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Traits\HasRoles;

class AdminController extends Controller
{
    use HasRoles;
    public function index()
    {
        $admin = User::role('admin')->get();
        $superadmin = User::role('superadmin')->get();
        return view('super.admin.index', [
            'admin' => $admin,
            'superadmin' => $superadmin,
        ]);
    }

    public function create()
    {
        // $users = !(User::permission('setingumum'))->get();
        $users = User::get();
        return view('super.admin.create', [
            'users' => $users,
        ]);
    }

    public function store($id)
    {
        $user = User::findOrFail($id);
        $user->assignRole('admin');
        $user->removeRole('user');
        return redirect(route('admin.index'));
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $admin = User::find($id);
        $admin->assignRole('user');
        $admin->removeRole('admin');
        return redirect(route('admin.index'));
    }
}
