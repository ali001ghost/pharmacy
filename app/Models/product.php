<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;

    protected $fillable=['name','price','exp_day','pro_day','factory_id','category_id','amount'];

    public function factory()
        {
            return $this->belongsTo(factory::class,'factory_id');
        }

        public function category()
        {
            return $this->belongsTo(category::class,'category_id');
        }

        public function users()
        {
            return $this->belongsToMany(User::class,'product_users','user_id');
        }
}
