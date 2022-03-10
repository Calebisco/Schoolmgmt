
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
                    <h3 class="record-title">View  Loan</h3>
                    
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
                        <?php
                        
                        $counter = 0;
                        if(!empty($data)){
                        
                        
                        
                        $counter++;
                        ?>
                        <div class="page-records ">
                            <table class="table table-hover table-borderless table-striped">
                                <!-- Table Body Start -->
                                <tbody>
                                    
                                    <tr>
                                        <th class="title"> Loan Id :</th>
                                        <td class="value"> <?php echo $data['loan_id']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Staff Name :</th>
                                        <td class="value"> <?php echo $data['staff_name']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Amount :</th>
                                        <td class="value"> <?php echo $data['amount']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Purpose :</th>
                                        <td class="value"> <?php echo $data['purpose']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> L Duration :</th>
                                        <td class="value"> <?php echo $data['l_duration']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Mop :</th>
                                        <td class="value"> <?php echo $data['mop']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> G Name :</th>
                                        <td class="value"> <?php echo $data['g_name']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> G Relationship :</th>
                                        <td class="value"> <?php echo $data['g_relationship']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> G Number :</th>
                                        <td class="value"> <?php echo $data['g_number']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> G Address :</th>
                                        <td class="value"> <?php echo $data['g_address']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> G Country :</th>
                                        <td class="value"> <?php echo $data['g_country']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> C Name :</th>
                                        <td class="value"> <?php echo $data['c_name']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> C Type :</th>
                                        <td class="value"> <?php echo $data['c_type']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Model :</th>
                                        <td class="value"> <?php echo $data['model']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Make :</th>
                                        <td class="value"> <?php echo $data['make']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Serial Number :</th>
                                        <td class="value"> <?php echo $data['serial_number']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Value :</th>
                                        <td class="value"> <?php echo $data['value']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Condition :</th>
                                        <td class="value"> <?php echo $data['condition']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Date :</th>
                                        <td class="value"> <?php echo $data['date']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Status :</th>
                                        <td class="value"> <?php echo $data['status']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> File Name :</th>
                                        <td class="value"> <?php echo $data['file_name']; ?> </td>
                                    </tr>
                                    
                                    
                                </tbody>
                                <!-- Table Body End -->
                                <tfoot>
                                    <tr>
                                        
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="p-3">
                            
                            
                            <a class="btn btn-sm btn-info"  href="<?php print_link("loan/edit/$data[loan_id]"); ?>">
                                <i class="fa fa-edit"></i> 
                            </a>
                            
                            
                            <a class="btn btn-sm btn-danger recordDeletePromptAction"  href="<?php print_link("loan/delete/$data[loan_id]/?csrf_token=$csrf_token"); ?>" >
                                <i class="fa fa-times"></i> 
                            </a>
                            
                            
                            <button class="btn btn-sm btn-primary export-btn">
                                <i class="fa fa-save"></i> 
                            </button>
                            
                            
                        </div>
                        <?php
                        }
                        else{
                        ?>
                        <!-- Empty Record Message -->
                        <div class="text-muted p-3">
                            <i class="fa fa-ban"></i> No Record Found
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
    
</section>
