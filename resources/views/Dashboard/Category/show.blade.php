@extends('Dashboard.Layouts.master')

@section('title')
    {{__('main.products')}}
@endsection

@section('content')

    <!-- Content area -->
    <div class="card">
        <div class="card-header header-elements-inline">
                        <h5 class="card-title">{{__('main.table')}} {{__('main.products')}}  {{$category->name}} : {{$products->count()}}</h5>
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
            <a href="{{route('product.create')}}">
                <button class="btn bg-teal "><b><i class="icon-plus3"></i></b>
                    Create
                </button>
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
        @if($category->products->count()>0 )

            <table class="table datatable-basic">
                <thead>
                <td></td>
                <tr>
                    <th>{{__('main.name')}}</th>
                    <th>{{__('main.image')}}</th>
                    <th>{{__('main.description')}}</th>
                    <th>{{__('main.Purchasing_price')}}</th>
                    <th>{{__('main.selling_price')}}</th>
                    <th>{{__('main.barcode')}}</th>
                    <th>{{__('main.categories')}}</th>
                    <th>{{__('main.actions')}}</th>
                </tr>
                </thead>

                <div>
                    <tbody>
                    @foreach ($products as $item )
                        <tr>
                            <td>{{$item->name}}</td>
                            @if($item->image == null)
                                <td><img src="/storage/NOproduct.png" alt="" class="img-preview rounded"  style="width: 70px;height: 50px;"></td>
                            @else
                                <td><img src="/storage/{{$item->image}}" alt="" class="img-preview rounded"  style="width: 70px;height: 50px;"></td>
                            @endif
                            <td>{{Str::limit($item->description,150,'.....')}}</td>
                            <td>{{$item->Purchasing_price}}</td>
                            <td>{{$item->selling_price}}</td>
                            <td>{{$item->barcode}}</td>
                            <td>{{$item->category->name}}</td>

                            <td>
                                <div class="list-icons">
                                    <div class="list-icons-item dropdown">
                                        <a href="#" class="list-icons-item caret-0 dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>

                                        <div class="dropdown-menu ">
                                            <a href="{{route('product.show',$item->id)}}" class="dropdown-item"><i class="icon-file-eye2 mr-3 icon"></i> {{__('main.show')}} </a>
                                            <a href="{{route('product.edit',$item->id)}}" class="dropdown-item"><i class="icon-pencil7"></i> {{__('main.edit')}} </a>

                                            <form action="{{route('product.destroy',$item->id)}}" method="POST"  >
                                                @csrf
                                                @method('DELETE')

                                                <button class="dropdown-item" type="submit"><i class="icon-bin"> </i>{{__('main.delete')}}</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </div>

                @endforeach



                @else
                    <div class="card card-body border-top-1 border-top-pink text-center">
                        <h2>
                            this category is empty products
                        </h2>
                    </div>
                @endif
            </table>

            <!-- /media library -->


            <!-- /content area -->
            <div class="card card-body border-top-1 border-top-pink text-center">
                <ul class="pagination pagination-separated align-self-center">
                    {!! $products->links() !!}

                </ul>
            </div>
    </div>
@endsection

