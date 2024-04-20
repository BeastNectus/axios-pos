<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\InvoiceController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['auth', 'user.type:1,2'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    Route::get('/employee', function () {
        return view('pages.employee');
    })->name('employee');

    Route::get('/supplier', function () {
        return view('pages.supplier');
    })->name('supplier');

    // CUSTOMER ROUTES
    Route::get('/customers', [CustomerController::class, 'getCustomerList'])->name('customer');
    Route::post('/create-customer', [CustomerController::class, 'createCustomer'])->name('createCustomer');
    Route::post('/update-customer', [CustomerController::class, 'updateCustomer'])->name('updateCustomer');
    Route::post('/delete-customer', [CustomerController::class, 'deleteCustomer'])->name('deleteCustomer');

    // EMPLOYEE ROUTES
    Route::get('/employee', [EmployeeController::class, 'getEmployeeList'])->name('employee');
    Route::post('/create-employee', [EmployeeController::class, 'createEmployee'])->name('createEmployee');
    Route::post('/update-employee', [EmployeeController::class, 'updateEmployee'])->name('updateEmployee');
    Route::post('/get-provinces-by-city', [EmployeeController::class, 'getProvincesByCity'])->name('getProvincesByCity');
    Route::post('/delete-employee', [EmployeeController::class, 'deleteEmployee'])->name('deleteEmployee');

    // PRODUCT ROUTES
    Route::get('/product', [ProductController::class, 'getProductList'])->name('product');
    Route::post('/create-product', [ProductController::class, 'createProduct'])->name('createProduct');
    Route::post('/update-product', [ProductController::class, 'updateProduct'])->name('updateProduct');
    Route::post('/delete-product', [ProductController::class, 'deleteProduct'])->name('deleteProduct');

    // INVENTORY ROUTES
    Route::get('/inventory', [InventoryController::class, 'getInventoryList'])->name('inventory');
    Route::post('/create-inventory', [InventoryController::class, 'createInventory'])->name('createInventory');
    Route::post('/update-inventory', [InventoryController::class, 'updateInventory'])->name('updateInventory');
    Route::post('/delete-inventory', [InventoryController::class, 'deleteInventory'])->name('deleteInventory');

    // SUPPLIER ROUTES
    Route::get('/supplier', [SupplierController::class, 'getSupplierList'])->name('supplier');
    Route::post('/create-supplier', [SupplierController::class, 'createSupplier'])->name('createSupplier');
    Route::post('/update-supplier', [SupplierController::class, 'updateSupplier'])->name('updateSupplier');
    Route::post('/delete-supplier', [SupplierController::class, 'deleteSupplier'])->name('deleteSupplier');

    // ACCOUNT ROUTES
    Route::get('/accounts', [AccountController::class, 'getAccountList'])->name('accounts');
    Route::post('/create-account', [AccountController::class, 'createUser'])->name('createUser');
    Route::post('/update-account', [AccountController::class, 'updateUser'])->name('updateUser');
    Route::post('/delete-account', [AccountController::class, 'deleteUser'])->name('deleteUser');

    //INVOICE ROUTES
    Route::get('/invoice', [InvoiceController::class, 'invoice'])->name('invoice');
    Route::post('/update-invoice', [InvoiceController::class, 'updateInvoice'])->name('updateInvoice');
    Route::post('/delete-invoice', [InvoiceController::class, 'deleteInvoice'])->name('deleteInvoice');


});

Route::middleware(['auth', 'user.type:1,2,3'])->group(function () {
    // PROFILE ROUTES
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // POS ROUTES
    Route::get('/pos', [HomeController::class, 'userHome'])->name('userHome');

    // INVOICE ROUTES
    Route::post('/create-invoice', [InvoiceController::class, 'createInvoice'])->name('createInvoice');
    Route::get('/invoice-receipt/{invoice_id}', [InvoiceController::class, 'invoiceReceipt'])->name('invoiceReceipt');
    Route::get('/invoice-receipt/{invoice_id}/pdf', [InvoiceController::class, 'invoiceReceiptPDF'])->name('invoiceReceiptPDF');

});

require __DIR__ . '/auth.php';
