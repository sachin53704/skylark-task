<?php

namespace App\Service;

use App\Models\User;

class EmployeeService
{
    public function index()
    {
        return User::select('id', 'name', 'email', 'mobile', 'age', 'position')->get();
    }

    public function store($request)
    {
        $user = User::create($request->all());

        if ($user) {
            return true;
        } else {
            return false;
        }
    }

    public function edit($id)
    {
        return User::find($id);
    }

    public function update($request)
    {
        $user = User::find($request->id);

        $user = $user->update($request->all());

        if ($user) {
            return true;
        } else {
            return false;
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            if ($user->delete()) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
