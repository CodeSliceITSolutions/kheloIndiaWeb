<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaxThreePlus extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','draw_id','draw_title','draw_date','draw_time','draw_result','created_by','updated_by'];

    public static function addMaxThreePlus($data) {
        self::Create($data);
    }

    /* Update the MaxThreePlus based on Id
    */
    public static function updateMaxThreePlus($id, $data)
    {
        self::where('id', $id)->update($data);
    }

    // check any value exist in MaxThreePlus
    public static function checkExist($condition)
    {
        return self::where($condition)->first();
    }

    public static function viewMaxThreePlus() {
        return self::get();
    }
}
