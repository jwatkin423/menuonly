<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable {
  use Notifiable;

  public $timestamps = true;

  use SoftDeletes;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'address_id',
    'business_id',
    'first_name',
    'last_name',
    'email',
    'user_type',
    'password',
    'phone_number'
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

  protected $primaryKey = 'user_id';

  protected $table = 'users';

  public function user() {
    return $this->hasOne('App\Addresses', 'user_id', 'user_id');
  }

  public function business() {
    return $this->belongsTo('App\Businesses', 'business_id', 'business_id');
  }

}
