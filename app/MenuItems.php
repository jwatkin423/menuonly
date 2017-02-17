<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuItems extends Model
{

  public $timestamps = true;

  use SoftDeletes;

  protected $table = 'menu_items';

  protected $fillable = [
    'menu_id',
    'menu_item_descr',
    'menu_price'
  ];

  protected $primaryKey = 'menu_item_id';

  public function menus() {
    return $this->hasMany('App\Menus', 'menu_id', 'menu_id');
  }


}
