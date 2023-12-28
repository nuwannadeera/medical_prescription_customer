<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotation extends Model {
    protected $table = 'quotations';
    protected $primaryKey = 'id';
    protected $fillable = ['note', 'prescription_id', 'quotation_create_date', 'is_send_quotation', 'is_accept_quotation'];

    public function prescription() {
        return $this->belongsTo('App\Prescription', 'prescription_id');
    }

    public function drug() {
        return $this->hasMany('App\Drug', 'prescription_id', 'id');
    }
}
