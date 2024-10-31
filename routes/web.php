<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\PromotionController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\SendPromotionController;
use App\Http\Controllers\backsite\EmailController;

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

// Redirect to login if user is not authenticated
Route::get('/', function () {
    
    return redirect('/dashboard');
});

// Dashboard route, only accessible by authenticated users
Route::get('/dashboard', function () {
    return view('admin.blank.index');
})->name('dashboard');


    // Route untuk Submenu 1
Route::get('/submenu1', [AdminController::class, 'submenu1'])->name('submenu1');

Route::resource('users', UserController::class);

Route::resource('roles', RoleController::class);

Route::resource('departments', DepartmentsController::class);

Route::resource('employees', EmployeesController::class);

Route::resource('payroll', PayrollController::class);

Route::resource('Leave', LeaveController::class);


Route::resource('attendance', AttendanceController::class);

Route::get('leave/edit', [LeaveController::class, 'edit'])->name('leave.edit');
Route::get('leave/update', [LeaveController::class, 'update'])->name('leave.update');


//EMAIL
Route::get('kirim-email', [EmailController::class, 'send']);
// Routes untuk Customer
Route::resource('customers', CustomerController::class);

// Routes untuk Promotion
Route::resource('promotions', PromotionController::class);

// Routes untuk Send Promotion
Route::get('send-promotions/create', [SendPromotionController::class, 'create'])->name('send_promotions.create');
Route::post('send-promotions/send', [SendPromotionController::class, 'send'])->name('send_promotions.send');



// Auth routes (login, register, password reset, etc.)



