<?php

namespace App\Http\Controllers;

use App\Drug;
use App\Quotation;
use Illuminate\Http\Request;

class AddQuotationController extends Controller {

    function viewQuotation($prescription_id) {
        $existingQuotation = Quotation::where('prescription_id', $prescription_id)->first();
        $q_id = $existingQuotation->id;
        $drugList = Drug::where('quotation_id', $q_id)->get();
        return view('addQuotation', ['prescription_id' => $q_id], compact('q_id', 'prescription_id'))
            ->with('drugList', $drugList);
    }

    function addQuotation($prescription_id) {
        $drugList = [];
        $existingQuotation = Quotation::where('prescription_id', $prescription_id)->first();
        if ($existingQuotation) {
            $q_id = $existingQuotation->id;
            $drugList = Drug::where('quotation_id', $q_id)->get();
            return view('addQuotation', ['prescription_id' => $prescription_id], compact('q_id', 'prescription_id'))
                ->with('drugList', $drugList);
        } else {
            $input = [
                'prescription_id' => $prescription_id,
                'quotation_create_date' => now()->toDateString(),
                'is_send_quotation' => 0,
                'is_accept_quotation' => 0,
            ];
            $quotation = Quotation::create($input);
            $q_id = $quotation->id;
            return view('addQuotation', ['prescription_id' => $prescription_id], compact('q_id', 'prescription_id'))
                ->with('drugList', $drugList);
        }
    }

    public function addDrug(Request $request) {
        $request->validate([
            'drug' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric'
        ]);
        $input = array_merge($request->all(), ['quotation_id' => $request->q_id]);
        Drug::create($input);
        $pres_id = $request->pres_id;
        return redirect()->route('viewQuotation', ['prescription_id' => $pres_id]);
    }
}
