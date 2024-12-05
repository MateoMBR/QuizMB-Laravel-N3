<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
public function index()
{
return view('dashboard.index'); // Assurez-vous d'avoir une vue `dashboard/index.blade.php`
}
}
