<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Home::index');
$routes->get('/', 'AuthController::login');
$routes->get('/register', 'AuthController::register');
$routes->post('/registerUser', 'AuthController::registerUser');
$routes->post('/loginUser', 'AuthController::loginUser');
$routes->get('/logout', 'AuthController::logout');

// Dashboards
$routes->get('/dashboard/admin', 'DashboardController::admin');
$routes->get('/dashboard/doctor', 'DashboardController::doctor');
$routes->get('/dashboard/nurse', 'DashboardController::nurse');
$routes->get('/dashboard/receptionist', 'DashboardController::receptionist');
$routes->get('/dashboard/pharmacist', 'DashboardController::pharmacist');
$routes->get('/dashboard/labtech', 'DashboardController::labtech');
$routes->get('/dashboard/patient', 'DashboardController::patient');





$routes->get('/patients', 'PatientController::index');
$routes->get('/patients/create', 'PatientController::create');
$routes->post('/patients/store', 'PatientController::store');
$routes->get('/patients/edit/(:num)', 'PatientController::edit/$1');
$routes->post('/patients/update/(:num)', 'PatientController::update/$1');
$routes->get('/patients/delete/(:num)', 'PatientController::delete/$1');

$routes->get('/patients/approve/(:num)', 'PatientController::approve/$1');
$routes->get('/patients/reject/(:num)', 'PatientController::reject/$1');




$routes->group('doctors', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('/', 'DoctorController::index');
    $routes->get('create', 'DoctorController::create');
    $routes->post('store', 'DoctorController::store');
    $routes->get('edit/(:num)', 'DoctorController::edit/$1');
    $routes->post('update/(:num)', 'DoctorController::update/$1');
    $routes->get('delete/(:num)', 'DoctorController::delete/$1');
});

$routes->group('staff', ['namespace' => 'App\Controllers'], function($routes) {
    $routes->get('/', 'StaffController::index');
    $routes->get('create', 'StaffController::create');
    $routes->post('store', 'StaffController::store');
    $routes->get('edit/(:num)', 'StaffController::edit/$1');
    $routes->post('update/(:num)', 'StaffController::update/$1');
    $routes->get('delete/(:num)', 'StaffController::delete/$1');
});



$routes->get('/staff', 'StaffController::index');
$routes->get('/staff/create', 'StaffController::create');
$routes->post('/staff/store', 'StaffController::store');
$routes->get('/staff/edit/(:num)', 'StaffController::edit/$1');
$routes->post('/staff/update/(:num)', 'StaffController::update/$1');
$routes->get('/staff/delete/(:num)', 'StaffController::delete/$1');


$routes->get('/appointments', 'AppointmentController::index');
$routes->get('/appointments/create', 'AppointmentController::create');
$routes->post('/appointments/store', 'AppointmentController::store');
$routes->get('/appointments/edit/(:num)', 'AppointmentController::edit/$1');
$routes->post('/appointments/update/(:num)', 'AppointmentController::update/$1');
$routes->get('/appointments/delete/(:num)', 'AppointmentController::delete/$1');


$routes->get('/pharmacy', 'PharmacyController::index');
$routes->get('/pharmacy/create', 'PharmacyController::create');
$routes->post('/pharmacy/store', 'PharmacyController::store');
$routes->get('/pharmacy/edit/(:num)', 'PharmacyController::edit/$1');
$routes->post('/pharmacy/update/(:num)', 'PharmacyController::update/$1');
$routes->get('/pharmacy/delete/(:num)', 'PharmacyController::delete/$1');


// Lab Technicians
$routes->get('/lab/technicians', 'LabController::technicians');
$routes->get('/lab/technicians/create', 'LabController::createTechnician');
$routes->post('/lab/technicians/store', 'LabController::storeTechnician');
$routes->get('/lab/technicians/edit/(:num)', 'LabController::editTechnician/$1');
$routes->post('/lab/technicians/update/(:num)', 'LabController::updateTechnician/$1');
$routes->get('/lab/technicians/delete/(:num)', 'LabController::deleteTechnician/$1');

// Lab Tests
$routes->get('/lab/tests', 'LabController::tests');
$routes->get('/lab/tests/create', 'LabController::createTest');
$routes->post('/lab/tests/store', 'LabController::storeTest');
$routes->get('/lab/tests/edit/(:num)', 'LabController::editTest/$1');
$routes->post('/lab/tests/update/(:num)', 'LabController::updateTest/$1');
$routes->get('/lab/tests/delete/(:num)', 'LabController::deleteTest/$1');



$routes->group('admin', function($routes){
    // Reports
    $routes->get('reports', 'Admin\Reports::index');
    $routes->post('reports/generate', 'Admin\Reports::generate');
    $routes->get('reports/export/(:segment)/(:segment)/(:segment)', 'Admin\Reports::export/$1/$2/$3'); 
    // export/{type}/{from}/{to}
});


$routes->group('doctor', function($routes){
    $routes->get('patients', 'Doctor\Patients::index');          
    $routes->get('patients/view/(:num)', 'Doctor\Patients::view/$1'); 
    $routes->get('patients/edit/(:num)', 'Doctor\Patients::edit/$1'); 
    $routes->post('patients/update/(:num)', 'Doctor\Patients::update/$1');
});


$routes->group('doctor', function($routes){
    $routes->get('appointments', 'Doctor\Appointments::index');            // List appointments
    $routes->get('appointments/view/(:num)', 'Doctor\Appointments::view/$1');  // View details
    $routes->get('appointments/edit/(:num)', 'Doctor\Appointments::edit/$1');  // Update status
    $routes->post('appointments/update/(:num)', 'Doctor\Appointments::update/$1'); // Save update
});



$routes->group('doctor', function($routes){
    $routes->get('prescriptions', 'Doctor\Prescriptions::index');              // List prescriptions
    $routes->get('prescriptions/create/(:num)', 'Doctor\Prescriptions::create/$1'); // Create new prescription for patient
    $routes->post('prescriptions/store', 'Doctor\Prescriptions::store');       // Save prescription
    $routes->get('prescriptions/view/(:num)', 'Doctor\Prescriptions::view/$1');    // View prescription
    $routes->get('prescriptions/edit/(:num)', 'Doctor\Prescriptions::edit/$1');    // Edit prescription
    $routes->post('prescriptions/update/(:num)', 'Doctor\Prescriptions::update/$1'); // Update prescription
});


$routes->group('doctor', function($routes) {
    $routes->get('lab-tests', 'Doctor\LabTests::index');           // List all tests
    $routes->get('lab-tests/request', 'Doctor\LabTests::request'); // Request new test
    $routes->post('lab-tests/store', 'Doctor\LabTests::store');    // Save request
    $routes->get('lab-tests/view/(:num)', 'Doctor\LabTests::view/$1'); // View test result
    $routes->get('lab-tests/edit/(:num)', 'Doctor\LabTests::edit/$1'); // Update result/remarks
    $routes->post('lab-tests/update/(:num)', 'Doctor\LabTests::update/$1');
});



$routes->group('doctor', function($routes){
    // Patient communication
    $routes->get('communications', 'Doctor\Communications::index');            // Inbox / Dashboard
    $routes->get('communications/send', 'Doctor\Communications::sendForm');    // Compose message
    $routes->post('communications/send', 'Doctor\Communications::send');       // Submit message
    $routes->get('communications/view/(:num)', 'Doctor\Communications::view/$1'); // View message
});
