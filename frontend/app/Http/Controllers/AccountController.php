<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\User;
use App\Models\User as UserMain;
use App\Models\Models\UserType;
use App\Models\Models\Employee;

class AccountController extends Controller
{
    public function getAccountList()
    {
        $users = User::all();
        $user_types = UserType::where('id', '!=', 1)->get();
        $employees = Employee::all();

        return view('pages.account', compact('users', 'employees', 'user_types'));
    }

    public function updateUser(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:6',
            'user_type' => 'required',
        ]);

        $employee = Employee::findOrFail($request->employee_id);
        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->save();

        $user = UserMain::where('employee_id', $request->employee_id)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->user_type = $request->input('user_type');
        $user->save();

        return redirect()->back()->with('success', 'User details updated successfully');
    }

    public function createUser(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'email' => 'required',
            'password' => 'required',
            'user_type' => 'required',
        ]);

        $validUserTypes = UserType::pluck('id')->toArray();
        if (!in_array($request->user_type, $validUserTypes)) {
            return redirect()->back()->with('error', 'Invalid user type selected.');
        }

        $user = new User();
        $user->employee_id = $request->employee_id;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->user_type = $request->user_type;
        $user->save();

        return redirect()->back()->with('success', 'User added successfully.');
    }

    public function deleteUser(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        try {
            $user = User::findOrFail($request->user_id);
            $user->delete();

            return response()->json(['message' => 'User deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the user'], 500);
        }
    }
}
