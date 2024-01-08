<?php

namespace App\Http\Controllers;

use App\Drug;
use App\Quotation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AddQuotationController extends Controller {

    function viewQuotation($prescription_id) {
        $existingDrug = (object)['drug' => '', 'qty' => '', 'price' => ''];
        $existingQuotation = Quotation::where('prescription_id', $prescription_id)->first();
        if ($existingQuotation) {
            $q_id = $existingQuotation->id;
            $drugList = Drug::where('quotation_id', $q_id)->get();
        } else {
            $drugList = [];
            $q_id = 0;
        }
        return view('addQuotation', ['prescription_id' => $prescription_id], compact('q_id', 'prescription_id'))
            ->with('drugList', $drugList)->with('existingDrug', $existingDrug);
    }


    function goToQuotation($prescription_id) {
        return redirect()->route('viewQuotation', ['prescription_id' => $prescription_id]);
    }


    public function addNewQuotation(Request $request) {
        $request->validate([
            'drug' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
        ]);
        $prescription_id = $request->prescription_id;
        try {
            DB::beginTransaction();
            $existingQuotation = Quotation::where('prescription_id', $prescription_id)->first();
            if ($existingQuotation) {
                return redirect()->route('viewQuotation', ['prescription_id' => $prescription_id]);
            } else {
                //------------save quotation
                $input = [
                    'prescription_id' => $prescription_id,
                    'quotation_create_date' => now()->toDateString(),
                    'is_send_quotation' => 0,
                    'is_accept_quotation' => 0,
                ];
                $quotation = Quotation::create($input);
                $q_id = $quotation->id;

                //------------save drug
                $input = array_merge($request->all(), ['quotation_id' => $q_id]);
                Drug::create($input);
                DB::commit();
                return redirect()->route('viewQuotation', ['prescription_id' => $prescription_id]);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->route('viewQuotation', ['prescription_id' => $prescription_id]);
        }
    }


    public function editDrug(Drug $drug) {
        $existingDrug = $drug;
        $q_id = $existingDrug->quotation_id;
        $quotation = Quotation::where('id', $q_id)->first();
        $prescription_id = $quotation->prescription_id;
        $drugList = Drug::where('quotation_id', $q_id)->get();
        $drugList = $drugList->reject(function ($item) use ($existingDrug) {
            return $item->id == $existingDrug->id;
        });
        return view('addQuotation', ['prescription_id' => $prescription_id], compact('q_id', 'prescription_id'))
            ->with('drugList', $drugList)->with('existingDrug', $existingDrug);
    }


    public function updateDrug(Request $request, Drug $drug) {
        $input = $request->all();
        $drug->update($input);
        return redirect()->route('viewQuotation', ['prescription_id' => $request->pres_id]);
    }


    public function deleteDrug(Drug $drug) {
        $quotation = Quotation::where('id', $drug->quotation_id)->first();
        $prescription_id = $quotation->prescription_id;
        $drug->delete();
        return redirect()->route('viewQuotation', ['prescription_id' => $prescription_id]);
    }


    public function clearDrug(Drug $drug) {
        $drug->drug = '';
        $drug->qty = '';
        $drug->price = '';
        return redirect()->back();
    }


//    function addQuotation($prescription_id) {
//        $drugList = [];
//        $existingDrug = (object)['drug' => '', 'qty' => '', 'price' => ''];
//        $existingQuotation = Quotation::where('prescription_id', $prescription_id)->first();
//        if ($existingQuotation) {
//            $q_id = $existingQuotation->id;
//            $drugList = Drug::where('quotation_id', $q_id)->get();
//            return view('addQuotation', ['prescription_id' => $prescription_id], compact('q_id', 'prescription_id'))
//                ->with('drugList', $drugList)->with('existingDrug', $existingDrug);
//        } else {
//            $input = [
//                'prescription_id' => $prescription_id,
//                'quotation_create_date' => now()->toDateString(),
//                'is_send_quotation' => 0,
//                'is_accept_quotation' => 0,
//            ];
//            $quotation = Quotation::create($input);
//            $q_id = $quotation->id;
//            return view('addQuotation', ['prescription_id' => $prescription_id], compact('q_id', 'prescription_id'))
//                ->with('drugList', $drugList)->with('existingDrug', $existingDrug);
//        }
//    }

//    public function addDrug(Request $request) {
//        $request->validate([
//            'drug' => 'required',
//            'qty' => 'required|numeric',
//            'price' => 'required|numeric'
//        ]);
//        $input = array_merge($request->all(), ['quotation_id' => $request->q_id]);
//        Drug::create($input);
//        $pres_id = $request->pres_id;
//        return redirect()->route('viewQuotation', ['prescription_id' => $pres_id]);
//    }

}
