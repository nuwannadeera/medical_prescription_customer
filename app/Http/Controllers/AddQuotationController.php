<?php

namespace App\Http\Controllers;

use App\Drug;
use App\Prescription;
use App\Quotation;
use Illuminate\Http\Request;

class AddQuotationController extends Controller {
    function addQuotation(Prescription $prescription) {
//        view('addQuotation',compact('prescription'));
        $input = [
            'prescription_id' => $prescription->id,
            'quotation_create_date' => now()->toDateString(),
            'is_send_quotation' => 0,
            'is_accept_quotation' => 0,
        ];
        Quotation::create($input);
        return view('addQuotation',compact('prescription'));
    }

//    public function addDrug(Request $request, Quotation $quotation) {
//        $request->validate([
//            'drug' => 'required',
//            'qty' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$',
//            'price' => 'required|numeric|regex:/^\d+(\.\d{1,2})?$/'
//        ]);
//        $input = array_merge($request->all(), ['quotation_id' => $quotation->id]);
//        Drug::create($input);
//        return redirect(route('viewQuotation'))->with("flash_message", "Drug Saved");
//    }
}
