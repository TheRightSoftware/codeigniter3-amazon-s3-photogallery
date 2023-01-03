
<?php
class main_model extends CI_Model
{

    // public $title;
    // public $content;
    // public $date;

    // public function get_last_ten_entries()
    // {
    //     $query = $this->db->get('entries', 10);
    //     return $query->result();
    // }

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function getAllMissingCashbackStores($network_id)
    {
        $sql = "SELECT s.name, s.store_id, su.network_id, su.merchant_id, s.status FROM store_network_url su inner join store s ON su.store_id = s.store_id WHERE NOT EXISTS (SELECT sc.store_cashback_id FROM store_cashback sc WHERE sc.store_id = su.store_id AND sc.cashback_status = 'live' AND sc.override_cashback_status = 'active') AND su.network_id =$network_id AND su.status = 'active' AND s.status != 'disabled' AND s.status != 'closed at network' ORDER BY s.store_id ASC";
        $data = $this->db->query($sql);
        return $data->result() ? $data->result() : false;
    }
    public function getStoreLinkStatusByMerchantId($merchant_id, $network_id)
    {
        $data = $this->db->select('status as merged_status, merchant_id, store_id')->from('store_network_url')->where('merchant_id', $merchant_id)->where('network_id', $network_id)->get()->row();
        return $data ? $data : false;
    }
    public function getAllStoreDetails($store_id)
    {
        $store_data = $this->db->select('s.status, s.status_description, s.store_id, s.override_cashback, s.override_category, sn.network_id, sn.merchant_id')->from('store as s')->join('store_network_url as sn', 's.store_id = sn.store_id')->where('s.store_id', $store_id)->get()->row();
        if ($store_data) {
            return $store_data;
        }
        return false;
    }
}

?>