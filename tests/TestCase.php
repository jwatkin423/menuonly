<?php

use App\User;

abstract class TestCase extends Illuminate\Foundation\Testing\TestCase {
  /**
   * The base URL to use while testing the application.
   *
   * @var string
   */
  protected $baseUrl = 'http://localhost';

  /**
   * Creates the application.
   *
   * @return \Illuminate\Foundation\Application
   */


  public function __construct() {

  }

  public function setUp() {
    parent::setUp();
    $this->login();
  }

  public function createApplication() {
    $app = require __DIR__ . '/../bootstrap/app.php';

    $app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

    return $app;
  }

  public function login() {
    $User = User::first();

    $this->be($User);

  }
}
