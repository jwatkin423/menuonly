<?php
namespace App\Http\Controllers;

use App\Businesses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Config;

class BusinessController extends Controller
{
  /**
   * BusinessController constructor.
   */
  public function __construct() {
    $this->middleware('auth');
  }

  public function view(Request $get) {
    $businessId = $get->input('business_id');
    $changed = $get->input('changed');

    $Business = Businesses::select(['business_name', 'business_id','business_type_id'])
      ->where('business_id', $businessId)
      ->with('addresses', 'users', 'businessType')
      ->first();

    $businessConfig = Config::get('form.businessconfig');

    return view('business.edit')
      ->with('business', $Business->toArray())
      ->with('changed', $changed)
      ->with('msg', null)
      ->with('status', null)
      ->with('config', $businessConfig);
  }

  public function update(Request $post) {
    $data = $post->except('_token');
    Log::debug(print_r($post, true));
    Log::debug(print_r($data, true));
  }


}
