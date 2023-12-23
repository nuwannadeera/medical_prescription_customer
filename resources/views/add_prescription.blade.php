@extends('dashboard')
@section('title','Add Prescription')
@section('dashboardContent')
    <div class="box box-primary smart-scroll-y" style="height: calc(100vh - 176px);width: 1115px">
        <div class="box-body">
            <form action="{{route('savePrescription')}}" method="POST" style="width: 700px">
                @csrf
                <div class="form-group">
                    <label style="font-weight: bold">Prescription Note</label>
                    <input type="text" class="form-control" placeholder="Enter Note" name="note">
                </div>
                <div class="form-group">
                    <label style="font-weight: bold">Delivery Address</label>
                    <input type="text" class="form-control" placeholder="Enter Address" name="delivery_address">
                </div>
                <div class="form-group">
                    <label style="font-weight: bold">Delivery Date</label>
                    <input type="date" class="form-control" name="delivery_date">
                </div>
                <button type="submit" class="btn btn-success">Add Now</button>
            </form>
        </div>
    </div>
@endsection
