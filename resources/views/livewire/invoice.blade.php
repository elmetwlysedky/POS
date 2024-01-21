<div>



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

                @error('client') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>



        <div class="mb-4">
            <label class="col-form-label col-sm-auto">{{__('main.type')}} {{__('main.invoice')}}
                <span class="text-danger">*</span></label>
            <div class="col-sm-12">

                <select wire:model="type" class="form-control">
                    <option selected > </option>

                    <option value=0> بيع</option>
                    <option value=1> شراء</option>

                </select>
                @error('type') <span class="text-danger">{{$message}}</span> @enderror

            </div>
        </div>

    </div>


    @if($invoiceTotal == null)
        <form wire:submit.prevent="saveTotalInvoice">
    @else
        <form wire:submit.prevent="saveInvoice">
    @endif

        @include('livewire.items')


        <div>
            <label class="col-form-label col-sm-auto"> {{__('main.discount')}} (%):</label>
            <div class="col-sm-2">
            <input type="number" wire:model="discount" id="discount"  class="form-control" >
            </div>
            @error('discount') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="col-form-label col-sm-auto"> {{__('main.total')}}</label>
            <div class="col-sm-2">
{{--                <p>Total Price: <strong>{{ $invoiceTotal  }}</strong></p>--}}

                <input type="number" wire:model="invoiceTotal" readonly class="form-control" >
            </div>
        </div>



        @if($invoiceTotal == null)
        <div class="col-form-label col-sm-auto">
            <button type="submit"  class="btn btn-primary">{{__('main.save')}}</button>
        </div>
        @else
            <div class="col-form-label col-sm-auto">
                <button type="submit" class="btn btn-success">{{__('main.save')}}</button>
            </div>
        @endif

    </form>
    @if(Session::has('success'))

        <div class="alert alert-success border-0 alert-dismissible">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            <span class="font-weight-semibold">{{session('success')}}</span>
        </div>
    @endif
    @if(Session::has('error'))

                    <div class="alert alert-warning border-0 alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                        <span class="font-weight-semibold">{{session('error')}}</span>
                    </div>
    @endif

</div>


