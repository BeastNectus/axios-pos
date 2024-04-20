<?php

namespace App\Http\Controllers;

use App\Models\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function getCustomerList() {
        $customers = Customer::all();
    
        return view('pages.customer', compact('customers'));
    }

    public function updateCustomer(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
        ]);

        $customer = Customer::find($request->input('customer_id'));

        if (!$customer) {
            return response()->json(['message' => 'Customer not found.'], 404);
        }

        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->contact_number = $request->input('contact_number');
        $customer->save();

        return back()->with('success', 'Customer details updated successfully.');
    }

    public function createCustomer(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
        ]);

        $existingCustomer = Customer::where('first_name', $request->first_name)
            ->where('last_name', $request->last_name)
            ->first();

        if ($existingCustomer) {
            return redirect()->back()->with('error', 'Customer with the same details already exists.');
        }

        Customer::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'contact_number' => $request->contact_number,
        ]);

        return redirect()->back()->with('success', 'Customer added successfully.');
    }

    public function deleteCustomer(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
        ]);

        try {
            $customer = Customer::findOrFail($request->customer_id);
            $customer->delete();

            return response()->json(['message' => 'Customer deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the customer'], 500);
        }
    }
}