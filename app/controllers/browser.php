<?php namespace controllers;
use core\view;
/*
 * Blockexplorer controller
 *
 * @author Pigamura - papa_lazzarou@yahoo.com
 * @version 0.1
 * @date December, 2014
 */
class Browser extends \core\controller{

	/**
	 * call the parent construct
	 */
	public function __construct(){
		parent::__construct();

		$this->language->load('welcome');
	}

  public function index(){
    $rpccalls = new \models\rpc_calls();
    $blockheader = json_decode($rpccalls->getLastBlockHeader(),true);
    $last_height = $blockheader['result']['block_header']['height'];


    $this->blocks($last_height);
  }

	public function blocks($param){
		$database = new \models\database();
		$view = 'notfound';
		$data['type'] = 'Block';
		$data['id'] = $param;

	      	$list_size = 50;

		if ($this->isValidHeight($param)){
			$block_list = json_decode($database->list_blocks($param, $list_size),true);

			$stats =  json_decode($database->get_stats(), false);
			$last_height = $stats[0]->height;

		      	$h = ($param > $last_height ? $last_height : $param);

		      	$previous_page_start = $h + $list_size;

			$h = $h - $list_size;
			$data['last_height'] = $last_height;
          		$data['block_list'] = $block_list;
      			$data['previous'] = $previous_page_start;
	          	$data['next'] = ($h >= 0 ? $h : -1);

			$view = 'blockheaders';
		}

		View::rendertemplate('header', $data);
		View::render('blockexplorer/'.$view, $data);
		View::rendertemplate('footer', $data);

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
}
