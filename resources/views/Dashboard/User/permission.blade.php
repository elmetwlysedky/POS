
@extends('Dashboard.Layouts.master')

@section('title')
    {{__('main.permissions')}}  {{$user->name}}
@endsection

@section('content')


    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">  {{__('main.permissions')}}  {{$user->name}}</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <p class="mb-4"><strong></strong> <code></code></p>
            {!!Form::open(['route'=>'permission.store', 'class'=>'form-validate-jquery','method'=>'post'])!!}

                <input type="hidden" name="user_id" value="{{$user->id}}">

                    <div class="form-group row">

                        <label class="col-lg-3 col-form-label">{{__('main.roles')}} <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            @foreach($roles as $role)
                                <div class="form-check ">
                                    <label class="form-check-label">
                                        {!!  Form::radio('role_id[]', $role->id,['class'=>'form-check-input'])!!}
{{--                                        <input type="checkbox" name="permissions[]" class="form-check-input" value="{{$item->id}}">--}}
                                        {{__($role->name)}}
                                    </label>
                                </div>

                            @endforeach
                        </div>
                    </div>


                    <div class="form-group row">

                        <label class="col-lg-3 col-form-label">{{__('main.permissions')}} <span class="text-danger">*</span></label>
                        <div class="col-lg-9">
                            @foreach($permission as $item)
                                <div class="form-check ">
                                    <label class="form-check-label">
                                        {!!  Form::checkbox('permission_id[]', $item->id,['class'=>'form-check-input'])!!}
                                        {{--                                        <input type="checkbox" name="permissions[]" class="form-check-input" value="{{$item->id}}">--}}
                                        {{__($item->name)}}
                                    </label>
                                </div>

                            @endforeach
                        </div>
                    </div>



            <button type="submit" class="btn bg-teal-300 btn-labeled btn-labeled-right">
                <b><i class="icon-plus3"></i></b>{{__('main.save')}}
            </button>

            {!! Form::close() !!}

        </div>
    </div>

@endsection
