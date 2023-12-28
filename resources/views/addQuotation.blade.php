@extends('dashboard')
@section('title','Add Quotation')
@section('dashboardContent')
    <div class="box box-primary smart-scroll-y" style="height: calc(100vh - 176px);width: 1115px">
        <div class="box-body">
            <table class="mt5" style="width: 100%">
                <tbody>
                <tr>
                    {{--<form action="{{route('addDrug',$quotation->id)}}" method="POST">--}}
                        <form>
                        <td style="width: 20%">Drug
                            <input type="text" class="form-control text-right" name="drug" autocomplete="off"/>
                        </td>
                        <td style="width: 15%">Qty
                            <input type="text" class="form-control text-right" name="qty" autocomplete="off"/>
                        </td>
                        <td style="width: 15%">Price
                            <input type="text" class="form-control text-right" name="price" autocomplete="off"/>
                        </td>
                        <td style="width: 10%; padding-top: 18px; padding-left: 3px;">
                            <a class="btn btn-primary btn-sm" style="color: white">ADD</a>
                        </td>
                    {{--</form>--}}
                </tr>
                </tbody>
            </table>
            <div class="box-body smart-scroll-y" style="height: calc(108vh - 190px)">
                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 5%">Drug</th>
                        <th style="width: 18%">Qty</th>
                        <th style="width: 13%">Price</th>
                        <th style="width: 15%">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>sdfsdf</td>
                        <td>12</td>
                        <td>456</td>
                        <td>
                            <button class="btn btn-primary" type="submit" value="EDIT">
                                <span class="fa fa-edit"></span>
                            </button>
                            <button class="btn btn-primary" type="submit" value="DELETE">
                                <span class="fa fa-remove"></span>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer">
            <input type="submit" class="btn btn-primary" value="ADD QUOTATION"/>
            <input type="submit" class="btn btn-primary" value="CLEAR"/>
        </div>
    </div>
@endsection
