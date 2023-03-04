<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function employees()
    {
        $employees = User::where('is_admin', 0)->get();
        return view('admin.employees.index', compact('employees'));
    }
    public function leavesByEmployee(User $user)
    {
        $leaves = $user->leaves;
        return view('admin.employees.leaves', compact('leaves', 'user'));
    }
}
