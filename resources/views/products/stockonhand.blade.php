@extends("layouts.inventory")
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Stock on hand</strong>&nbsp;&nbsp;
                    <a href="{{url('/product/create')}}"><i class="fa fa-plus"></i> New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>Product Code</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($onhands as $onhand)
                            <tr>
                                <td>{{$onhand->barcode}}</td>
                                <td>{{$onhand->name}}</td>
                                <td>{{$onhand->quantity}}</td>
                                <td></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection