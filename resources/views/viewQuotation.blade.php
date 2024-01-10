@extends('dashboard')
@section('title','View Quotation')
@section('dashboardContent')
    <div class="box box-primary smart-scroll-y" style="height: calc(100vh - 176px);width: 1095px">
        <div class="box-body">
            <table class="mt5" style="width: 100%">
                <tbody>
                <tr>
                    <td style="width: 20%"><b>Customer</b>
                        <input type="text" class="form-control text-right" disabled autocomplete="off"
                               value="{{ $quotationDetails->first()->name }}"/>
                    </td>
                    <td style="width: 15%"><b>E- mail</b>
                        <input type="text" class="form-control text-right" autocomplete="off" disabled
                               value="{{ $quotationDetails->first()->email }}"/>
                    </td>
                    <td style="width: 15%"><b>Delivery Address</b>
                        <input type="text" class="form-control text-right" autocomplete="off" disabled
                               value="{{ $quotationDetails->first()->delivery_address }}"/>
                    </td>
                </tr>
                </tbody>
                <tbody>
                <tr>
                    <td style="width: 15%"><b>Delivery Date</b>
                        <input type="text" class="form-control text-right" autocomplete="off" disabled
                               value="{{ $quotationDetails->first()->delivery_date }}"/>
                    </td>
                    <td style="width: 15%"><b>Note</b>
                        <input type="text" class="form-control text-right" autocomplete="off"
                               disabled value="{{ $quotationDetails->first()->note }}"/>
                    </td>
                </tr>
                </tbody>
            </table>
            <div class="box-body smart-scroll-y" style="height: calc(108vh - 245px)">
                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th style="width: 5%">Drug</th>
                        <th style="width: 18%">Qty</th>
                        <th style="width: 13%">Price</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($quotationDetails as $data)
                        <tr>
                            <td>{{$data->drug}}</td>
                            <td>{{$data->qty}}</td>
                            <td>{{$data->price}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="box-footer">
            <a href="{{route('acceptQuotation',['quotation_id' => $quotationDetails->first()->q_id])}}" class="btn btn-primary">ACCEPT</a>
            <a href="{{route('rejectQuotation',['quotation_id' => $quotationDetails->first()->q_id])}}" class="btn btn-danger">REJECT</a>
        </div>
    </div>
@endsection
