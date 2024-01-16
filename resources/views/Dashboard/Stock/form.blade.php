
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <fieldset class="mb-3">
            <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

            <div class="form-group row">

                <div class="col-md-4">
                    <div class="form-group">

                        <label class="col-form-label col-lg-3">{{__('main.products')}}<span class="text-danger">*</span></label>
                        <div class="col-md-12">
                            {!! Form::select('product_id', $products,null,[
                            'class'=>'form-control js-example-basic-multiple '
                            ]) !!}
                        </div>
                    </div>
                </div>


                    <div class="col-md-7">
                        <div class="form-group">
                            <label class="col-form-label col-sm-auto">{{__('main.quantity')}}<span class="text-danger">*</span></label>
                            <div class="col-sm-3">
                                {!!Form::number('quantity',null,['class'=>'form-control'])!!}
                            </div>
                        </div>

                    </div>
            </div>

        </fieldset>
