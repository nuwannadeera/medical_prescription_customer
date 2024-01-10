<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrescriptionSummaryController extends Controller {

    function viewPrescriptionSummary() {
        return view('prescriptionSummary');
    }

    function getAllPrescriptions() {
//        $customerUsers = User::whereHas('prescription', function ($query) {
//            $query->where("type", 1);
//        })->get();
//        $customerUsers = User::whereHas('prescription.user', function ($query) {
//            $query->where("type", 1);
//        })->with(['prescription.quotation' => function ($query) {
//            $query->withDefault();
//        }])->get();
        $customerUsers = DB::table('prescriptions')
            ->selectRaw('quotations.id as q_id, prescriptions.id, prescriptions.note, 
            prescriptions.delivery_address, users.name, users.contactno, users.address, prescriptions.delivery_date,
            prescriptions.is_quotation_create, quotations.is_send_quotation, quotations.is_accept_quotation')
            ->join('users', 'prescriptions.user_id', '=', 'users.id')
            ->leftJoin('quotations', 'quotations.prescription_id', '=', 'prescriptions.id')
            ->where('users.type','=', 1)
            ->orderByDesc('prescriptions.id')
            ->get();
        return view('prescriptionSummary')->with('customerUsers', $customerUsers);
    }
}
