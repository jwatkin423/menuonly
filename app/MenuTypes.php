<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuTypes extends Model
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
    'menu_type_descr'
  ];

  protected $primaryKey = 'menu_type_id';

  protected $table = 'menu_types';

  public function menus() {
    return $this->belongsTo('App\Menus', 'menu_type_id', 'menu_type_id');
  }

}
