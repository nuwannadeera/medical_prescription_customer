<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class QuotationSummaryController extends Controller {

    function getAllCustomerQuotations() {
        $quotationList = User::whereHas('prescription.user', function ($query) {
            $query->where("id", Auth::id());
        })->with(['prescription.quotation' => function ($query) {
            $query->where('is_send_quotation', 1);
        }])->get();
        return view('customerQuotationSummary')->with('quotationList', $quotationList);
    }
}
