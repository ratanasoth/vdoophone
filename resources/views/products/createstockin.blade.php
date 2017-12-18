@extends("layouts.inventory")
@section("content")
<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-bold">
                    <strong>Create new stock in</strong>&nbsp;&nbsp;
                    <a href="{{url('/stockin')}}" class="text-success"><i class="fa fa-arrow-left"></i> Back</a>
                    <a href="javascript:void(0)" class="text-primary btnsave"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save</a>
                </div>
                <div class="card-block">
                    <form>
                        <div class="row" style="border:1px solid #ddd; padding: 15px 0;">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control" id="date">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Wearhourse</label>
                                    <select class="form-control" id="wearhouse">
                                        @foreach($warehouses as $warehouse)
                                            <option value="{{$warehouse->id}}">{{$warehouse->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border:1px solid #ddd; margin-top: 10px; padding: 15px 0;">
                            <div class="col-sm-12">
                                <div>
                                    <button type="button" id="btnadd" class="btn btn-primary btn-sm">Add</button>
                                    <button type="button" id="btndelete" class="btn btn-danger btn-sm" disabled>Delete</button>
                                </div>
                                <div style="margin-top:2px;">
                                    <table class="tbl">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width:30px;"><input type="checkbox" id="chhall"></th>
                                                <th>Code</th>
                                                <th>Name</th>
                                                <th>Added</th>
                                                <th class="text-center">On hand</th>
                                                <th class="text-center">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center"><input type="checkbox" class="chhrow"></td>
                                                <td>P001</td>
                                                <td>Angkor Beer</td>
                                                <td>
                                                    <input type="number" min="1" value="1">
                                                </td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                            </tr>
                                            <tr>
                                                <td class="text-center"><input type="checkbox" class="chhrow"></td>
                                                <td>P001</td>
                                                <td>Angkor Beer</td>
                                                <td>
                                                    <input type="number" min="1" value="1">
                                                </td>
                                                <td class="text-center">1</td>
                                                <td class="text-center">1</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
<script src="{{asset('js/stockins/stockin.create.js')}}"></script>
@endsection