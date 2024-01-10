<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class viewQuotationController extends Controller {

    function viewCustomerQuotation($prescription_id) {
        $quotationDetails = DB::table('prescriptions')
            ->selectRaw('quotations.id as q_id, prescriptions.id as prescription_id, prescriptions.note, 
            prescriptions.delivery_address, users.name, users.email, users.address, prescriptions.delivery_date,
            drugs.drug, drugs.qty, drugs.price')
            ->join('users', 'prescriptions.user_id', '=', 'users.id')
            ->join('quotations', 'quotations.prescription_id', '=', 'prescriptions.id')
            ->join('drugs', 'quotations.id', '=', 'drugs.quotation_id')
            ->where('users.id','=', Auth::id())
            ->where('prescriptions.id','=', $prescription_id)
            ->orderByDesc('quotations.quotation_create_date')
            ->get();
        return view('viewQuotation',['prescription_id' => $prescription_id])
            ->with('quotationDetails', $quotationDetails);
    }


    function acceptQuotation($quotation_id) {
        DB::table('quotations')
            ->where('id', $quotation_id)
            ->update(['is_accept_quotation' => 1]);
//        return view('customerQuotationSummary');
        return redirect()->back();
    }


    function rejectQuotation($quotation_id) {
        DB::table('quotations')
            ->where('id', $quotation_id)
            ->update(['is_accept_quotation' => 2]);
        return redirect()->back();
    }
}
