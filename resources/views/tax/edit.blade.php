@extends("layouts.acc")
@section("content")
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Edit Tax</strong>&nbsp;&nbsp;
                   <a href="{{url('/tax/create')}}"><i class="fa fa-plus"></i> New</a>
                    <a href="{{url('/tax')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>
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
                    <form action="{{url('/tax/update')}}" class="form-horizontal" method="post" onsubmit="return confirm('You want to save?')">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-sm-6">

                                <div class="form-group row">
                                    <label for="name" class="control-label col-sm-3 lb">Name <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$tax->name}}" id="name" name="name" required>
                                        <input type="hidden" id="id" name="id" value="{{$tax->id}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="type" class="control-label col-sm-3 lb">Type <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="type" name="type">
                                            <option value="Sales" {{$tax->type=='Sales'?'selected':''}}> Sales </option>
                                            <option value="Purchase" {{$tax->type=='Purchase'?'selected':''}}> Purchase </option>
                                       </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="computation" class="control-label col-sm-3 lb">Computation <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="computation" name="computation">
                                            <option value="Percentage of Price"> Percentage of Price </option>
                                       </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="amount" class="control-label col-sm-3 lb">Amount (%) <span class="text-danger">*</span></label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" value="{{$tax->amount}}" id="amount" name="amount" required>
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
            $("#tax").addClass("current");
            $("#type").chosen();
            $("#computation").chosen();
        })
    </script>

@endsection