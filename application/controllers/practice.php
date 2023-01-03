<?php
defined('BASEPATH') or exit('No direct script access allowed');

class practice extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        // $this->load->model('main_model');
    }


    public function index()
    {
        // $new_data['data'] = $this->main_model->getAllMissingCashbackStores(1);
        // foreach ($new_data['data'] as $value) {
        //     $link_status['data'][] =  $this->main_model->getStoreLinkStatusByMerchantId($value->merchant_id, 1);
        //     $store_details['store_data'][] = $this->main_model->getAllStoreDetails($value->store_id);
        // }
        $this->load->view('main');
    }
}
