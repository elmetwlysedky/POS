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
            {!!Form::text('name',null,['class'=>'form-control'])!!}
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.phone')}}<span class="text-danger"></span></label>
        <div class="col-lg-9">
            {!!Form::number('phone',null,['class'=>'form-control'])!!}

        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.address')}}<span class="text-danger"></span></label>
        <div class="col-lg-9">
            {!!Form::text('address',null,['class'=>'form-control'])!!}

        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.notes')}}<span class="text-danger"></span></label>
        <div class="col-lg-9">
            {!!Form::textarea('notes',null,['class'=>'form-control'])!!}

        </div>
    </div>

</fieldset>


