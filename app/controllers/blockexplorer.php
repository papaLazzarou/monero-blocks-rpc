<?php namespace controllers;
use core\view;
/*
 * Blockexplorer controller
 *
 * @author Pigamura - papa_lazzarou@yahoo.com
 * @version 0.1
 * @date December, 2014
 */
class Blockexplorer extends \core\controller{

	/**
	 * call the parent construct
	 */
	public function __construct(){
		parent::__construct();

		$this->language->load('welcome');
	}

	public function index() {
//		$rpccalls = new \models\rpc_calls();
		$database = new \models\database();

		$data = $this->get_network_data();
		$height = $data['height'];

		$list_size = 50;

		$block_list = json_decode($database->list_blocks($height, $list_size),true); //TODO: parametrizar o nº de blocos que se vê ao início

//		var_dump($block_list);

/*
		for ($x = 1; $x <= 10; $x++) {

			$h = $height - $x;

			$blockheader = json_decode($rpccalls->getBlockHeaderByHeight($h),true);
			$blockheader = $blockheader['result']['block_header'];

			$block_info['height_'] = $blockheader['height'];
			$block_info['lb_hash'] = $blockheader['hash'];
			$block_info['lb_height'] = $blockheader['height'];
			$block_info['lb_timestamp'] = date('Y-m-d H:i:s ',$blockheader['timestamp']);

			$block_full = $rpccalls->getBlockInfoByHash($blockheader['hash']);
			$strsize = strlen($block_full);
			$block_full = json_decode($block_full,true);

			$block_info['lb_transactions'] = count($block_full['tx_hashes']);
			$block_info['lb_size'] = $strsize;

			$block_list[$x-1] = $block_info;
		}
*/
		$data['block_list'] = $block_list;

		View::rendertemplate('header', $data);
		View::render('blockexplorer/stats', $data);
		View::render('blockexplorer/main', $data);
		View::rendertemplate('footer', $data);
	}

	public function openBlock($param){
		$view = 'blocks';

		$database = new \models\database();

		$data = $this->get_network_data();
                $data['title'] = 'Block info';
		$data['type'] = 'Block';
		$data['id'] = $param;

		if ($this->isValidHash($param)){
			$result = $database->get_block_by_hash($param);
		}elseif ($this->isValidHeight($param)){
			$result = $database->get_block_by_height($param);
		}else{
			$view = 'notfound';
		}

		if (!empty($result)) {
			$block = $result[0];

			$transactions = $database->get_transactions_by_block($block->height);

			$result = $database->get_coinbase_transaction($block->height);

	                if (!empty($result)) {
        	                $coinbase_tx = $result[0];
                	}

	                $data['block_hash'] = $block->hash;
        	        $data['block_height'] = $block->height;
                	$data['block_diff'] = $block->block_difficulty;
	                $data['block_cumulative_diff'] = $block->cumulative_difficulty;
        	        $data['total_generated_coins'] = $block->coins_generated / 1000000000000;
//              	  $data['block_reward'] = $blockheader['reward'] / 1000000000000;
	                date_default_timezone_set('UTC');
        	        $data['block_timestamp'] = date('Y-m-d H:i:s ',$block->timestamp);
//              	  $data['block_orphan'] = $blockheader['orphan_status'];
	                $data['block_size'] = $block->size;
//      	          $data['block_transactions'] = $total_tx_size;
                	$data['block_tx_nr'] = $block->tx_count;
	                $data['block_tx'] = $transactions;
//      	          $data['tx_array'] = $tx_array;
			$data['coinbase_tx'] = $coinbase_tx;
		}else{
		        $view = 'notfound';
		}

		View::rendertemplate('header', $data);
		View::render('blockexplorer/stats', $data);
		View::render('blockexplorer/'.$view, $data);
		View::rendertemplate('footer', $data);
	}

	public function opentransaction($param){
		$view = 'transaction';

		$rpccalls = new \models\rpc_calls();
		$database = new \models\database();

		$data = $this->get_network_data();

                $data['title'] = 'Transaction details';
                $data['type'] = 'transaction';
                $data['id'] = $param;

		if ($this->isValidHash($param)){
			$result = $database->get_transaction_by_hash($param);

                	if (!empty($result)) {
        	                $transaction = $result[0];

				$height = $transaction->bl_height;
				$txid = $transaction->txid;

				$tx_out = $database->get_vout_by_tx($height, $txid);
				$tx_in = $database->get_vin_by_tx($height, $txid);

				$vinid = 0;
				foreach($tx_in as $in){
					$offsets = $database->get_offsets($height, $txid, $in->vinid);
//					$tx_in[$vinid]['offsets'] = $offets;
					$in->offsets = $offsets;
				$vinid = $vinid +1;
				}

				$data['bl_height'] = $transaction->bl_height;
        	                $data['hash'] = $transaction->hash;
				$data['payment_id'] = $transaction->payment_id;
				$data['unlock_time'] = $transaction->unlock_time;
	                        $data['tx_size'] = $transaction->tx_size;
        	                $data['fee'] = round($transaction->fee / COIN,12);
                	        $data['amount'] = round($transaction->amount / COIN,12);
                        	$data['tx_mixin'] = $transaction->mixin;
	                        $data['tx_in'] = $tx_in;
        	                $data['tx_out'] = $tx_out;
                	        $data['tx_in_nr'] = $transaction->input_count;
                        	$data['tx_out_nr'] = $transaction->output_count;
                $data['offsets'] = $offsets;
			}else{
                        	$view = 'notfound';
                	}
		}else{
			$view = 'notfound';
		}

		View::rendertemplate('header', $data);
		View::render('blockexplorer/stats', $data);
		View::render('blockexplorer/'.$view, $data);
		View::rendertemplate('footer', $data);

	}

	public function search($param){
		$database = new \models\database();

		$result = false;
		$found = false;

		//escape string to prevent sql injection or other attacks
		//echo $param;

		//is it a blockheight value?
		if ($this->isValidHeight($param)){
                        $found = true;
			$this->openBlock($param);
		}else{
			//is it a hash value?
			if($this->isValidHash($param)){
				$result = $this->transaction_exists($param);

				if($result){
                                        $found = true;
                                        $this->opentransaction($param);
				}

				$result = $this->payment_id_exists($param);

				if($result){
                                        $found = true;
					$this->list_tx_by_payment_id($param);
				}

				$result = $this->block_exists($param);

				if($result){
					$found = true;
					$this->openBlock($param);
				}
			}else{

/*				$data['id'] = $param;
				$data['type'] = ' ';
		                View::rendertemplate('header', $data);
        		        View::render('blockexplorer/notfound', $data);
	                	View::rendertemplate('footer', $data);
*/
			}
		}

		if(!$found){
			$data['id'] = $param;
			$data['type'] = ' ';
			View::rendertemplate('header', $data);
			View::render('blockexplorer/notfound', $data);
			View::rendertemplate('footer', $data);
		}
	}

	public function list_tx_by_payment_id($param){
                $database = new \models\database();

                $view = 'list_transactions';
                $data['title'] = 'Transactions';

		$transactions = $database->get_transactions_by_payment_id($param);

                $data = $this->get_network_data();
		$data['payment_id'] = $param;
		$data['tx_list'] = $transactions;

                View::rendertemplate('header', $data);
                View::render('blockexplorer/stats', $data);
                View::render('blockexplorer/'.$view, $data);
                View::rendertemplate('footer', $data);
	}

	public function get_network_data(){
                $database = new \models\database();
//		$rpccalls = new \models\rpc_calls();

                date_default_timezone_set('UTC');
                $stats = json_decode($database->get_stats(),true);
//                var_dump($stats);

//		$info = json_decode($rpccalls->getCoinInfo(), true);
//		$data['diff'] = $info['difficulty'];
//		$data['height'] = $info['height'];
//		$data['hashrate'] = round($info['difficulty'] / 60,2);

//		$lastheader = json_decode($rpccalls->getlastblockheader(), true);
/*
		if($lastheader['result']['status'] == 'OK'){
			$h = $lastheader['result']['block_header']['height'];

			if(is_numeric($h)){
				$blockheader = json_decode($rpccalls->getBlockHeaderByHeight($h),true);
				$reward = $blockheader['result']['block_header']['reward'];

				if(is_numeric($reward)){
					$data['emission'] = round(get_curr_emission($reward) ,4);
				}
			}
		}
*/

		$data['diff'] = $stats[0]['block_difficulty'];
		$data['height'] = $stats[0]['height']+1;
		$data['hashrate'] = round($data['diff'] / 120, 2);
		$data['emission'] = round($stats[0]['coins_generated'],12);
		$data['title'] = 'Welcome';
		$data['welcome_message'] = $this->language->get('welcome_message');

		return $data;
	}

	public function stats() {
	        $data['title'] = 'Nothing to see here';
	        $database = new \models\database();

	        $mixins = [];
	        $m =  $database->get_mixin_stats(1);
	        array_push($mixins, $m[0]);
	        $m =  $database->get_mixin_stats(7);
	        array_push($mixins, $m[0]);
	        $m =  $database->get_mixin_stats(30);
	        array_push($mixins, $m[0]);
	        $m =  $database->get_mixin_stats(365);
			array_push($mixins, $m[0]);

			$txs = [];
	        $t =  $database->get_tx_stats(1);
	        array_push($txs, $t[0]);
	        $t =  $database->get_tx_stats(7);
	        array_push($txs, $t[0]);
	        $t =  $database->get_tx_stats(30);
	        array_push($txs, $t[0]);
	        $t =  $database->get_tx_stats(365);
			array_push($txs, $t[0]);

	        $data['mixins'] = $mixins;
	        $data['txs'] = $txs;
		$medians = $database->get_median_stats();

	        View::rendertemplate('header', $data);
	        View::render('stats/mixin', $data);
	        View::render('stats/txs', $txs);
		View::render('stats/median', $medians);
	        View::rendertemplate('footer', $data);
	}

	public function transaction_exists($param){
		$database = new \models\database();
		$result = $database->check_tx_hash($param);
		return $result[0]->row_count > 0;
	}

         public function payment_id_exists($param){
                $database = new \models\database();
                $result = $database->check_payment_id($param);
                return $result[0]->row_count > 0;
        }

        public function block_exists($param){
                $database = new \models\database();
                $result = $database->check_block_hash($param);
                return $result[0]->row_count > 0;
        }

	/**
	 * Determine if supplied string is a valid Hash
	 *
	 * @param string $str String to validate
	 * @return boolean
	 */
	public function isValidHash($str)
	{
		//return !empty($str) && preg_match('/^[a-f0-9]{64}$/', $str);
		return !empty($str) && preg_match('/^[0-9A-Fa-f]{64}/', $str);
	}

	/**
	 * Determine if supplied string is a valid Height Number
	 *
	 * @param string $str String to validate
	 * @return boolean
	 */
	function isValidHeight($str)
	{
		return !empty($str) && preg_match('/^[0-9]+$/', $str);
	}

	function stats_transactions($period, $records){
		$db = new \models\database();
                $data = $db->getTxStatsDetail($period,$records);

                View::rendertemplate('header', $data);
                View::render('stats/tx_details', $data);
                View::rendertemplate('footer', $data);
	}

	function testing()
	{
		$db = new \models\database();
		$data = $db->getTxStatsDetail("d",30);

                View::rendertemplate('header', $data);
                View::render('stats/testing', $data);
                View::rendertemplate('footer', $data);

//var_dump($data);
//		return $data;
	}
}
