@extends('dashboard')
@section('title','Quotation Summary')
@section('dashboardContent')
    <div class="box box-primary smart-scroll-y" style="height: calc(100vh - 176px);width: 1095px">
        <div class="box-body">
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Quotation ID</th>
                    <th scope="col">Note</th>
                    <th scope="col">Q. Create Date</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($quotationList as $data)
                    <tr>
                        @csrf
                        <td scope="row">{{$data->prescription->quotation->id}}</td>
                        <td>{{$data->prescription->note}}</td>
                        <td>{{$data->prescription->quotation->quotation_create_date}}</td>
                        <td>
                            <a href="{{route('viewCustomerQuotation',$data->prescription->id)}}"
                               class="btn btn-primary btn-sm">
                                View
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
