<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuckyThreePlus extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','draw_id','draw_title','draw_date','draw_time','draw_result','created_by','updated_by'];

    public static function addLuckyThreePlus($data) {
        self::Create($data);
    }

    /* Update the LuckyThreePlus based on Id
    */
    public static function updateLuckyThreePlus($id, $data)
    {
        self::where('id', $id)->update($data);
    }

    // check any value exist in LuckyThreePlus
    public static function checkExist($condition)
    {
        return self::where($condition)->first();
    }

    public static function viewLuckyThreePlus() {
        return self::get();
    }
}
