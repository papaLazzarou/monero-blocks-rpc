<?php namespace controllers;
use core\view;

/*
 * Static controller
 *
 * @version 1.1
 * @date March 27, 2015
 */

class Pages extends \core\controller{

	/**
	 * call the parent construct
	 */
	public function __construct(){
		parent::__construct();

		$this->language->load('welcome');
	}

	/**
	 * define page title and load template files
	 */
	public function index() {
		$data['title'] = 'Nothing to see here';
//		$data['welcome_message'] = $this->language->get('welcome_message');

		View::rendertemplate('header', $data);
		View::render('welcome/static', $data);
		View::rendertemplate('footer', $data);
	}

        public function richlist() {
                $data['title'] = 'Nothing to see here';

                View::rendertemplate('header', $data);
                View::render('static/richlist', $data);
                View::rendertemplate('footer', $data);
        }

        public function maintenance() {
                $data['title'] = 'Under maintenance';
		$data['nosearch'] = 1;
		$data['nonav'] = 1;
                View::rendertemplate('header', $data);
                View::render('static/maintenance', $data);
                View::rendertemplate('footer', $data);
        }

        public function warning() {
                $data['title'] = 'Scheduled hardfork';
                View::rendertemplate('header', $data);
                View::render('static/warning', $data);
                View::rendertemplate('footer', $data);
        }
}
