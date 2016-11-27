<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menus extends Model
{
  public $timestamps = true;

  use SoftDeletes;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];

  protected $fillable = [
    'menu_id',
    'business_id',
    'menu_name',
    'date_valid_from',
    'date_valid_to',
    'range_valid_from',
    'range_valid_to'
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];

  protected $primaryKey = 'menu_id';

  protected $table = 'menus';

  public function business() {
    return $this->belongsTo('App\Businesses', 'business_id', 'business_id');
  }

}
