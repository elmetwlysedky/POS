<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Invoice as ModelsInvoice;
use App\Models\InvoiceOrder;
use App\Models\Product;
use App\Models\Stock;
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
        'selectedProducts.*.typeProduct' => 'required|string',
        'client' => 'required|numeric|exists:clients,id',
        'type'=> 'required|numeric|in:0,1',
        'discount' => 'nullable|numeric|min:0|max:100',
    ];
//

    public function render()
    {
        $num = ModelsInvoice::latest()->first();
        $this->invoice_num = $num->invoice_number +1;

        $data['products'] = Product::get();
        $data['clients'] =Client::get();

        return view('livewire.invoice',$data);

    }

    public function mount()
    {
        $this->products = Product::all();
    }

    public function calculateQuantityStock(){



    }

    public function updatedSelectedProducts()
    {
        foreach ($this->selectedProducts as $index => $selectedProduct) {
            $product = Product::findOrFail($selectedProduct['id']);

            if ($product && $this->type ==0) {
                $this->selectedProducts[$index]['productPrice'] = $product->selling_price;
                $this->selectedProducts[$index]['totalPrice'] = $product->selling_price * $selectedProduct['quantity'];
           }elseif($product && $this->type ==1){
                $this->selectedProducts[$index]['productPrice'] = $product->Purchasing_price;
                $this->selectedProducts[$index]['totalPrice'] = $product->Purchasing_price * $selectedProduct['quantity'];

            } else {
                $this->selectedProducts[$index]['productPrice'] = null;
                $this->selectedProducts[$index]['totalPrice'] = null;

            }

        }
    }


    public function calculateInvoiceTotal()
    {
        $invoiceTotal = 0;
        foreach ($this->selectedProducts as $product) {
            $invoiceTotal += $product['totalPrice'];
        }

        if ($this->discount) {
            $invoiceTotal *= (1 - ($this->discount / 100));
        }

        return number_format($invoiceTotal, 2, '.', '') ;
    }


    public function saveTotalInvoice()
    {
        $this->validate();
        $this->invoiceTotal = $this->calculateInvoiceTotal();
    }

    public function saveInvoice(){

        $this->validate();
        $this->invoiceTotal = $this->calculateInvoiceTotal();
        foreach ($this->selectedProducts as $selectedProduct) {
            $productId = $selectedProduct['id'];
            $QuantityRequired =$selectedProduct['quantity'];
            $stockItem = Stock::where('product_id', $productId)->first();
            $stockQuantity = $stockItem->quantity;

            if (! $stockItem){
                throw new \Exception("Product with ID $productId does not exist in the stock.");
            }


            if ($QuantityRequired <= $stockQuantity && $this->type ==0){ // بيع

                $stockItem->quantity -= $QuantityRequired;
                $stockItem->save();
            }elseif ($this->type ==1){ // شراء
                $stockItem->quantity += $QuantityRequired;
                $stockItem->save();
            }else{
                session()->flash('error', 'Selected product '. $productId. ' is not available in stock.');
                return redirect()->back();
            }
        }
        $invoice = new \App\Models\Invoice();

        $invoice ->client_id = $this->client;
        $invoice ->user_id = Auth::user()->id;
        $invoice ->invoice_number = $this->invoice_num;
        $invoice ->type =$this->type;
        $invoice ->discount = $this->discount;
        $invoice ->total = $this->invoiceTotal;
        $invoice ->save();

        foreach ($this->selectedProducts as $selectedProduct){
            $invoice_order = new InvoiceOrder();
            $invoice_order->invoice_id = $invoice->id;
            $invoice_order->product_id = $selectedProduct['id'];
            $invoice_order->quantity =$selectedProduct['quantity'];
            $invoice_order->type = $selectedProduct['typeProduct'];
            $invoice_order->price = $selectedProduct['totalPrice'];
            $invoice_order->save();

            session()->flash('success', __('main.added_success'));
            $this->formReset();
            $this->invoiceTotal = null;

        }
    }



    public function formReset(){
        $this->client = null;
        $this->type = null;
        $this->selectedProducts = [];
        $this->discount = null;
        $this->totalPrice = null;
    }

    public function addProduct()
    {
        $this->selectedProducts[] = ['id' => null, 'quantity' => 1,'typeProduct'=>null];
    }

    public function removeProduct($index)
    {

        unset($this->selectedProducts[$index]);
        $this->selectedProducts = array_values($this->selectedProducts);
    }




}
