<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subuser extends Model
{
    protected $table = 'subusers';

    protected $fillable = ['name','phone','password','designation_id','reports_to'];

        public function designation()
        {
            return $this->belongsTo(Designation::class,'designation_id', 'id');
        }



}
