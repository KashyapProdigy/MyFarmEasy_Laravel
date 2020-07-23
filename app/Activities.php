<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Subuser;

class Activities extends Model
{
    protected $table = 'activities';

    protected $dateFormat = 'd-m-y';

    protected $fillable = ['title','description','act_date','act_time','act_by','act_to','isComplete','isReassigned','weather','remarks','elevation','lat','long','image'];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id', 'id');
    }

}
