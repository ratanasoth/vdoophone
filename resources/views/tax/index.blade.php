@extends("layouts.acc")
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Taxes List</strong>&nbsp;&nbsp;
                    <a href="{{url('/tax/create')}}"><i class="fa fa-plus"></i> New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Computation</th>
                            <th>Amount (%)</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $pagex = @$_GET['page'];
                            if(!$pagex)
                                $pagex = 1;
                            $i = 12 * ($pagex - 1) + 1;
                            ?>
                            @foreach($taxes as $tax)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$tax->name}}</td>
                                    <td>{{$tax->type}}</td>
                                    <td>{{$tax->computation}}</td>
                                    <td>{{$tax->amount}}</td>
                                    <td>
                                        <a href="{{url('/tax/edit/'.$tax->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                        <a href="{{url('/tax/delete/'.$tax->id."?page=".@$_GET["page"])}}" onclick="return confirm('You want to delete?')"
                                           title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav>
                       {{$taxes->links()}}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function () {
            $("#siderbar li a").removeClass("current");
            $("#tax").addClass("current");
        })
    </script>

@endsection