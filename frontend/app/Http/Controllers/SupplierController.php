<?php

namespace App\Http\Controllers;

use App\Models\Models\Supplier;
use App\Models\Models\Location;

use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function getSupplierList()
    {
        $suppliers = Supplier::all();
        $locations = Location::orderBy('city')->get();
        $groupedLocations = [];

        foreach (range('A', 'Z') as $letter) {
            $groupedLocations[$letter] = $locations->filter(function ($value) use ($letter) {
                return strtolower(substr($value->city, 0, 1)) === strtolower($letter);
            });
        }

        return view('pages.supplier', compact('suppliers', 'groupedLocations'));
    }

    public function updateSupplier(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'contact_number' => 'required',
        ]);

        $supplier = Supplier::find($request->input('supplier_id'));

        if (!$supplier) {
            return response()->json(['message' => 'Supplier not found.'], 404);
        }

        $supplier->first_name = $request->input('first_name');
        $supplier->last_name = $request->input('last_name');
        $supplier->contact_number = $request->input('contact_number');
        $supplier->save();

        return back()->with('success', 'Supplier details updated successfully.');
    }

    public function createSupplier(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'contact_number' => 'required',
        ]);

        // $existingSupplier = Supplier::where('first_name', $request->first_name)
        //     ->where('company_name', $request->company_name)
        //     ->first();

        // if ($existingSupplier) {
        //     return redirect()->back()->with('error', 'Supplier with similar details already exists.');
        // }

        Supplier::create([
            'company_name' => $request->company_name,
            'location_id' => null,
            'contact_number' => $request->contact_number,
        ]);

        return redirect()->back()->with('success', 'Supplier added successfully.');
    }

    public function deleteSupplier(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
        ]);

        try {
            $supplier = Supplier::findOrFail($request->supplier_id);

            $supplier->delete();

            return response()->json(['message' => 'Supplier deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete supplier'], 500);
        }
    }
}
