<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->setAutoRoute(true);
$routes->get('(:any)/ceksaldo', 'Deposit::GetSupplierBalance/$1');
$routes->get('(:any)/penjualan/periode', 'Sales::GetSalesByDate/$1');
$routes->get('(:any)/penjualan', 'Sales::GetSales/$1');

$routes->get('/', 'Kpi::index');
$routes->get('/kpi', 'Kpi::index');
$routes->get('/ceksaldo', 'Ceksaldo::index');
$routes->get('/penjualan', 'Penjualan::index');
$routes->get('/penjualan/periode', 'Penjualan::periode');

$routes->get('/supplier', 'Finance\Supplier::GetAll');
$routes->get('/supplier/add', 'Finance\Supplier::Add');
$routes->get('/supplier/status', 'Finance\Supplier::Update');
$routes->post('/supplier/create', 'Finance\Supplier::Create');

$routes->get('/deposit/add', 'Finance\Deposit::Add');
$routes->post('/deposit/getsupplier', 'Finance\Deposit::getSupplier');
$routes->post('/deposit/create', 'Finance\Deposit::Create');
$routes->get('/deposit/cek_pending', 'Finance\Deposit::CheckPending');
$routes->get('/deposit/(:any)/form_upload/(:num)', 'Finance\Deposit::GetDepositById/$1/$2');
$routes->get('/deposit/(:any)/add_reply/(:num)', 'Finance\Deposit::AddReply/$1/$2');
$routes->post('/deposit/(:any)/action_upload', 'Finance\Deposit::CreateUpload/$1');
$routes->post('/deposit/(:any)/action_reply', 'Finance\Deposit::ActionReply/$1');
$routes->get('/deposit/data_transaksi', 'Finance\Deposit::DataTransaksi');
$routes->get('/deposit/cancel', 'Finance\Deposit::Cancel');
$routes->get('/deposit/(:any)/delete_deposit/(:num)', 'Finance\Deposit::DeleteDeposit/$1/$2');

$routes->get('/deposit/(:any)/add', 'Finance\Deposit::Add/$1');
$routes->post('/deposit/(:any)/create', 'Finance\Deposit::Create/$1');

$routes->get('/direct', 'Finance\Deposit::DirectPaymentForm');
$routes->post('/direct/create', 'Finance\Deposit::CreateDirect');
$routes->get('/sn/(:any)/list', 'SN::CheckSN/$1');

$routes->get('/reseller/(:any)/laba', 'Reseller::GetLaba/$1');