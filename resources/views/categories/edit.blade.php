@extends("layouts.inventory")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Edit Category</strong>&nbsp;&nbsp;
                    <a href="{{url('/category/create')}}"><i class="fa fa-plus"></i> New</a>
                    <a href="{{url('/category')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>

                </div>
                <div class="card-block">
                    @if(Session::has('sms'))
                        <div class="alert alert-success" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms')}}
                            </div>
                        </div>
                    @endif
                    @if(Session::has('sms1'))
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div>
                                {{session('sms1')}}
                            </div>
                        </div>
                    @endif
                    <form action="{{url('/category/update')}}" class="form-horizontal" method="post" onsubmit="return confirm('You want to save changes?')">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group row">
                                    <label for="name" class="control-label col-sm-3 lb">Name <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$category->name}}" id="name" name="name" required>
                                        <input type="hidden" name="id" value="{{$category->id}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="parent" class="control-label col-sm-3 lb">Parent</label>
                                    <div class="col-sm-8">
                                        <select name="parent" id="parent" class="form-control">
                                            <option value="0">&nbsp;</option>
                                            @foreach($categories as $cat)
                                                <option value="{{$cat->id}}" {{$cat->id==$category->parent_id?'selected':''}}>{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                        <p>
                                            <br>
                                            <button class="btn btn-primary btn-flat" type="submit">Save</button>
                                            <button class="btn btn-danger btn-flat" type="reset">Cancel</button>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">

                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset("chosen/chosen.jquery.js")}}"></script>
    <script src="{{asset("chosen/chosen.proto.js")}}"></script>
    <script>
        $(document).ready(function () {
            $("#siderbar li a").removeClass("current");
            $("#category").addClass("current");
            $("select").chosen();
        })
    </script>

@endsection