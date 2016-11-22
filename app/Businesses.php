<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Businesses extends Model {

  public $timestamps = true;

  use SoftDeletes;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];

  protected $fillable = [
    'business_name',
    'business_type_id',
    'deleted_at',
    'created_at',
    'update_at'
  ];

  protected $primaryKey = 'business_id';

  protected $table = 'businesses';

  public function users() {
    return $this->hasMany('App\User', 'business_id', 'business_id');
  }

  public function addresses() {
    return $this->hasMany('App\Addresses', 'business_id', 'business_id');
  }

  public function businessType() {
    return $this->hasOne('App\BusinessTypes', 'business_type_id', 'business_type_id');
  }

}

