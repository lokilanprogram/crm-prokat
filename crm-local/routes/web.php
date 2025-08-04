<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Снимаем auth/verified с dashboard, чтобы страница открывалась всегда
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/cashbox', function() {
    return view('cashbox');
})->name('cashbox');

Route::get('/cashbox-admin', function() {
    return view('cashbox-admin');
})->name('cashbox-admin');

Route::get('/equipment', function () {
    return view('equipment.index');
})->name('equipment');


Route::get('/dashboard-superadmin', function () {
    return view('dashboard-superadmin');
})->name('dashboard-superadmin');


Route::get('/admin/access', function () {
    return view('admin.access');
})->name('admin.access');

Route::get('/reports/contracts', function () {
    return view('reports.contracts');
})->name('reports.contracts');

Route::get('/reports/contracts-manager', function () {
    return view('reports.contracts-manager');
})->name('reports.contracts-manager');


Route::get('/equipment/writeoff', function () {
    return view('equipment.writeoff');
})->name('equipment.writeoff');


Route::get('/goods/income', function () {
    return view('goods.income');
})->name('goods.income');


Route::get('/goods/income-manager', function () {
    return view('goods.income-manager');
})->name('goods.income-manager');


Route::get('/goods/sales', function () {
    return view('goods.sales');
})->name('goods.sales');


Route::get('/goods/sales-manager', function () {
    return view('goods.sales-manager');
})->name('goods.sales-manager');


Route::get('/stock/index', function () {
    return view('stock.index');
})->name('stock.index');

Route::get('/stock/index-manager', function () {
    return view('stock.index-manager');
})->name('stock.index-manager');

Route::get('/reports/reconciliation', function () {
    return view('reports.reconciliation');
})->name('reports.reconciliation');

Route::get('/reports/reconciliation-manager', function () {
    return view('reports.reconciliation-manager');
})->name('reports.reconciliation-manager');

Route::get('/invoices/index', function () {
    return view('invoices.index');
})->name('invoices.index');

Route::get('/invoices/index-manager', function () {
    return view('invoices.index-manager');
})->name('invoices.index-manager');

Route::get('/admin/users/index', function () {
    return view('admin.users.index');
})->name('admin.users.index');


Route::get('/admin/users/edit', function () {
    return view('admin.users.edit');
})->name('admin.users.edit');


Route::get('/discounts/index', function () {
    return view('discounts.index');
})->name('discounts.index');


Route::get('/discounts/index-manager', function () {
    return view('discounts.index-manager');
})->name('discounts.index-manager');


Route::get('/units-directory', function () {
    return view('units-directory');
})->name('units-directory');

Route::get('/units-directory-manager', function () {
    return view('units-directory-manager');
})->name('units-directory-manager');


Route::get('/branches-directory', function () {
    return view('branches-directory');
})->name('branches-directory');

Route::get('/branches-directory-manager', function () {
    return view('branches-directory-manager');
})->name('branches-directory-manager');


Route::get('/organizations-directory', function () {
    return view('organizations-directory');
})->name('organizations-directory');

Route::get('/organizations-directory-manager', function () {
    return view('organizations-directory-manager');
})->name('organizations-directory-manager');

Route::get('/goods/categories', function () {
    return view('goods.categories');
})->name('goods.categories');

Route::get('/goods/categories-manager', function () {
    return view('goods.categories-manager');
})->name('goods.categories-manager');


Route::get('/directory/services', function () {
    return view('directory.services');
})->name('directory.services');

Route::get('/directory/services-manager', function () {
    return view('directory.services-manager');
})->name('directory.services-manager');

Route::get('/directory/payment-types', function () {
    return view('directory.payment-types');
})->name('directory.payment-types');

Route::get('/directory/payment-types-manager', function () {
    return view('directory.payment-types-manager');
})->name('directory.payment-types-manager');

Route::get('/directory/employee-types', function () {
    return view('directory.employee-types');
})->name('directory.employee-types');

Route::get('/directory/employee-types-manager', function () {
    return view('directory.employee-types-manager');
})->name('directory.employee-types-manager');

Route::get('/directory/equipment-groups', function () {
    return view('directory.equipment-groups');
})->name('directory.equipment-groups');

Route::get('/directory/equipment-groups-manager', function () {
    return view('directory.equipment-groups-manager');
})->name('directory.equipment-groups-manager');

Route::get('/directory/positions', function () {
    return view('directory.positions');
})->name('directory.positions');

Route::get('/directory/positions-manager', function () {
    return view('directory.positions-manager');
})->name('directory.positions-manager');


Route::get('/directory/positions', function () {
    return view('directory.positions');
})->name('directory.positions');


Route::get('/directory/positions-manager', function () {
    return view('directory.positions-manager');
})->name('directory.positions-manager');


Route::get('/directory/suppliers', function () {
    return view('directory.suppliers');
})->name('directory.suppliers');

Route::get('/directory/suppliers-manager', function () {
    return view('directory.suppliers-manager');
})->name('directory.suppliers-manager');


Route::get('/directory/writeoff-reasons', function () {
    return view('directory.writeoff-reasons');
})->name('directory.writeoff-reasons');

Route::get('/directory/writeoff-reasons-manager', function () {
    return view('directory.writeoff-reasons-manager');
})->name('directory.writeoff-reasons-manager');

Route::get('/directory/manufacturers', function () {
    return view('directory.manufacturers');
})->name('directory.manufacturers');

Route::get('/directory/manufacturers-manager', function () {
    return view('directory.manufacturers-manager');
})->name('directory.manufacturers-manager');

Route::get('/directory/legal-entities', function () {
    return view('directory.legal-entities');
})->name('directory.legal-entities');

Route::get('/directory/legal-entities-manager', function () {
    return view('directory.legal-entities-manager');
})->name('directory.legal-entities-manager');

Route::get('/directory/persons', function () {
    return view('directory.persons');
})->name('directory.persons');

Route::get('/directory/persons-manager', function () {
    return view('directory.persons-manager');
})->name('directory.persons-manager');

Route::get('/dashboard-manager', function () {
    return view('dashboard-manager');
})->name('dashboard-manager');


Route::get('equipment/admin-index', function () {
    return view('equipment.admin-index');
})->name('equipment.admin-index');

Route::get('admin-users', function () {
    return view('admin-users');
})->name('admin-users');


Route::get('admin-users-edit', function () {
    return view('admin-users-edit');
})->name('admin-users-edit');


Route::get('equipment.writeoff-manager', function () {
    return view('equipment.writeoff-manager');
})->name('equipment.writeoff-manager');



Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('users', UserController::class);
});


Route::middleware(['auth', 'verified'])->group(function () {
    // а остальные по-прежнему под защитой
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
