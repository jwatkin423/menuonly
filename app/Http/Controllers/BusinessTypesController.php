<?php

namespace App\Http\Controllers\BusinessTypes;

use App\BusinessTypes;
use App\Http\Controllers\Controller;

class BusinessTypesController extends Controller
{
  /**
   * BusinessController constructor.
   */
  public function __construct() {
    $this->middleware('auth');
  }


}