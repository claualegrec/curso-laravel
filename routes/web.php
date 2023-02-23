<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpenseReportController;
use App\Http\Controllers\ExpenseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resource('/expense_reports', ExpenseReportController::class);
Route::get('/expense_reports/{id}/confirmDelete', [ExpenseReportController::class, 'confirmDelete']);

Route::get('/expense_reports/{id}/confirmSendMail', [ExpenseReportController::class, 'confirmMail']);
Route::post('/expense_reports/{id}/sendMail', [ExpenseReportController::class, 'sendMail']);

Route::get('expense_reports/{expense_report}/expenses/create', [ExpenseController::class, 'create']);
Route::post('expense_reports/{expense_report}/expenses', [ExpenseController::class, 'store']);