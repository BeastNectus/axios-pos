<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Models\Invoice;
use App\Models\Models\Product;
use App\Models\Models\Customer;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class InvoiceController extends Controller
{
    public function invoice()
    {
        $invoices = Invoice::all();
        return view('pages.invoice', compact('invoices'));
    }

    public function invoiceReceipt($invoice_id)
    {
        $invoiceId = base64_decode($invoice_id);
        $invoice = Invoice::findOrFail($invoiceId);
        $customer = Customer::findOrFail($invoice->customer_id);
        $invoices = Invoice::where('customer_id', $invoice->customer_id)
                      ->where('date', $invoice->date)
                      ->get();

        return view('pages.invoice-receipt', compact('invoice', 'customer', 'invoices'));
    }

    public function createInvoice(Request $request)
    {
        $invoiceData = json_decode($request->invoice_data, true);
        $invoiceIds = [];
        foreach ($invoiceData as $item) {
            $invoice = new Invoice();
            $invoice->product_name = $item['product_name'];
            $invoice->num_of_items = $item['num_of_items'];
            $invoice->price = $item['price'];
            $invoice->total = $item['total'];
            $invoice->customer_id = $request->customer_id;
            $invoice->cash = $request->cash;
            $invoice->customer_change = $request->cash - $item['total'];
            $invoice->date = now();
            $invoice->save();

            $invoiceIds[] = base64_encode($invoice->invoice_id);
            

            $product = Product::where('name', $item['product_name'])->first();
            if ($product) {
                if ($product->qty_stock >= $item['num_of_items']) {
                    $product->qty_stock -= $item['num_of_items'];
                    $product->save();
                } else {
                    return redirect()
                        ->back()
                        ->with('error', 'Out of stock: ' . $item['product_name']);
                }
            } else {
                return redirect()->back()->with('error', 'Product not found');
            }
        }

        return response()->json(['invoice_ids' => $invoiceIds]);
    }

    public function updateInvoice(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required|exists:invoices,invoice_id',
            'customer_id' => 'required',
            'product_name' => 'required',
            'num_of_items' => 'required',
            'price' => 'required',
            'total' => 'required',
            'cash' => 'required',
            'date' => 'required',
        ]);
        // dd($request->all());

        $invoice = Invoice::where('invoice_id', $request->input('invoice_id'))->first();

        if (!$invoice) {
            return response()->json(['message' => 'Invoice not found.'], 404);
        }

        $invoice->customer_id = $request->customer_id;
        $invoice->product_name = $request->product_name;
        $invoice->num_of_items = $request->num_of_items;
        $invoice->price = $request->price;
        $invoice->total = $request->total;
        $invoice->cash = $request->cash;
        $invoice->date = $request->date;
        $invoice->save();

        return back()->with('success', 'Customer details updated successfully.');
    }

    public function deleteInvoice(Request $request)
    {
        $request->validate([
            'invoice_id' => 'required|exists:invoices,invoice_id',
        ]);

        try {
            $invoice = Invoice::findOrFail($request->invoice_id);
            $invoice->delete();

            return response()->json(['message' => 'Invoice deleted successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while deleting the invoice'], 500);
        }
    }

    public function invoiceReceiptPDF($invoice_id)
    {
        $invoiceId = base64_decode($invoice_id);
        $invoice = Invoice::findOrFail($invoiceId);
        $customer = Customer::findOrFail($invoice->customer_id);
        $invoices = Invoice::where('customer_id', $invoice->customer_id)
                      ->where('date', $invoice->date)
                      ->get();

        $pdfView = View::make('pages.invoice-receipt-pdf', compact('invoice', 'invoices', 'customer'));

        $pdfContent = Pdf::loadHTML($pdfView->render());

        return $pdfContent->stream('invoice_receipt_' . $invoiceId . '.pdf');
    }
}
