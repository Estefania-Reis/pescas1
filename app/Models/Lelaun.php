<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ikan;

class Lelaun extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $dates = ['created_at','updated_at'];

   
    public function series(){
        return $this->belongsTo(Serie::class);
    }
    
    public static function boot()
{
    parent::boot();
    static::creating(function($model){
        $model->numeru = Lelaun::where('series_id', $model->series_id)->max('numeru') + 1;
        $model->id_lelaun = $model->series['series'].'-'.str_pad($model->numeru, 2, '0',STR_PAD_LEFT);
    });
}
}
