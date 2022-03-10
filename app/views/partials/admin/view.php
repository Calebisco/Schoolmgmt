
<?php
$comp_model = new SharedController;

$csrf_token = Csrf :: $token;

//Page Data Information from Controller
$data = $this->view_data;

//$rec_id = $data['__tableprimarykey'];
$page_id = Router::$page_id; //Page id from url

$view_title = $this->view_title;

$show_header = $this->show_header;
$show_edit_btn = $this->show_edit_btn;
$show_delete_btn = $this->show_delete_btn;
$show_export_btn = $this->show_export_btn;

?>

<section class="page">
    
    <?php
    if( $show_header == true ){
    ?>
    
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            
            <div class="row ">
                
                <div class="col-12 comp-grid">
                    <h3 class="record-title">View  Admin</h3>
                    
                </div>
                
            </div>
        </div>
    </div>
    
    <?php
    }
    ?>
    
    <div  class="">
        <div class="container">
            
            <div class="row ">
                
                <div class="col-md-12 comp-grid">
                    
                    <?php $this :: display_page_errors(); ?>
                    
                    <div  class=" animated fadeIn">
                        <div class="profile-bg mb-2">
                            <div class="profile">
                                <div class="d-flex flex-row justify-content-center">
                                    <div class="avatar"><img src="<?php print_link("assets/images/avatar.png") ?>" /> </div>
                                        <h2 class="title"><?php echo $data['name']; ?></h2>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <table class="table table-hover table-borderless table-striped">
                                    <tbody>
                                        
                                        <tr>
                                            <th class="title"> Admin Id :</th>
                                            <td class="value"> <?php echo $data['admin_id']; ?> </td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <th class="title"> Name :</th>
                                            <td class="value"> <?php echo $data['name']; ?> </td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <th class="title"> Email :</th>
                                            <td class="value"> <?php echo $data['email']; ?> </td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <th class="title"> Level :</th>
                                            <td class="value"> <?php echo $data['level']; ?> </td>
                                        </tr>
                                        
                                        
                                        <tr>
                                            <th class="title"> Authentication Key :</th>
                                            <td class="value"> <?php echo $data['authentication_key']; ?> </td>
                                        </tr>
                                        
                                        
                                    </tbody>    
                                </table>    
                            </div>  
                            <div class="mt-2">
                                
                                <a class="btn btn-sm btn-info"  href="<?php print_link("admin/edit/$data[admin_id]"); ?>">
                                    <i class="fa fa-edit"></i> 
                                </a>
                                
                                
                                <a class="btn btn-sm btn-danger recordDeletePromptAction"  href="<?php print_link("admin/delete/$data[admin_id]/?csrf_token=$csrf_token"); ?>" >
                                    <i class="fa fa-times"></i> 
                                </a>
                                
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        
    </section>
    