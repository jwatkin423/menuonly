<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//use Faker\Provider\Address; @TODO: Use to format address


class BusinessType extends Model {
  protected $fillable = ['business_type_name'];

  protected $primaryKey = 'business_type_id';

  protected $table = 'business_types';

  public function business() {
    return $this->belongsTo('App\Business', 'business_type_id', 'business_type_id');
  }

}