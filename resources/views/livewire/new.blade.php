<div>
    <h1>Invoice</h1>


    @if(Session::has('success'))

        <div class="alert alert-success border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            <span class="font-weight-semibold">{{session('success')}}</span>
        </div>
    @endif

    <div class="form-group row">

        <div class=" container text-center">
            <h5 class="text-primary mb-2 mt-md-2">{{__('main.employee')}} : {{Auth::user()->name}} </h5>
            <h5 class="text-primary mb-2 mt-md-2">{{__('main.invoice_num')}} : {{$invoice_num}}</h5>

        </div>
    </div>


    <div class="form-group row">

        <div class="mb-4">
            <label class="col-form-label col-sm-auto">{{__('main.client')}}<span class="text-danger">*</span></label>
            <div class="col-sm-12">

                <select wire:model="client" class="form-control">
                    <option selected > </option>
                    @foreach($clients as $client)
                        <option value="{{$client->id}}"> {{$client->name}}</option>
                    @endforeach
                </select>

                @error('$client') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>



        <div class="mb-4">
            <label class="col-form-label col-sm-auto">{{__('main.type')}} {{__('main.invoice')}}<span
                    class="text-danger">*</span></label>
            <div class="col-sm-12">

                <select wire:model="type" class="form-control">
                    <option selected > </option>

                    <option value=0> بيع</option>
                    <option value=1> شراء</option>

                </select>
                @error('type') <span class="text-red-500">{{$message}}</span> @enderror

            </div>
        </div>

    </div>



    <form wire:submit.prevent="saveInvoice">

{{--        <div class="form-group row">--}}

{{--            <div class="col-md-4">--}}
{{--            <div class="form-group">--}}
{{--                <label class="col-form-label col-sm-auto">{{__('main.products')}}<span class="text-danger">*</span></label>--}}

{{--                <div wire:ignore>--}}
{{--                    <select id="product" class="form-control">--}}
{{--                        @foreach ($products as $product)--}}
{{--                            <option value="{{ $product->id }}">{{ $product->name }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--                @error('selectedProducts.*.id') <span class="text-red-500">{{ $message }}</span> @enderror--}}
{{--            </div>--}}
{{--        </div>--}}

{{--            <div class="col-md-2">--}}
{{--                <div class="form-group">--}}
{{--                    <label class="col-form-label col-sm-auto"> {{__('main.quantity')}}<span class="text-danger">*</span></label>--}}
{{--                    <input type="number" wire:model="selectedProducts.quantity" class="form-control">--}}
{{--                @error('selectedProducts.quantity')--}}
{{--                <span class="text-red-500">{{ $message }}</span>--}}
{{--                @enderror--}}
{{--                </div>--}}
{{--            </div>--}}


{{--            <div class="col-md-2">--}}
{{--                <div class="form-group">--}}
{{--                    <label class="col-form-label col-sm-auto"> {{__('main.type')}}<span class="text-danger">*</span></label>--}}
{{--                    <!-- <div class="col-sm-7"> -->--}}
{{--                    <input type="text" wire:model="selectedProducts.typeProduct" class="form-control">--}}
{{--                    @error('selectedProducts.typeProduct') <span class="text-red-500">{{$message}}</span> @enderror--}}
{{--                    <!-- </div> -->--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-md-2">--}}
{{--                <div class="form-group">--}}
{{--                    <label class="col-form-label col-sm-auto"> {{__('main.price')}}<span class="text-danger"></span></label>--}}
{{--                    <!-- <div class="col-sm-7"> -->--}}
{{--                    <input type="number" wire:model="productPrice" value="{{ $productPrice ? '$' . $productPrice : 'N/A' }}"  class="form-control" readonly id="price">--}}
{{--                    <!-- </div> -->--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="col-md-2">--}}
{{--                    <div class="form-group">--}}
{{--                        <label class="col-form-label col-sm-auto"> {{__('main.total')}}<span class="text-danger"></span></label>--}}
{{--                        <!-- <div class="col-sm-7"> -->--}}
{{--                        <input type="number"  wire:model="totalPrice" value="{{ $totalPrice ? '$' . $totalPrice : 'N/A' }}"  class="form-control" readonly id="total">--}}
{{--                        <!-- </div> -->--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--        </div>--}}


        @include('livewire.items')


        <div>
            <label class="col-form-label col-sm-auto"> {{__('main.discount')}} (%):</label>
            <div class="col-sm-2">
            <input type="number" wire:model="discount" id="discount"  class="form-control" >
            </div>
            @error('discount') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="col-form-label col-sm-auto"> {{__('main.total')}}</label>
            <div class="col-sm-2">
                <input type="number" wire:model="invoiceTotal" readonly class="form-control" >
            </div>
        </div>


        <div class="col-form-label col-sm-auto">
            <button type="submit" class="btn btn-primary">{{__('main.save')}}</button>
        </div>
    </form>
</div>
