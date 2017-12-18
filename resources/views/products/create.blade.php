@extends("layouts.inventory")
@section("content")
<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <strong>Create new product</strong>&nbsp;&nbsp;
                    <a href="{{url('/product')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>
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
                    <form action="{{url('/product/save')}}" class="form-horizontal" method="post" enctype="multipart/form-data" onsubmit="return confirm('You want to save?')">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group row">
                                    <label for="company_id" class="control-label col-sm-3 lb">Category</label>
                                    <div class="col-sm-8">
                                       <select class="form-control" id="category_id" name="category_id">
                                            <option value="0">Not set</option>
                                            @foreach($categories as $cat)
                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                       </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="code" class="control-label col-sm-3 lb">Code</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{old('barcode')}}" name="barcode" id="barcode">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="control-label col-sm-3 lb">Name <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="control-label col-sm-3 lb">Description <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <textarea type="text" class="form-control" id="description" name="description">
                                            {{old('description')}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="control-label col-sm-3 lb">Price <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{old('price')}}" id="price" name="price" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="control-label col-sm-3 lb"></label>
                                    <div class="col-sm-8">
                                        <button class="btn btn-primary btn-flat" type="submit">Save</button>
                                        <button class="btn btn-danger btn-flat" type="reset">Cancel</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <input type="file" class="form-control" id="pimg" name="pimg" onchange="loadFile(event)">
                                <br>
                                <img src="{{asset("uploads/products/default.png")}}" alt="photo" width="120" id="preview">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function loadFile(e){
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(e.target.files[0]);
        }
    </script>
@endsection