<?php namespace models;
  class Database extends \core\model {

    	function __construct(){
      		parent::__construct();
    	}

    	public function get_stats(){
      		return json_encode($this->_db->select('SELECT height, coins_generated, block_difficulty, timestamp, tx.amount as reward FROM blocks join transactions tx ON height = tx.bl_height AND coinbase_tx = 1 ORDER BY height DESC LIMIT 1;'));
    	}

	public function list_blocks($start_height, $list_size = 20){
		return json_encode($this->_db->select('SELECT height, size, tx_count, hash, timestamp FROM blocks WHERE height <= '.$start_height.' ORDER BY height DESC LIMIT '.$list_size.';'));
    	}

	public function get_block_by_hash($hash){
		return $this->_db->select("SELECT * from blocks WHERE hash = '".$hash."'");
	}

	public function get_block_by_height($height){
		return $this->_db->select("SELECT * from blocks WHERE height = ".$height.";");
	}

	public function get_transactions_by_block($height){
		return $this->_db->select("SELECT * from transactions WHERE coinbase_tx = 0 and bl_height = ".$height.";");
	}

	public function get_coinbase_transaction($height){
		return $this->_db->select("SELECT * from vw_coinbase_tx WHERE bl_height = ".$height.";");
	}

	public function get_transaction_by_hash($hash){
		return $this->_db->select("SELECT * FROM transactions WHERE hash = '".$hash."';");
	}

	public function get_vout_by_tx($height, $tx_id){
		return $this->_db->select("SELECT * FROM vout WHERE bl_height = ".$height." AND txid = ".$tx_id.";");
	}

	public function get_vin_by_tx($height, $tx_id){
		return $this->_db->select("SELECT * FROM vin WHERE bl_height = ".$height." AND txid = ".$tx_id.";");
	}

	public function get_transactions_by_payment_id($payment_id){
		return $this->_db->select("SELECT * FROM vw_payment_id WHERE payment_id = '".$payment_id."';");
	}

	public function check_tx_hash($hash){
		return $this->_db->select("SELECT count(hash) row_count FROM transactions WHERE hash = '".$hash."';");
	}

	public function check_payment_id($payment_id){
		return $this->_db->select("SELECT count(hash) row_count FROM vw_payment_id WHERE payment_id = '".$payment_id."';");
	}

	public function check_block_hash($hash){
		return $this->_db->select("SELECT count(hash) row_count FROM blocks WHERE hash = '".$hash."';");
	}

	public function get_mixin_stats($days){
		return $this->_db->select("Call get_mixin_stats(".$days.");");
	}

	public function get_tx_stats($days){
		return $this->_db->select("Call get_tx_per_block(".$days.");");
	}

	public function get_offsets($height, $tx_id, $vinid=0){
		return $this->_db->select("Call get_offset_link(".$height.",".$tx_id.",".$vinid.");");
	}

	public function get_median_stats(){

		$result = $this->_db->select("SELECT height, size FROM blocks order by height desc limit 1000;",[],\PDO::FETCH_ASSOC);

		$rs = array_column($result, "size");

		$arr200 = array_slice($rs,0,200);
		$arr400 = array_slice($rs,0,400);
		$arr600 = array_slice($rs,0,600);
		$arr800 = array_slice($rs,0,800);

		$ret["median200"] = $this->calculateMedian($arr200);
		$ret["median400"] = $this->calculateMedian($arr400);
		$ret["median600"] = $this->calculateMedian($arr600);
		$ret["median800"] = $this->calculateMedian($arr800);
		$ret["median1000"] = $this->calculateMedian($rs);
		return $ret;

//		return $result;

	}

	public static function calculateMedian($arr) {

		sort($arr);
		$count = count($arr);
		$middleval = floor(($count-1)/2);

		if($count % 2) {
			$median = $arr[$middleval];
		} else {
			$low = $arr[$middleval];
			$high = $arr[$middleval+1];
			$median = (($low+$high)/2);
		}
		return $median;
	}

  public function getTxStatsDetail($period = "m", $records = 12) {

    if ($records > 120) {
      $records = 120;
    }

    if ($records < 1 ) {
      $records = 10;
    }

    switch ($period) {
      case "m":
        $viewname = "vwTxCountByMonth";
        break;
      case "h":
        $viewname = "vwTxCountByHour";
        break;
      default:
        $viewname = "vwTxCountByDay";
    }

    $result = $this->_db->select("SELECT * FROM ".$viewname." LIMIT ".$records.";");

    return $result;
  }
}
