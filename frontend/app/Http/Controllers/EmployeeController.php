<?php

namespace App\Http\Controllers;

use App\Models\Models\Employee;
use App\Models\Models\Location;
use App\Models\Models\UserType;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function getEmployeeList()
    {
        $employees = Employee::all();
        // $user_type_ids = $employees->pluck('user_type')->unique();
        // $user_types = UserType::whereIn('id', $user_type_ids)->get();
        $locations = Location::orderBy('city')->get();
        $groupedLocations = [];

        foreach (range('A', 'Z') as $letter) {
            $groupedLocations[$letter] = $locations->filter(function ($value) use ($letter) {
                return strtolower(substr($value->city, 0, 1)) === strtolower($letter);
            });
        }

        return view('pages.employee', compact('employees', 'groupedLocations'));
    }

    public function updateEmployee(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email',
            'gender' => 'required',
            'hired_date' => 'required|date',
            'contact_number' => 'required',
        ]);

        $employee = Employee::find($request->input('employee_id'));

        if (!$employee) {
            return response()->json(['message' => 'Employee not found.'], 404);
        }

        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->email = $request->input('email');
        $employee->gender = $request->input('gender');
        $employee->hired_date = $request->input('hired_date');
        $employee->contact_number = $request->input('contact_number');
        $employee->save();

        return back()->with('success', 'Employee details updated successfully.');
    }

    public function createEmployee(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'nullable|email',
            'gender' => 'required',
            'hired_date' => 'required|date',
            'contact_number' => 'required',
        ]);

        $existingEmployee = Employee::where('email', $request->email)
            ->first();

        if ($existingEmployee) {
            return redirect()->back()->with('error', 'Employee with the same email already exists.');
        }

        $locationId = $request->input('location_id', null);

        Employee::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'gender' => $request->gender,
            'hired_date' => $request->hired_date,
            'location_id' => $locationId,
            'contact_number' => $request->contact_number,
        ]);

        return redirect()->back()->with('success', 'Employee added successfully.');
    }

    public function getProvincesByCity(Request $request)
    {
        $city = $request->input('city');
        $provinces = Location::where('city', $city)->pluck('province')->unique();

        return response()->json($provinces);
    }

    public function deleteEmployee(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
        ]);

        try {
            $employee = Employee::findOrFail($request->employee_id);

            $employee->delete();

            return response()->json(['message' => 'Employee deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete employee'], 500);
        }
    }
}
