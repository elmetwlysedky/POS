@extends('Dashboard.Layouts.master')

@section('title')
    {{__('main.add')}} {{__('main.products')}}
@endsection

@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">{{__('main.add')}} {{__('main.products')}}</h5>
        </div>

        <div class="card-body">
            <p class="mb-4"></p>
            {!! Form::open(['route'=>'product.store', 'class'=>'form-validate-jquery','method'=>'post','enctype'=>'multipart/form-data']) !!}

            @include('Dashboard.Product.form')

            <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-plus3"></i></b>{{__('main.add')}}</button>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
