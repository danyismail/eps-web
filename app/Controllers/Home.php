<?php

namespace App\Controllers;
use App\Models\ProviderModel; 
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\IncomingRequest;

class Home extends BaseController
{
    public function getProduct()
	{
        if (isset($_POST['filterTanggal'])){
            $startDt = $_POST['startDt'];
            $endDt = $_POST['endDt'];
            $this->indexWithDate($startDt, $endDt);
        } else {
            $this->index();
        }
    }

    use ResponseTrait;
    public function index()
	{
        $db = \Config\Database::connect();
        $provider = new ProviderModel();
        $results = $provider->orderBy('name', 'ASC')->findAll();  

        $response['data'] = array();

        foreach ($results as $key) {
            $sql = 'SELECT * from v_report_by_provider_product_type WHERE provider = ?';
            $query  = $db->query($sql, $key['name']);
            $detail = $query->getResultArray();
            $countData = 0;
            $countReg = 0;
            $countSms = 0;
            $countTlp = 0;
            $countTf = 0;
            $countVc = 0;
            $countEc = 0;
            $countPln = 0;
            $countGame = 0;

            $mData = 0;
            $mReg = 0;
            $mSms = 0;
            $mTlp = 0;
            $mTf = 0;
            $mVc = 0;
            $mEc = 0;
            $mPln = 0;
            $mGame = 0;
            
            foreach ($detail as $dd){
                if ($dd['product_type'] === 'DATA'){
                    $countData = $dd['trx'];
                    $mData = $dd['margin'];
                }
                if ($dd['product_type'] === 'REGULER'){
                    $countReg = $dd['trx'];
                    $mReg = $dd['margin'];
                }
                if ($dd['product_type'] === 'SMS'){
                    $countSms = $dd['trx'];
                    $mSms = $dd['margin'];
                }
                if ($dd['product_type'] === 'TELP'){
                    $countTlp = $dd['trx'];
                    $mTlp = $dd['margin'];
                }
                if ($dd['product_type'] === 'TRANSFER'){
                    $countTf = $dd['trx'];
                    $mTf = $dd['margin'];
                }
                if ($dd['product_type'] === 'VOUCHER'){
                    $countVc = $dd['trx'];
                    $mVc = $dd['margin'];
                }
                if ($dd['product_type'] === 'ECOMMERCE'){
                    $countEc = $dd['trx'];
                    $mEc = $dd['margin'];
                }
                if ($dd['product_type'] === 'PLN'){
                    $countPln = $dd['trx'];
                    $mPln = $dd['margin'];
                }
                if ($dd['product_type'] === 'GAME'){
                    $countGame = $dd['trx'];
                    $mGame = $dd['margin'];
                }
            }
            array_push($response['data'],array
                (
                    'name'   => $key['name'],
                    'trx_data'   => $countData,
                    'trx_reguler'   => $countReg,
                    'trx_sms'   => $countSms,
                    'trx_voucher'   => $countVc,
                    'trx_transfer'   => $countTf,
                    'trx_telepon'   => $countTlp,
                    'trx_ec'   => $countEc,
                    'trx_pln'   => $countPln,
                    'trx_game'   => $countGame,
                    'margin_data' => $mData,
                    'margin_reguler' => $mReg,
                    'margin_sms' => $mSms,
                    'margin_voucher' => $mVc,
                    'margin_transfer' => $mTf,
                    'margin_telepon' => $mTlp,
                    'margin_ec' => $mEc,
                    'margin_pln' => $mPln,
                    'margin_game' => $mGame
                 )
            );
        }

        // return $this->respond($response);
        echo view('admin/dashboard/index', $response);
	}

    public function indexWithDate(string $startDt, string $endDt)
	{
        $startDt = date("Y-m-d H:i:s", strtotime($startDt));
        $endDt = date("Y-m-d H:i:s", strtotime($endDt));
        $db = \Config\Database::connect();
        $provider = new ProviderModel();
        $results = $provider->orderBy('name', 'ASC')->findAll();  

        $response['data'] = array();

        foreach ($results as $key) {
            $sql = "SELECT format_date ,provider ,product_type ,COUNT(1) as trx,ROUND(sum(margin)) as margin ,ROUND(sum(loss)) as loss from v_reporting vr group by provider,product_type HAVING format_date BETWEEN '" . $startDt . "' AND '" . $endDt ."'" . "AND provider in (" . "'".$key['name']."'".")";
            $query  = $db->query($sql);
            $detail = $query->getResultArray();
            $countData = 0;
            $countReg = 0;
            $countSms = 0;
            $countTlp = 0;
            $countTf = 0;
            $countVc = 0;
            $countEc = 0;
            $countPln = 0;
            $countGame = 0;

            $mData = 0;
            $mReg = 0;
            $mSms = 0;
            $mTlp = 0;
            $mTf = 0;
            $mVc = 0;
            $mEc = 0;
            $mPln = 0;
            $mGame = 0;
            
            foreach ($detail as $dd){
                if ($dd['product_type'] === 'DATA'){
                    $countData = $dd['trx'];
                    $mData = $dd['margin'];
                }
                if ($dd['product_type'] === 'REGULER'){
                    $countReg = $dd['trx'];
                    $mReg = $dd['margin'];
                }
                if ($dd['product_type'] === 'SMS'){
                    $countSms = $dd['trx'];
                    $mSms = $dd['margin'];
                }
                if ($dd['product_type'] === 'TELP'){
                    $countTlp = $dd['trx'];
                    $mTlp = $dd['margin'];
                }
                if ($dd['product_type'] === 'TRANSFER'){
                    $countTf = $dd['trx'];
                    $mTf = $dd['margin'];
                }
                if ($dd['product_type'] === 'VOUCHER'){
                    $countVc = $dd['trx'];
                    $mVc = $dd['margin'];
                }
                if ($dd['product_type'] === 'ECOMMERCE'){
                    $countEc = $dd['trx'];
                    $mEc = $dd['margin'];
                }
                if ($dd['product_type'] === 'PLN'){
                    $countPln = $dd['trx'];
                    $mPln = $dd['margin'];
                }
                if ($dd['product_type'] === 'GAME'){
                    $countGame = $dd['trx'];
                    $mGame = $dd['margin'];
                }
            }
            array_push($response['data'],array
                (
                    'name'   => $key['name'],
                    'trx_data'   => $countData,
                    'trx_reguler'   => $countReg,
                    'trx_sms'   => $countSms,
                    'trx_voucher'   => $countVc,
                    'trx_transfer'   => $countTf,
                    'trx_telepon'   => $countTlp,
                    'trx_ec'   => $countEc,
                    'trx_pln'   => $countPln,
                    'trx_game'   => $countGame,
                    'margin_data' => $mData,
                    'margin_reguler' => $mReg,
                    'margin_sms' => $mSms,
                    'margin_voucher' => $mVc,
                    'margin_transfer' => $mTf,
                    'margin_telepon' => $mTlp,
                    'margin_ec' => $mEc,
                    'margin_pln' => $mPln,
                    'margin_game' => $mGame
                 )
            );
        }

        // return $this->respond($response);
        echo view('admin/dashboard/index', $response);
	}



    public function productReport()
	{
    $db = \Config\Database::connect();
    $query   = $db->query('SELECT * FROM v_report_by_provider_product_type');
    $results['products'] = $query->getResultArray();
    // return $this->respond($results);
    echo view('admin/dashboard/category_by_provider', $results);
	}

}
