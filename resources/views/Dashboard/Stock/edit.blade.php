@extends('Dashboard.Layouts.master')

@section('title')
    {{__('main.edit')}} {{$stock->product->name}}
@endsection


@section('content')



    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">{{__('main.edit')}} {{$stock->product->name}}</h5>
        </div>

        <div class="card-body">
            <p class="mb-4"></p>
            {!! Form::model($stock,['route'=>['stock.update',$stock->id],
            'class'=>'form-validate-jquery' ,'method'=>'PATCH']) !!}

            @include('Dashboard.Stock.form')

            <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b>
                    <i class="icon-plus3"></i></b>{{__('main.update')}}</button>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
