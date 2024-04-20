<?php

namespace App\Http\Controllers;

use App\Models\Models\Employee;
use App\Models\Models\Customer;
use App\Models\Models\Supplier;
use App\Models\Models\Product;
use App\Models\Models\Category;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $employeeCount = $this->getEmployeeCount();
        $customerCount = $this->getCustomerCount();
        $supplierCount = $this->getSupplierCount();
        $productCount = $this->getProductCount();
        $recentProducts = Product::orderBy('date_stock_in', 'desc')->take(5)->get();

        return view('pages.dashboard', compact('employeeCount', 'customerCount', 'supplierCount', 'productCount', 'recentProducts'));
    }

    public function userHome()
    {
        $categories = Category::all();
        $customers = Customer::all();
        $productsByCategory = [];

        foreach ($categories as $category) {
            $productsByCategory[$category->id] = Product::where('category_id', $category->id)->get();
        }

        return view('pages.userpos', compact('categories', 'productsByCategory', 'customers'));
    }

    private function getEmployeeCount()
    {
        return Employee::count();
    }

    private function getCustomerCount()
    {
        return Customer::count();
    }

    private function getSupplierCount()
    {
        return Supplier::count();
    }

    private function getProductCount()
    {
        return Product::count();
    }
}
