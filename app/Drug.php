<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model {
    protected $table = 'drugs';
    protected $primaryKey = 'id';
    protected $fillable = ['drug', 'qty', 'price', 'quotation_id'];

    public function quotation() {
        return $this->belongsTo('App\Quotation', 'quotation_id');
    }

    use HasFactory;
}
