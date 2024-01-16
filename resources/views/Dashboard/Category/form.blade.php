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
        <label class="col-form-label col-lg-3">{{__('main.description')}}<span class="text-danger"></span></label>
        <div class="col-lg-9">
            {!!Form::text('description',null,['class'=>'form-control'])!!}

        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.image')}}<span class="text-danger"></span></label>
        <div class="col-lg-9">
            {!! Form::file('image',null,['class'=>'form-control']) !!}
        </div>
    </div>
