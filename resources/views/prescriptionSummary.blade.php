@extends('dashboard')
@section('title','Prescription Summary')
@section('dashboardContent')
    <div class="box box-primary smart-scroll-y" style="height: calc(100vh - 176px);width: 1135px">
        <div class="box-body">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Customer</th>
                    <th scope="col">Contact No</th>
                    <th scope="col">Note</th>
                    <th scope="col">Delivery Address</th>
                    <th scope="col">Delivery Date</th>
                    <th scope="col">is Quotation create</th>
                    <th scope="col">Status</th>
                </tr>
                </thead>
                <tbody>
                @foreach($customerUsers as $data)
                    <tr>
                        <form action="{{route('addQuotation',$data->prescription->id)}}" method="POST">
                            @csrf
                            <td scope="row">{{$data->name}}</td>
                            <td>{{$data->contactno}}</td>
                            <td>{{$data->prescription->note}}</td>
                            <td>{{$data->prescription->delivery_address}}</td>
                            <td>{{$data->prescription->delivery_date}}</td>
                            <td>
                                @if($data->prescription->is_quotation_create === 0)
                                    <button type="submit" class="btn btn-success btn-sm">Create</button>
                                @else
                                    <span class="badge badge-pill badge-dark">Already Created</span>
                                    <a href="{{route('viewQuotation',$data->prescription->id)}}" class="btn btn-primary btn-sm">
                                        View
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($data->prescription->is_quotation_create === 0)
                                    <span class="badge badge-pill badge-dark">Quotation Not Created</span>
                                @elseif($data->prescription->is_quotation_create === 1)
                                    <span class="badge badge-pill badge-success">Quotation Created</span>
                                @if($data->prescription->quotation->is_send_quotation === 1)
                                    <span class="badge badge-pill badge-success">Sent to Customer</span>
                                @elseif($data->prescription->quotation->is_accept_quotation === 1)
                                    <span class="badge badge-pill badge-primary">Accepted</span>
                                @elseif($data->prescription->quotation->is_accept_quotation === 0 && $data->prescription->quotation->is_send_quotation === 1)
                                    <span class="badge badge-pill badge-danger">Rejected</span>
                                @endif
                                @endif
                            </td>
                        </form>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
