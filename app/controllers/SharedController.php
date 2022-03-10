<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * admin_name_value_exist Model Action
     * @return array
     */
	function admin_name_value_exist($val){
		$db = $this->GetModel();
		$db->where('name', $val);
		$exist = $db->has('admin');
		return $exist;
	}

	/**
     * admin_email_value_exist Model Action
     * @return array
     */
	function admin_email_value_exist($val){
		$db = $this->GetModel();
		$db->where('email', $val);
		$exist = $db->has('admin');
		return $exist;
	}

}
