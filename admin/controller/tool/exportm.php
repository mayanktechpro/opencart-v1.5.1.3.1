<?php 
class ControllerToolExportm extends Controller { 
	private $error = array();
	
	public function index() {
		$this->load->language('tool/exportm');
		$this->document->setTitle($this->language->get('heading_title'));
		$this->load->model('tool/exportm');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && ($this->validate())) {
			if ((isset( $this->request->files['upload'] )) && (is_uploaded_file($this->request->files['upload']['tmp_name']))) {
				$file = $this->request->files['upload']['tmp_name'];
				if ($this->model_tool_exportm->upload($file)) {
					$this->session->data['success'] = $this->language->get('text_success');
					$this->redirect($this->url->link('tool/exportm', 'token=' . $this->session->data['token'], 'SSL'));
				}
				else {
					$this->error['warning'] = $this->language->get('error_upload');
				}
			} else if ((isset( $this->request->files['uploadRomanian'] )) && (is_uploaded_file($this->request->files['uploadRomanian']['tmp_name']))) {
				$file = $this->request->files['uploadRomanian']['tmp_name'];
				if ($this->model_tool_exportm->uploadRomanian($file)) {
					$this->session->data['success_romanian'] = $this->language->get('text_success_romanian');
					$this->redirect($this->url->link('tool/exportm', 'token=' . $this->session->data['token'], 'SSL'));
				}
				else {
					$this->error['warning'] = $this->language->get('error_upload');
				}
			}
		}

		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->data['heading_title_romanian'] = $this->language->get('heading_title_romanian');
		$this->data['entry_restore'] = $this->language->get('entry_restore');
		$this->data['entry_description'] = $this->language->get('entry_description');
		$this->data['entry_restore_romanian'] = $this->language->get('entry_restore_romanian');
		$this->data['entry_description_romanian'] = $this->language->get('entry_description_romanian');
		$this->data['entry_description2'] = $this->language->get('entry_description2');
		$this->data['button_import'] = $this->language->get('button_import');
		$this->data['button_export'] = $this->language->get('button_export');
		$this->data['tab_general'] = $this->language->get('tab_general');

 		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}
		
		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];
		
			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}

		if (isset($this->session->data['success_romanian'])) {
			$this->data['success_romanian'] = $this->session->data['success_romanian'];
		
			unset($this->session->data['success_romanian']);
		} else {
			$this->data['success_romanian'] = '';
		}
		
		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => FALSE
		);

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('tool/exportm', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => ' :: '
		);
		
		$this->data['action'] = $this->url->link('tool/exportm', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['action_romanian'] = $this->url->link('tool/exportm', 'token=' . $this->session->data['token'], 'SSL');

		$this->data['exportm'] = $this->url->link('tool/exportm/download', 'token=' . $this->session->data['token'], 'SSL');
		$this->data['exportm_romanian'] = $this->url->link('tool/exportm/downloadRomanian', 'token=' . $this->session->data['token'], 'SSL');


		$this->template = 'tool/exportm.tpl';
		$this->children = array(
			'common/header',
			'common/footer',
		);
		$this->response->setOutput($this->render());
	}


	public function download() {
		if ($this->validate()) {

			// set appropriate memory and timeout limits
			ini_set("memory_limit","128M");
			set_time_limit( 1800 );

			// send the categories, products and options as a spreadsheet file
			$this->load->model('tool/exportm');
			$this->model_tool_exportm->download();

		} else {

			// return a permission error page
			return $this->forward('error/permission');
		}
	}

	public function downloadRomanian() {
		if ($this->validate()) {

			// set appropriate memory and timeout limits
			ini_set("memory_limit","128M");
			set_time_limit( 1800 );

			// send the categories, products and options as a spreadsheet file
			$this->load->model('tool/exportm');
			$this->model_tool_exportm->downloadRomanian();

		} else {

			// return a permission error page
			return $this->forward('error/permission');
		}
	}


	private function validate() {
		if (!$this->user->hasPermission('modify', 'tool/exportm')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}
		
		if (!$this->error) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
}
?>