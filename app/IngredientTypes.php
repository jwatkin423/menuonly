<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class IngredientTypes extends Model {

  public $timestamps = true;

  use SoftDeletes;

  /**
   * The attributes that should be mutated to dates.
   *
   * @var array
   */
  protected $dates = ['deleted_at'];

  protected $fillable = ['ingredient_type_description'];

  protected $primaryKey = 'ingredient_type_id';

  protected $table = 'ingredient_types';

  public function ingredients() {
    return $this->belongsToMany('App\Ingredient', 'ingredient_type_id', 'ingredient_type_id');
  }

}