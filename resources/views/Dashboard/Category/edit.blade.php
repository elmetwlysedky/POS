@extends('Dashboard.Layouts.master')

@section('title')
    {{__('main.edit')}} {{$category->name}}
@endsection


@section('content')



    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">{{__('main.edit')}} {{$category->name}}</h5>
        </div>

        <div class="card-body">
            <p class="mb-4"></p>
            {!! Form::model($category,['route'=>['category.update',$category->id],
            'class'=>'form-validate-jquery','method'=>'PATCH','enctype'=>'multipart/form-data'])!!}

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
             @endif
                @include('Dashboard.Category.form')
            <button type="submit" class="btn bg-teal-400 btn-labeled btn-labeled-right"><b><i class="icon-plus3"></i></b>{{__('main.update')}}</button>

            {!! Form::close() !!}
        </div>
    </div>
@endsection
