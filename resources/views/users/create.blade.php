@extends("layouts.setting")
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> New User&nbsp;&nbsp; &nbsp;
                    <a href="{{url('/user')}}">Back to List</a>
                </div>
                <div class="card-block">
                    <div class="row">
                        <div class="col-sm-8 mx-auto">
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
                            <form action="{{url('/user/save')}}" class="form-horizontal" enctype="multipart/form-data" method="post" id="frm">
                                {{csrf_field()}}
                                <div class="form-group row">
                                    <label for="name" class="control-label col-sm-2 lg">Username <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="text" id="name" name="name" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="control-label col-sm-2 lb">Email <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="email" required name="email" id="email" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="password" class="control-label col-sm-2 lb">Password <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <input type="password" required name="password" id="password" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="language" class="control-label col-sm-2 lb">Language <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select name="language" id="language" class="form-control sl">
                                            <option value="kh">ខ្មែរ</option>
                                            <option value="en">English</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="role" class="control-label col-sm-2 lb">Role <span class="text-danger">*</span></label>
                                    <div class="col-sm-6">
                                        <select name="role" id="role" class="form-control sl">
                                            @foreach($roles as $role)
                                                <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="photo" class="control-label col-sm-2 lb">Photo</label>
                                    <div class="col-sm-6">
                                        <input type="file" value="" name="photo" id="photo" class="form-control" onchange="loadFile(event)">
                                        <br>
                                        <img src="{{asset('profile/default.png')}}" alt="" width="72" id="preview">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="control-label col-sm-2 lb">&nbsp;</label>
                                    <div class="col-sm-6">
                                        <button class="btn btn-primary btn-flat" type="submit">Save</button>
                                        <button class="btn btn-danger btn-flat" type="reset" id="btnCancel">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

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
        $(document).ready(function () {
            $("#siderbar li a").removeClass("current");
            $("#user").addClass("current");
        })
    </script>

@endsection