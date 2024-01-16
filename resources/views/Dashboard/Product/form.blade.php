
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
        <label class="col-form-label col-lg-3">{{__('main.name')}}<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
    </div>


    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.categories')}}<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            {!! Form::select('category_id', $categories,null,[
            'class'=>'js-example-basic-multiple form-control','placeholder' => '...'
            ]) !!}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.description')}}<span class="text-danger"></span></label>
        <div class="col-lg-9">
            {!! Form::textarea('description',null,['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.barcode')}}<span class="text-danger">*</span></label>
        <div class="col-lg-9">
            {!!Form::text('barcode',null,['class'=>'form-control'])!!}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.price')}}<span class="text-danger">*</span></label>

        <label class="col-form-label col-sm-auto">{{__('main.Purchasing_price')}}<span class="text-danger">*</span></label>
        <div class="col-sm-3">
            {!! Form::number('Purchasing_price',null,['class'=>'form-control']) !!}
        </div>

        <label class="col-form-label col-sm-auto">{{__('main.selling_price')}}<span class="text-danger">*</span></label>
        <div class="col-sm-3">
            {!!Form::number('selling_price',null,['class'=>'form-control'])!!}

        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.image')}}<span class="text-danger"></span></label>
        <div class="col-lg-9">
            {!! Form::file('image',null,['class'=>'form-control']) !!}
        </div>
    </div>



</fieldset>
