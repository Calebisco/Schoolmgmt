<?php 
/**
 * Invoice Page Controller
 * @category  Controller
 */
class InvoiceController extends SecureController{
	/**
     * Load Record Action 
     * $arg1 Field Name
     * $arg2 Field Value 
     * $param $arg1 string
     * $param $arg1 string
     * @return View
     */
	function index($fieldname = null , $fieldvalue = null){
		$db = $this->GetModel();
		$tablename = $this->tablename = 'invoice';
		$fields = array('invoice_id', 'student_id', 'title', 'description', 'amount', 'amount_paid', 'due', 'creation_timestamp', 'payment_timestamp', 'payment_method', 'payment_details', 'status');
		$limit = $this->get_page_limit(MAX_RECORD_COUNT); // return pagination from BaseModel Class e.g array(5,20)
		if(!empty($this->search)){
			$text = $this->search;
			$db->orWhere('invoice_id',"%$text%",'LIKE');
			$db->orWhere('student_id',"%$text%",'LIKE');
			$db->orWhere('title',"%$text%",'LIKE');
			$db->orWhere('description',"%$text%",'LIKE');
			$db->orWhere('amount',"%$text%",'LIKE');
			$db->orWhere('amount_paid',"%$text%",'LIKE');
			$db->orWhere('due',"%$text%",'LIKE');
			$db->orWhere('creation_timestamp',"%$text%",'LIKE');
			$db->orWhere('payment_timestamp',"%$text%",'LIKE');
			$db->orWhere('payment_method',"%$text%",'LIKE');
			$db->orWhere('payment_details',"%$text%",'LIKE');
			$db->orWhere('status',"%$text%",'LIKE');
		}
		if(!empty($this->orderby)){ // when order by request fields (from $_GET param)
			$db->orderBy($this->orderby,$this->ordertype);
		}
		else{
			$db->orderBy('invoice_id', ORDER_TYPE);
		}
		if( !empty($fieldname) ){
			$db->where($fieldname , $fieldvalue);
		}
		//page filter command
		$tc = $db->withTotalCount();
		$records = $db->get($tablename, $limit, $fields);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = count($records);
		$data->total_records = intval($tc->totalCount);
		if($db->getLastError()){
			$page_error = $db->getLastError();
			$this->view->page_error = $page_error;
		}
		$this->view->page_title ="Invoice";
		$this->view->render('invoice/list.php' , $data ,'main_layout.php');
	}
	/**
     * Load csv|json data
     * @return data
     */
	function import_data(){
		if(!empty($_FILES['file'])){
			$finfo = pathinfo($_FILES['file']['name']);
			$ext = strtolower($finfo['extension']);
			if(!in_array($ext , array('csv','json'))){
				set_flash_msg("File format not supported",'danger');
			}
			else{
			$file_path = $_FILES['file']['tmp_name'];
				if(!empty($file_path)){
					$db = $this->GetModel();
					$tablename = $this->tablename = 'invoice';
					if($ext == 'csv'){
						$options = array('table' => $tablename, 'fields' => '', 'delimiter' => ',', 'quote' => '"');
						$data = $db->loadCsvData( $file_path , $options , false );
					}
					else{
						$data = $db->loadJsonData( $file_path, $tablename , false );
					}
					if($db->getLastError()){
						set_flash_msg($db->getLastError(),'danger');
					}
					else{
						set_flash_msg("Data imported successfully",'success');
					}
				}
				else{
					set_flash_msg("Error uploading file",'success');
				}
			}
		}
		else{
			set_flash_msg("No file selected for upload",'warning');
		}
		$list_page = (!empty($_POST['redirect']) ? $_POST['redirect'] : 'invoice/list');
		redirect_to_page($list_page);
	}
	/**
     * View Record Action 
     * @return View
     */
	function view( $rec_id = null , $value = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename = 'invoice';
		$fields = array('invoice_id', 'student_id', 'title', 'description', 'amount', 'amount_paid', 'due', 'creation_timestamp', 'payment_timestamp', 'payment_method', 'payment_details', 'status');
		if( !empty($value) ){
			$db->where($rec_id, urldecode($value));
		}
		else{
			$db->where('invoice_id' , $rec_id);
		}
		$record = $db->getOne($tablename, $fields );
		if(!empty($record)){
			$this->view->page_title ="View  Invoice";
			$this->view->render('invoice/view.php' , $record ,'main_layout.php');
		}
		else{
			$page_error = null;
			if($db->getLastError()){
				$page_error = $db->getLastError();
			}
			else{
				$page_error = "No record found";
			}
			$this->view->page_error = $page_error;
			$this->view->render('invoice/view.php' , $record , 'main_layout.php');
		}
	}
	/**
     * Add New Record Action 
     * If Not $_POST Request, Display Add Record Form View
     * @return View
     */
	function add(){
		if(is_post_request()){
			Csrf :: cross_check();
			$db = $this->GetModel();
			$tablename = $this->tablename = 'invoice';
			$fields = $this->fields = array('student_id','title','description','amount','amount_paid','due','creation_timestamp','payment_timestamp','payment_method','payment_details','status'); //insert fields
			$postdata = $this->transform_request_data($_POST);
			$this->rules_array = array(
				'student_id' => 'required|numeric',
				'title' => 'required',
				'description' => 'required',
				'amount' => 'required|numeric',
				'amount_paid' => 'required',
				'due' => 'required',
				'creation_timestamp' => 'required|numeric',
				'payment_timestamp' => 'required',
				'payment_method' => 'required',
				'payment_details' => 'required',
				'status' => 'required',
			);
			$this->sanitize_array = array(
				'student_id' => 'sanitize_string',
				'title' => 'sanitize_string',
				'description' => 'sanitize_string',
				'amount' => 'sanitize_string',
				'amount_paid' => 'sanitize_string',
				'due' => 'sanitize_string',
				'creation_timestamp' => 'sanitize_string',
				'payment_timestamp' => 'sanitize_string',
				'payment_method' => 'sanitize_string',
				'payment_details' => 'sanitize_string',
				'status' => 'sanitize_string',
			);
			$modeldata = $this -> modeldata = $this->validate_form($postdata);
			if(empty($this->view->page_error)){
				$rec_id = $this->rec_id = $db->insert($tablename, $modeldata);
				if(!empty($rec_id)){
					set_flash_msg('','');
					redirect_to_page("invoice");
					return;
				}
				else{
					$page_error = null;
					if($db->getLastError()){
						$page_error = $db->getLastError();
					}
					else{
						$page_error = "Error inserting record";
					}
					$this->view->page_error[] = $page_error;
				}
			}
		}
		$this->view->page_title ="Add New Invoice";
		$this->view->render('invoice/add.php' ,null,'main_layout.php');
	}
	/**
     * Edit Record Action 
     * If Not $_POST Request, Display Edit Record Form View
     * @return View
     */
	function edit($rec_id = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename = 'invoice';
		$fields = $this->fields = array('invoice_id','student_id','title','description','amount','amount_paid','due','creation_timestamp','payment_timestamp','payment_method','payment_details','status'); //editable fields
		if(is_post_request()){
			Csrf :: cross_check();
			$postdata = $this->transform_request_data($_POST);
			$this->rules_array = array(
				'student_id' => 'required|numeric',
				'title' => 'required',
				'description' => 'required',
				'amount' => 'required|numeric',
				'amount_paid' => 'required',
				'due' => 'required',
				'creation_timestamp' => 'required|numeric',
				'payment_timestamp' => 'required',
				'payment_method' => 'required',
				'payment_details' => 'required',
				'status' => 'required',
			);
			$this->sanitize_array = array(
				'student_id' => 'sanitize_string',
				'title' => 'sanitize_string',
				'description' => 'sanitize_string',
				'amount' => 'sanitize_string',
				'amount_paid' => 'sanitize_string',
				'due' => 'sanitize_string',
				'creation_timestamp' => 'sanitize_string',
				'payment_timestamp' => 'sanitize_string',
				'payment_method' => 'sanitize_string',
				'payment_details' => 'sanitize_string',
				'status' => 'sanitize_string',
			);
			$modeldata = $this -> modeldata = $this->validate_form($postdata);
			if(empty($this->view->page_error)){
				$db->where('invoice_id' , $rec_id);
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					set_flash_msg('','');
					redirect_to_page("invoice");
					return;
				}
				else{
					$page_error = null;
					if($db->getLastError()){
						$page_error = $db->getLastError();
					}
					elseif(!$numRows){
						$page_error = "No record updated";
					}
					else{
						$page_error = "No record found";
					}
					$this->view->page_error[] = $page_error;
				}
			}
		}
		$db->where('invoice_id' , $rec_id);
		$data = $db->getOne($tablename, $fields);
		$this->view->page_title ="Edit  Invoice";
		if(!empty($data)){
			$this->view->render('invoice/edit.php' , $data, 'main_layout.php');
		}
		else{
			if($db->getLastError()){
				$this->view->page_error[] = $db->getLastError();
			}
			else{
				$this->view->page_error[] = "No record found";
			}
			$this->view->render('invoice/edit.php' , $data , 'main_layout.php');
		}
	}
	/**
     * Edit single field Action 
     * Return record id
     * @return View
     */
	function editfield($rec_id = null){
		$db = $this->GetModel();
		$this->rec_id = $rec_id;
		$tablename = $this->tablename = 'invoice';
		$fields = $this->fields = array('invoice_id','student_id','title','description','amount','amount_paid','due','creation_timestamp','payment_timestamp','payment_method','payment_details','status'); //editable fields
		if(is_post_request()){
			Csrf :: cross_check();
			$postdata = array();
			if(isset($_POST['name']) && isset($_POST['value'])){
				$fieldname = $_POST['name'];
				$fieldvalue = $_POST['value'];
				$postdata[$fieldname] = $fieldvalue;
				$postdata = $this->transform_request_data($postdata);
			}
			else{
				$this->view->page_error = "invalid post data";
			}
			$this->rules_array = array(
				'student_id' => 'required|numeric',
				'title' => 'required',
				'description' => 'required',
				'amount' => 'required|numeric',
				'amount_paid' => 'required',
				'due' => 'required',
				'creation_timestamp' => 'required|numeric',
				'payment_timestamp' => 'required',
				'payment_method' => 'required',
				'payment_details' => 'required',
				'status' => 'required',
			);
			$this->sanitize_array = array(
				'student_id' => 'sanitize_string',
				'title' => 'sanitize_string',
				'description' => 'sanitize_string',
				'amount' => 'sanitize_string',
				'amount_paid' => 'sanitize_string',
				'due' => 'sanitize_string',
				'creation_timestamp' => 'sanitize_string',
				'payment_timestamp' => 'sanitize_string',
				'payment_method' => 'sanitize_string',
				'payment_details' => 'sanitize_string',
				'status' => 'sanitize_string',
			);
			$modeldata = $this -> modeldata = $this->validate_form($postdata, true);
			if(empty($this->view->page_error)){
				$db->where('invoice_id' , $rec_id);
				try{
					$bool = $db->update($tablename, $modeldata);
					$numRows = $db->getRowCount();
					if($bool && $numRows){
						render_json(
							array(
								'num_rows' =>$numRows,
								'rec_id' =>$rec_id,
							)
						);
					}
					else{
						$page_error = null;
						if($db->getLastError()){
							$page_error = $db->getLastError();
						}
						elseif(!$numRows){
							$page_error = "No record updated";
						}
						else{
							$page_error = "No record found";
						}
						render_error($page_error);
					}
				}
				catch(Exception $e){
					render_error($e->getMessage());
				}
			}
			else{
				render_error($this->view->page_error);
			}
		}
		else{
			render_error("Request type not accepted");
		}
	}
	/**
     * Delete Record Action 
     * @return View
     */
	function delete( $rec_ids = null ){
		Csrf :: cross_check();
		$db = $this->GetModel();
		$this->rec_id = $rec_ids;
		$tablename = $this->tablename = 'invoice';
		//split record id separated by comma into array
		$arr_id = explode(',', $rec_ids);
		//set query conditions for all records that will be deleted
		foreach($arr_id as $rec_id){
			$db->where('invoice_id' , $rec_id,"=",'OR');
		}
		$bool = $db->delete($tablename);
		if($bool){
			set_flash_msg('','');
		}
		else{
			$page_error = "";
			if($db->getLastError()){
				$page_error = $db->getLastError();
			}
			else{
				$page_error = "Error deleting the record. please make sure that the record exit";
			}
			set_flash_msg($page_error,'danger');
		}
		redirect_to_page("invoice");
	}
}
