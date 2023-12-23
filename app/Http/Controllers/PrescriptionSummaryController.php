<?php

namespace App\Http\Controllers;

use App\User;

class PrescriptionSummaryController extends Controller {

    function viewPrescriptionSummary() {
        return view('prescriptionSummary');
    }

    function getAllPrescriptions() {
//        $customerUsers = User::whereHas('prescription', function ($query) {
//            $query->where("type", 1);
//        })->get();
        $customerUsers = User::whereHas('prescription.user', function ($query) {
            $query->where("type", 1);
        })->with(['prescription.quotation' => function ($query) {
            $query->withDefault();
        }])->get();
        return view('prescriptionSummary')->with('customerUsers', $customerUsers);
    }
}
