@extends('dashboard')
@section('title','Prescription Summary')
@section('dashboardContent')
    <div class="box box-primary smart-scroll-y" style="height: calc(100vh - 176px);width: 1115px">
        <div class="box-body">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Customer</th>
                    <th scope="col">Contact No</th>
                    <th scope="col">Note</th>
                    <th scope="col">Address</th>
                    <th scope="col">Date</th>
                    <th scope="col">is Quotation create</th>
                    <th scope="col">Customer Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customerUsers as $data)
                    <tr>
                        <th scope="row">{{$data->name}}</th>
                        <td>{{$data->contactno}}</td>
                        <td>{{$data->prescription->note}}</td>
                        <td>{{$data->prescription->delivery_address}}</td>
                        <td>{{$data->prescription->delivery_date}}</td>
                        <td>
                            @if($data->prescription->is_quotation_create === 0)
                                <button type="button" class="btn btn-primary btn-sm">Create</button>
                            @else
                                <span class="badge badge-pill badge-dark">Already Created</span>
                            @endif
                        </td>
                        <td>
                            @if($data->prescription->is_quotation_create === 0)
                                <span class="badge badge-pill badge-dark">Quotation Not Created</span>
                            @elseif($data->prescription->is_quotation_create === 1)
                                <span class="badge badge-pill badge-success">Accepted</span>
                            @else
                                <span class="badge badge-pill badge-danger">Rejected</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
