<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    protected $table = 'prescriptions';
    protected $primaryKey = 'id';
    protected $fillable = ['note','delivery_address','delivery_date','is_quotation_create','user_id'];

    /**
     * Get the user that owns the prescription.
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function quotation()
    {
        return $this->hasOne('App\Quotation','prescription_id','id');
    }
}
