@extends("layouts.inventory")
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Attribute List</strong>&nbsp;&nbsp;
                    <a href="{{url('/attribute/create')}}"><i class="fa fa-plus"></i> New</a>
                </div>
                <div class="card-block">
                    <table class="tbl">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Value</th>
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
                            @foreach($attributes as $attribute)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$attribute->name}}</td>
                                    <td>{{$attribute->value}}</td>
                                    <td>
                                        <a href="{{url('/attribute/edit/'.$attribute->id)}}" title="Edit"><i class="fa fa-edit text-success"></i></a>&nbsp;&nbsp
                                        <a href="{{url('/attribute/delete/'.$attribute->id."?page=".@$_GET["page"])}}" onclick="return confirm('You want to delete?')"
                                           title="Delete"><i class="fa fa-remove text-danger"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <nav>
                       {{$attributes->links()}}
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
            $("#attribute").addClass("current");
        })
    </script>

@endsection