<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Invoice as ModelsInvoice;
use App\Models\InvoiceOrder;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Validation\Rule;

class Invoice extends Component
{

    public $invoice_num;
    public $client;
    public $invoiceTotal;
    public $type;
    public $discount ;
    public $productPrice ;
    public $selectedProducts = [] ;
    public $products = [];

    protected $rules =[

        'selectedProducts.*.id' => 'required|numeric|exists:products,id',
        'selectedProducts.*.quantity'=> 'required|integer|min:1',
        'selectedProducts.*.typeProduct' => 'string',
        'client' => 'required|numeric|exists:clients,id',
        'type'=> 'required|numeric|in:0,1',
        'discount' => 'nullable|numeric|min:0|max:100',
    ];


    public function render()
    {
        $num = ModelsInvoice::latest()->first();
        $this->invoice_num = $num->invoice_number +1;

        $data['products'] = Product::get();
        $data['clients'] =Client::get();

        return view('livewire.new',$data);

    }

    public function mount()
    {
        $this->products = Product::all();
    }


    public function updatedSelectedProducts()
    {
        foreach ($this->selectedProducts as $index => $selectedProduct) {
            $product = Product::findOrFail($selectedProduct['id']);

            if ($product) {
                $this->selectedProducts[$index]['productPrice'] = $product->selling_price;
                $this->selectedProducts[$index]['totalPrice'] = $product->selling_price * $selectedProduct['quantity'];

            } else {
                $this->selectedProducts[$index]['productPrice'] = null;
                $this->selectedProducts[$index]['totalPrice'] = null;

            }
        }
    }


    public function calculateInvoiceTotal()
    {

        foreach ($this->selectedProducts as $product) {
            $this->invoiceTotal += $product['totalPrice'];
        }

        if ($this->discount) {
            $this->invoiceTotal *= (1 - ($this->discount / 100));
        }

//        return $invoiceTotal;
    }

    public function getFormattedInvoiceTotalProperty()
    {
        $invoiceTotal = $this->calculateInvoiceTotal();

        return '$' . number_format($invoiceTotal, 2);
    }


    public function saveInvoice()
    {
        $this->validate();

        $invoiceTotal = $this->calculateInvoiceTotal();

        // Save the invoice or perform any necessary actions

        // Reset form fields
//        $this->selectedProducts = [];
//        $this->discount = null;

        session()->flash('success', 'Invoice saved successfully.');
    }

//    public function saveInvoice(){
//
//        $this->validate();
//
//        $invoice = new \App\Models\Invoice();
//
//        $invoice ->client_id = $this->client;
//        $invoice ->user_id = Auth::user()->id;
//        $invoice ->invoice_number = $this->invoice_num;
//        $invoice ->type =$this->type;
//        $invoice ->discount = $this->discount;
//        $invoice ->total = $this->totalPrice;
//        $invoice ->save();
//
//        $invoice_order = new InvoiceOrder();
//        $invoice_order->invoice_id = $invoice->id;
//        $invoice_order->product_id = $this->selectedProduct;
//        $invoice_order->quantity =$this->quantity;
//        $invoice_order->type = $this->typeProduct;
//        $invoice_order->price = $this->totalPrice;
//        $invoice_order->save();
//
//        session()->flash('success', __('main.added_success'));
//        $this->formReset();
//    }







    public function saveInvoiceNew(){

        $this->validate();

//        $invoice = new \App\Models\Invoice();

//        $this->invoiceTotal = 0;
        foreach ($this->selectedProducts as $index => $product) {
            $selectedProduct = Product::find($product['id']);
            $product['name'] = $selectedProduct->name;
            $product['price'] = $selectedProduct->selling_price;
            $product['total'] = $product['price'] * $product['quantity'];
            $this->invoiceTotal += $product['total'];
            $this->selectedProducts[$index] = $product;
        }

        if ($this->discount) {
            $this->invoiceTotal *= (1 - ($this->discount / 100));
        }

        // Save the invoice or perform any necessary actions

        // Reset form fields
        $this->selectedProducts = [];
        $this->discount = null;
    }


    public function formReset(){
        $this->client = null;
        $this->type = null;
        $this->productPrice =null;
        $this->selectedProduct = null;
        $this->quantity = null;
        $this->typeProduct = null;
        $this->discount = null;
        $this->totalPrice = null;
    }

    public function addProduct()
    {
        $this->selectedProducts[] = ['id' => null, 'quantity' => 1,'typeProduct'=>null];
    }

    public function removeProduct($index)
    {
        $this->formReset($index);
        unset($this->selectedProducts[$index]);
        $this->selectedProducts = array_values($this->selectedProducts);
    }

}
