
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaction extends CI_Controller {

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
		$this->load->model('admin/operator_model','operator_model');
        $this->load->model('admin/transaksi_model','transaksi');
        if (!$this->session->userdata('username')) {
            redirect("login/admin");
        }
    }
    public function index()
    {
    	$data['admin'] = $this->operator_model->viewadmin()->row_array();
        $data['transaksi'] = $this->transaksi->transaksi();
        $data['notif_masuk'] = $this->operator_model->masuk_notif();
        $data['tot_masuk'] = $this->operator_model->tot_masuk();
        $this->load->view('admin/header',$data);
        $this->load->view('admin/customer/transaksi_customer_list',$data);
        $this->load->view('admin/footer');
    }

    public function process()
    {
    	$order_id = $this->input->get('order_id');
		$data = $this->veritrans->status($order_id);
		echo json_encode($data);
    }

	public function status($order_id)
	{
		echo 'test get status </br>';
		print_r ($this->veritrans->status($order_id) );
		
	}

	public function cancel($order_id)
	{
		echo 'test cancel trx </br>';
		echo $this->veritrans->cancel($order_id);
	}

	public function approve($order_id)
	{
		echo 'test get approve </br>';
		print_r ($this->veritrans->approve($order_id) );
	}

	public function expire($order_id)
	{
		echo 'test get expire </br>';
		print_r ($this->veritrans->expire($order_id) );
	}
	public function print(){
        $data['print'] = $this->transaksi->print_transaksi();
        $this->load->view('admin/customer/print',$data);
    }
    public function update_transaksi(){
        $this->transaksi->update_transaksi();
    }
}
?>
