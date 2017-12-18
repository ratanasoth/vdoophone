@extends("layouts.inventory")
@section("content")
<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Product List</strong>&nbsp;&nbsp;
                    <a href="{{url('/product/create')}}"><i class="fa fa-plus"></i> New</a>
                </div>
                <div class="card-block">
                </div>
            </div>
        </div>
    </div>
@endsection