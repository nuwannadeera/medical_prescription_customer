<?php

namespace App\Http\Controllers;

use App\Prescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddPrescriptionController extends Controller {

    protected $prescription;

    public function __construct() {
        $this->prescription = new Prescription();
    }

    function prescription() {
        return view('add_prescription');
    }

    function savePrescription(Request $request) {
        $request->validate([
            'note' => 'required',
            'delivery_address' => 'required',
            'delivery_date' => 'required'
        ]);
        $userId = Auth::id();
        $input = array_merge($request->all(), ['user_id' => $userId]);
        Prescription::create($input);
        return redirect(route('prescription'))->with("flash_message", "Prescription Saved");
    }
}
