<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use SoftDeletes;//软删除
    protected $table        = 'article';
    protected $primartkey   ='id';
    protected $fillable     =['title','content','user_id'];

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
