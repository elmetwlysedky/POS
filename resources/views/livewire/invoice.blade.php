<div>

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


    <div class="form-group row">

            <div class="col-md-4">
                <div class="form-group">
                <label class="col-form-label col-sm-auto">{{__('main.products')}}<span class="text-danger">*</span></label>
                <!-- <div class="col-sm-12"> -->


                    <select wire:model="selectedProduct" class="form-control"  id="product">
                        <option value="">-- Select a product --</option>
                        @foreach($products as $product)
                            <option value="{{$product->id}}"> {{$product->name}}</option>
                        @endforeach
                    </select>
                    @error('selectedProduct') <span class="text-red-500">{{$message}}</span> @enderror

                <!-- </div> -->
                </div>
            </div>


            <div class="col-md-2">
                <div class="form-group">
                <label class="col-form-label col-sm-auto"> {{__('main.quantity')}}<span class="text-danger">*</span></label>
                <!-- <div class="col-sm-7"> -->
                    <input type="number" min="1" wire:model="quantity" class="form-control">
                    @error('quantity') <span class="text-red-500">{{$message}}</span> @enderror

                <!-- </div> -->
                </div>

            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <label class="col-form-label col-sm-auto"> {{__('main.type')}}<span class="text-danger">*</span></label>
                    <!-- <div class="col-sm-7"> -->
                    <input type="text" wire:model="typeProduct" class="form-control">
                    @error('typeProduct') <span class="text-red-500">{{$message}}</span> @enderror

                    <!-- </div> -->
                </div>

            </div>

            <div class="col-md-2">
                <div class="form-group">
                <label class="col-form-label col-sm-auto"> {{__('main.price')}}<span class="text-danger"></span></label>
                <!-- <div class="col-sm-7"> -->
                    <input type="number" wire:model="productPrice" value="{{ $productPrice ? '$' . $productPrice : 'N/A' }}"  class="form-control" readonly id="price">
                <!-- </div> -->
                </div>
            </div>


        <div class="col-md-2">
            <div class="form-group">
                <label class="col-form-label col-sm-auto"> {{__('main.total')}}<span class="text-danger"></span></label>
                <!-- <div class="col-sm-7"> -->
                <input type="number"  wire:model="totalPrice" value="{{ $totalPrice ? '$' . $totalPrice : 'N/A' }}"  class="form-control" readonly id="total">
                <!-- </div> -->
            </div>
        </div>


    </div>

    <button wire:click="saveInvoice" class="btn btn-primary">{{__('main.save')}}</button>


{{--    <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-plus3"></i></b>{{__('main.save')}}</button>--}}



</div>
