<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Addresses extends Model {
  protected $fillable = ['business_id', 'address_one', 'address_two', 'city', 'state', 'zip_code'];

  protected $primaryKey = 'address_id';

  protected $table = 'addresses';

  public $timestamps = true;

  use SoftDeletes;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];

  public function user() {
    return $this->belongsTo('App\User', 'user_id', 'user_id');
  }

  public function business() {
    return $this->belongsTo('App\Businesses', 'business_id', 'business_id');
  }

}

