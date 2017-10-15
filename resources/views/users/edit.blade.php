@extends('layouts.setting')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <i class="fa fa-align-justify"></i> Edit User&nbsp;&nbsp; &nbsp;
                    <a href="{{url('/user')}}" class="btn btn-link btn-sm">Back to List</a>
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
                    <form action="{{url('/user/update')}}" class="form-horizontal" onsubmit="return confirm('Do you want to eidt?')"
                          enctype="multipart/form-data" method="post" id="frm">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="form-group row">
                            <label for="name" class="control-label col-lg-1 col-sm-2">Username</label>
                            <div class="col-lg-6 col-sm-6">
                                <input type="text" value="{{$user->name}}" required name="name" id="name" class="form-control" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="control-label col-lg-1 col-sm-2">Email</label>
                            <div class="col-lg-6 col-sm-6">
                                <input type="email" value="{{$user->email}}" required name="email" id="email" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="language" class="control-label col-lg-1 col-sm-2">Language</label>
                            <div class="col-lg-6 col-sm-6">
                                <select name="language" id="language" class="form-control">
                                    <option value="kh" {{$user->language=='kh'?'selected':''}}>ខ្មែរ</option>
                                    <option value="en" {{$user->language=='en'?'selected':''}}>English</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role" class="control-label col-lg-1 col-sm-2">Role</label>
                            <div class="col-lg-6 col-sm-6">
                                <select name="role" id="role" class="form-control">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}" {{$role->id==$user->role_id?'selected':''}}>{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="photo" class="control-label col-lg-1 col-sm-2">Photo</label>
                            <div class="col-lg-6 col-sm-6">
                                <input type="file" value="" name="photo" id="photo" class="form-control" onchange="loadFile(event)">
                                <br>
                                <img src="{{asset('profile/'.$user->photo)}}" alt="" width="72" id="preview">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="control-label col-lg-1 col-sm-2">&nbsp;</label>
                            <div class="col-lg-6 col-sm-6">
                                <button class="btn btn-primary" type="submit">Save Changes</button>
                                <button class="btn btn-danger" type="reset" id="btnCancel">Cancel</button>
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
        $(document).ready(function () {
            $("#siderbar li a").removeClass("current");
            $("#user").addClass("current");
        })
    </script>
@endsection
