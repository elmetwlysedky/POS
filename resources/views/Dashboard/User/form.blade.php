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



    <!-- Basic text input -->
    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.name')}} <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            {!!Form::text('name',null,['class'=>'form-control'])!!}
        </div>
    </div>
    <!-- /basic text input -->


    <!-- Email field -->
    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.email')}} <span class="text-danger">*</span></label>
        <div class="col-lg-9">
            {!!Form::email('email',null,['class'=>'form-control'])!!}
        </div>
    </div>
    <!-- /email field -->


    <!-- Password field -->
    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.password')}}  <span class="text-danger">*</span></label>
        <div class="col-lg-9">

            {!!Form::password('password',['class'=>'form-control'])!!}

        </div>
    </div>
    <!-- /password field -->

    <!-- Repeat password -->
    <div class="form-group row">
        <label class="col-form-label col-lg-3">{{__('main.confirm')}} <span class="text-danger">*</span></label>
        <div class="col-lg-9">


            {!!Form::password('password_confirmation',['class'=>'form-control'])!!}

        </div>
    </div>

{{--    <legend class="text-uppercase font-size-sm font-weight-bold">{{__('main.permissions')}}</legend>--}}


{{--    <!-- Basic text input -->--}}
{{--    <div class="form-group row">--}}
{{--        <label class="col-form-label col-lg-3">{{__('main.name')}} <span class="text-danger">*</span></label>--}}
{{--        <div class="col-lg-9">--}}
{{--            {!!Form::text('user_type',null,['class'=>'form-control'])!!}--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <!-- /basic text input -->--}}


{{--        <div class="form-group row">--}}

{{--            <label class="col-lg-3 col-form-label">{{__('main.permissions')}} <span class="text-danger">*</span></label>--}}
{{--            <div class="col-lg-9">--}}
{{--                @foreach($permission as $item)--}}
{{--                    <div class="form-check ">--}}
{{--                        <label class="form-check-label">--}}
{{--                            {!!  Form::checkbox('permissions[]', $item,['class'=>'form-check-input'])!!}--}}
{{--                            <input type="checkbox" name="permissions[]" class="form-check-input" value="{{$item->id}}">--}}
{{--                            {{__($item->name)}}--}}
{{--                        </label>--}}
{{--                    </div>--}}

{{--                @endforeach--}}


{{--            </div>--}}
{{--        </div>--}}


</fieldset>

