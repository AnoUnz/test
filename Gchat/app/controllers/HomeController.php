<?php
namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller {
    public function index() {
        $this->view('home/index', ['title' => 'Landing Page']);
    }
    public function discover() {
        $this->view('home/discover', ['title' => 'Discover']);
    }
}
