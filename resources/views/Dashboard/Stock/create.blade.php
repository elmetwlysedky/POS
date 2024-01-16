@extends('Dashboard.Layouts.master')

@section('title')
    {{__('main.add_products_to_stock')}}
@endsection

@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title"> {{__('main.add_products_to_stock')}}
            </h5>
        </div>

        <div class="card-body">
            <p class="mb-4"></p>
            {!! Form::open(['route'=>'stock.store', 'class'=>'form-validate-jquery','method'=>'post']) !!}

            @include('Dashboard.stock.form')

            <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-plus3"></i></b>{{__('main.add')}}</button>

            {!! Form::close() !!}
        </div>
    </div>
@endsection

