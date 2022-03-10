<?php 
/**
 * Account Page Controller
 * @category  Controller
 */
class AccountController extends SecureController{
	/**
     * Index Action
     * @return View
     */
	function index(){
		$db = $this->GetModel();
		$rec_id = $this->rec_id = USER_ID;
		$db->where ("admin_id", $rec_id);
		$tablename = $this->tablename = 'admin';
		$user = $db->getOne($tablename , '*');
		if(!empty($user)){
			$this->view->render("account/view.php" ,$user,"main_layout.php");
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
			$this->view->render("account/view.php", null ,"main_layout.php");
		}
	}
	/**
     * Edit Record Action 
     * If Not $_POST Request, Display Edit Record Form View
     * @return View
     */
	function edit(){
		$db = $this->GetModel();
		$this->rec_id = USER_ID;
		$tablename = $this->tablename = 'admin';
		$fields = $this->fields = array('admin_id','name','level','authentication_key'); //editable fields
		if(is_post_request()){
			Csrf :: cross_check();
			$postdata = $this->transform_request_data($_POST);
			$this->rules_array = array(
				'name' => 'required',
				'level' => 'required',
				'authentication_key' => 'required',
			);
			$this->sanitize_array = array(
				'name' => 'sanitize_string',
				'level' => 'sanitize_string',
				'authentication_key' => 'sanitize_string',
			);
			$modeldata = $this -> modeldata = $this->validate_form($postdata);
			//Check if Duplicate Record Already Exit In The Database
			if(isset($modeldata['name'])){
				$db->where('name',$modeldata['name'])->where('admin_id',USER_ID,'!=');
				if($db->has($tablename)){
					$this->view->page_error[] = $modeldata['name']." Already exist!";
				}
			} 
			if(empty($this->view->page_error)){
				$db->where('admin_id' , USER_ID);
				$bool = $db->update($tablename, $modeldata);
				$numRows = $db->getRowCount();
				if($bool && $numRows){
					$db->where ('admin_id', USER_ID);
					$user = $db->getOne($tablename , '*');
					set_session('user_data',$user);
					set_flash_msg('','');
					redirect_to_page("account");
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
		$db->where('admin_id' , USER_ID);
		$data = $db->getOne($tablename, $fields);
		$this->view->page_title ="My Account";
		if(!empty($data)){
			$this->view->render('account/edit.php' , $data, 'main_layout.php');
		}
		else{
			if($db->getLastError()){
				$this->view->page_error[] = $db->getLastError();
			}
			else{
				$this->view->page_error[] = "No record found";
			}
			$this->view->render('account/edit.php' , $data , 'main_layout.php');
		}
	}
	/**
     * Change Email Action
     * @return View
     */
	function change_email(){
		if(is_post_request()){
			Csrf :: cross_check();
			$form_collection = $_POST;
			$email=trim($form_collection['email']);
			$db = $this->GetModel();
			$rec_id = $this->rec_id = USER_ID;
			$tablename = $this->tablename = 'admin';
			$db->where ("admin_id", $rec_id);
			$result = $db->update($tablename, array('email' => $email ));
			if($result){
				set_flash_msg("Email address changed successfully",'success');
				redirect_to_page("account");
			}
			else{
				$page_error =  "Email not changed";
				$this->view->page_error = $page_error;
				$this->view->render("account/change_email.php" , null , "main_layout.php");
			}
		}
		else{
			$this->view->render("account/change_email.php" ,null,"main_layout.php");
		}
	}
}
