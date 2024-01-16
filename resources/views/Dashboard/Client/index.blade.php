@extends('Dashboard.Layouts.master')

@section('title')
    {{__('main.clients')}}
@endsection

@section('content')

    <!-- Content area -->
    <div class="card">
        <div class="card-header header-elements-inline">
            <h5 class="card-title">{{__('main.table')}} {{__('main.clients')}} : {{$clients->count()}}</h5>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="collapse"></a>
                    <a class="list-icons-item" data-action="reload"></a>
                    <a class="list-icons-item" data-action="remove"></a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <code></code><strong> </strong>
            <a href="{{route('client.create')}}">
                <button class="btn bg-teal "><b><i class="icon-plus3"></i></b>
                    Create
                </button>
            </a>

            <a href="" class="btn btn-link btn-float font-size-sm font-weight-semibold text-default">
                <i class="icon-calendar5 text-pink-300"></i>
                <span>Trashed</span>
            </a>
        </div>
        <div class="container">
            @if(Session::has('success'))

                <div class="alert alert-success border-0 alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    <span class="font-weight-semibold">{{session('success')}}</span>
                </div>

            @elseif(Session::has('delete'))
                <div class="alert alert-danger border-0 alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
                    <span class="font-weight-semibold ">{{session('delete')}}</span>
                </div>

            @endif
        </div>

        <table class="table datatable-basic">
            <thead>
            <tr>
                <th>{{__('main.name')}}</th>
                <th>{{__('main.phone')}}</th>
                <th>{{__('main.address')}}</th>
                <th>{{__('main.notes')}}</th>
                <th>{{__('main.actions')}}</th>
            </tr>
            </thead>
            <div>

                <tbody>

                @isset($clients)
                    @foreach ($clients as $item )
                        <tr>

                            <td>{{$item->name}}</td>
                            <td>{{$item->phone}}</td>
                            <td>{{$item->address}}</td>
                            <td>{{Str::limit($item->notes,100,'.....')}}


                            <td>
                                <div class="list-icons">
                                    <div class="list-icons-item dropdown">
                                        <a href="#" class="list-icons-item caret-0 dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu ">
                                            <a href="{{route('client.show',$item->id)}}" class="dropdown-item"><i class="icon-file-eye2 mr-3 icon"></i> {{__('main.show')}} </a>
                                            <a href="{{route('client.edit',$item->id)}}" class="dropdown-item"><i class="icon-pencil7"></i> {{__('main.edit')}} </a>

                                            <div class="dropdown-divider"></div>
                                            <form action="{{route('client.destroy',$item->id)}}" method="POST"  >
                                                @csrf
                                                @method('DELETE')

                                                <button class="dropdown-item" type="submit"><i class="icon-bin"> </i>{{__('main.delete')}}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                @endisset
                </tbody>
            </div>

        </table>

        <!-- /media library -->


        <!-- /content area -->
        <div class="card card-body border-top-1 border-top-pink text-center">
            <ul class="pagination pagination-separated align-self-center">
                {!! $clients->links() !!}

            </ul>
        </div>

@endsection






