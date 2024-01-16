@extends('Dashboard.Layouts.master')

@section('title')
    {{__('main.edit')}} {{$client->name}}
@endsection


@section('content')



    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">{{__('main.edit')}} {{$client->name}}</h5>
        </div>

        <div class="card-body">
            <p class="mb-4"></p>

            {!! Form::model($client,['route'=>['client.update',$client->id],'class'=>'form-validate-jquery' ,'method'=>'PATCH']) !!}

                @include('Dashboard.Client.form')

                <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right">
                <b><i class="icon-plus3"></i></b>{{__('main.update')}}</button>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
