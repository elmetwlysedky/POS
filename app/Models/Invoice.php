<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number','type','client_id','user_id','discount','total'

    ];
    public function client(){
        return $this->belongsTo(Client::class,'client_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
