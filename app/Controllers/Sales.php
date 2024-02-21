<?php

namespace App\Controllers;
use App\Models\ProviderModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class Sales extends BaseController
{
    use ResponseTrait;
    public function index()
	{
        $client = service('curlrequest');
        $getDepositToday = $client->request("GET", getenv('API_HOST')."/api/eps/sales", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
		]);

        $res = json_decode($getDepositToday->getBody(), true);
        $response['data'] = $res['data'] ?? array();

        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
            array('label' => 'Penjualan Hari Ini', 'url' => '', 'active' => true)
        );

        echo view('admin/dashboard/sales_view', $response);
	}

    public function get_sales()
	{
        $client = service('curlrequest');
        $getDepositToday = $client->request("GET", getenv('API_HOST')."/api/eps/salesProd", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
		]);

        $res = json_decode($getDepositToday->getBody(), true);
        $response['data'] = $res['data'] ?? array();

        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
            array('label' => 'Penjualan Hari Ini Amazon', 'url' => '', 'active' => true)
        );

        echo view('admin/dashboard/sales_view', $response);
	}


    public function salesPeriode()
	{
        $params = $this->request->getGet();
        $from = $params['startDt'] ?? '';
        $to = $params['endDt'] ?? '';


        $client = service('curlrequest');
        $getSalesPeriode = $client->request("GET", getenv('API_HOST')."/api/eps/salesPeriode?startDate=$from&endDate=$to", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
		]);

        $res = json_decode($getSalesPeriode->getBody(), true);
        $response['data'] = $res['data'] ?? array();

        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
            array('label' => 'Penjualan', 'url' => '', 'active' => true)
        );

        echo view('admin/dashboard/sales_periode_view', $response);
	}

    public function get_sales_periode()
	{
        $params = $this->request->getGet();
        $from = $params['startDt'] ?? '';
        $to = $params['endDt'] ?? '';


        $client = service('curlrequest');
        $getSalesPeriode = $client->request("GET", getenv('API_HOST')."/api/eps/salesPeriodeProd?startDate=$from&endDate=$to", [
			"headers" => [
				"Accept" => "application/json",
                "Content-Type" => "application/json"
			],
		]);

        $res = json_decode($getSalesPeriode->getBody(), true);
        $response['data'] = $res['data'] ?? array();

        $response['breadcrumb'] = array(
            array('label' => 'Home', 'url' => '/', 'active' => false),
            array('label' => 'Penjualan Amazon', 'url' => '', 'active' => true)
        );

        echo view('admin/dashboard/sales_periode_amz', $response);
	}

}