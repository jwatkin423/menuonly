<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BusinessTypes extends Model {

  public $timestamps = true;

  use SoftDeletes;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];

  protected $fillable = ['business_type_id', 'business_type'];

  protected $primaryKey = 'business_type_id';

  protected $table = 'business_types';

  public function business() {
    return $this->belongsTo('App\Businesses', 'business_type_id', 'business_type_id');
  }

}