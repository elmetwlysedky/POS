@extends('Dashboard.Layouts.master')

@section('title')
    {{__('main.add')}} {{__('main.invoice')}}
@endsection

@section('content')
    <div class="card">
        <div class="card-body">


        @livewire('invoice')

        </div>
    </div>
@endsection


