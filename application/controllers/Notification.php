<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */


	public function __construct()
    {
        parent::__construct();
        $params = array('server_key' => 'SB-Mid-server-JxcoOpQw8TxjcCBt8mgspLwu', 'production' => false);
		$this->load->library('veritrans');
		$this->veritrans->config($params);
		$this->load->helper('url');
		
		$this->load->model("customer/product_model","product");
        // if (!$this->session->userdata('username')) {
        //     redirect('login/index');
        // }
		
    }

	public function index()
	{

// 		if($result){
// 		$notif = $this->veritrans->status($result->order_id);
// 		}
		
// 		error_log(print_r($result,TRUE));

// echo 'test notification handler';
// 		$json_result = file_get_contents('php://input');
// 		$result = json_decode($json_result);

        $customer= $this->product->viewcustomer()->row_array();
        $id = $customer['id'];
		$cek = $this->db->get_where("transaksi",['id_customer'=>$id])->result_array();
		foreach($cek as $yuhu){
		    $order_id = $yuhu['id_order'];
		$notif = $this->veritrans->status($order_id);
		$j = get_object_vars($notif);
		$k = $j['transaction_status'];
		echo 'RESULT <br><pre>';
    	echo $k;
    	echo '</pre>' ;
    	
    
    	
    	
    	
		if($j['transaction_status'] == 'settlement'){
		  //  $status = "Accept";
		  //  $this->product->update_status($status);
		    $this->db->query("UPDATE transaksi SET status_pembayaran='Accept' WHERE id_order='$order_id'");
		  //  $this->detail();
		}
		if($j['transaction_status'] == 'expire'){
		  //  $status = "Expire";
		  //  $this->product->update_status($status);
		    $this->db->query("UPDATE transaksi SET status_pembayaran='Expire' WHERE id_order='$order_id'");
		  //  $this->detail();
	   // redirect('transaksi_customer/riwayat_transaksi');
		}
		if($j['transaction_status'] == 'pending'){
		  //  $status = "Pending";
		  //  $this->product->update_status($status);
		   $this->db->query("UPDATE transaksi SET status_pembayaran='Pending' WHERE id_order='$order_id'"); 
	   // redirect('transaksi_customer/riwayat_transaksi');
		  //  $this->detail();
		}
		}
	    redirect('transaksi_customer/riwayat_transaksi');
// 		redirect('transaksi_customer/transaksi');

	}
		    
	
}
