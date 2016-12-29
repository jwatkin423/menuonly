<?php
namespace App\Http\Controllers;

use App\Businesses;
use App\Menus;
use App\BusinessTypes;
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

  public function create() {
    $businessTypes = BusinessTypes::pluck('business_type_name', 'business_type_id');

    return view('business.edit')
      ->with('edit', false)
      ->with('businessTypes', $businessTypes);
  }

  public function store(Request $create) {
    $business = $create->except('_token', 'user_id');
    $userId = $create->input('user_id');
    $Business = new Businesses();

    $Business->fill($business);

    if ($Business->save()) {
      return redirect()->route('db.home', ['user_id' => $userId]);
    }

  }

  public function view(Request $get) {
    $businessId = $get->input('business_id');
    $changed = $get->input('changed');
    $status = isset($get['status']) ? $get['status'] : null;
    $msg = isset($get['msg']) ? $get['msg'] : null;

    $Business = Businesses::select(['business_name', 'business_id','business_type_id'])
      ->where('business_id', $businessId)
      ->with('addresses', 'users', 'businessType')
      ->first();

    $businessConfig = Config::get('form.businessconfig');
    $Menus = Menus::where('business_id', $businessId)->with('menuType')->get();

    return view('business.edit')
      ->with('edit', true)
      ->with('business', $Business)
      ->with('changed', $changed)
      ->with('menus', $Menus)
      ->with('msg', $msg)
      ->with('status', $status)
      ->with('config', $businessConfig);
  }

  public function edit($business_id) {

  }

  public function update(Request $post) {
    $data = $post->except('_token');
    Log::debug(print_r($post, true));
    Log::debug(print_r($data, true));
  }


}
