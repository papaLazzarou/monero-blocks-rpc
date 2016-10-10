<?php namespace models;

class Rpc_calls extends \core\model {
	function __construct(){
		//parent::__construct();
	}

	public function getCoinInfo(){

		$data = array('id' => '0', 'jsonrpc' => '0');
		$data_string = json_encode($data);
		$url = 'http://127.0.0.1:18081/getinfo';

		$result = $this->rpc_call($data_string, $url);

		return $result;
	}

	public function getBlockHeaderByHash($hash){

		$params = array("hash" => $hash);
		$data = array('id' => '0', 'jsonrpc' => '0', 'method' => 'getblockheaderbyhash', 'params' => $params);
		$data_string = json_encode($data);

		$url = 'http://127.0.0.1:18081/json_rpc';
		$result = $this->rpc_call($data_string, $url);

		return $result;
	}

	public function getBlockHeaderByHeight($height){
	//getblockheaderbyheight:
		$params = array("height" => (int)$height );
		$data = array('id' => '0', 'jsonrpc' => '0', 'method' => 'getblockheaderbyheight', 'params' => $params);
		$data_string = json_encode($data);

		$url = 'http://127.0.0.1:18081/json_rpc';
		$result = $this->rpc_call($data_string, $url);

	return $result;
	}


	public function getHeight($data_string, $url){

		$data = array('id' => '0', 'jsonrpc' => '0');
		$data_string = json_encode($data);
		$url = 'http://127.0.0.1:18081/getheight';

		$result = $this->rpc_call($data_string, $url);

		return $result;
	}

        public function isKeyImageSpent($key_images){

		$data = array('key_images' => [$key_images]);
                $data_string = json_encode($data);
                $url = 'http://127.0.0.1:18081/is_key_image_spent';

                $result = $this->rpc_call($data_string, $url);

                return $result;
        }

	public function getTransactionList($tx_list){

		$data = array('txs_hashes' => $tx_list);
		$data_string = json_encode($data);

		$url = 'http://127.0.0.1:18081/gettransactions';
		$result = $this->rpc_call($data_string, $url);

		return $result;
	}

	public function getTransactionHex($param){
		$data = array('txs_hashes' => [$param]);
		$data_string = json_encode($data);

		$url = 'http://127.0.0.1:18081/gettransactions';
		$result = $this->rpc_call($data_string, $url);

		return $result;
	}

	public function getLastBlockHeader(){
		$data = array('id' => '0', 'jsonrpc' => '0', 'method' => 'getlastblockheader', 'params' => json_decode("{}"));     
		$data_string = json_encode($data);

		$url = 'http://127.0.0.1:18081/json_rpc';
		$result = $this->rpc_call($data_string, $url);

		return $result;
	}

	public function getBlockInfoByHash($param){

		$url = 'http://127.0.0.1:18081';
		$result = getBlockInfo($param, $url);

		return $result;
	}

	function rpc_call($data_string, $url){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($data_string))
		);

		$result = curl_exec($ch);

		return $result;
	}
}
