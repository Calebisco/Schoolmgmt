
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
                    <h3 class="record-title">View  Payment</h3>
                    
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
                                        <th class="title"> Payment Id :</th>
                                        <td class="value"> <?php echo $data['payment_id']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Expense Category Id :</th>
                                        <td class="value"> <?php echo $data['expense_category_id']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Title :</th>
                                        <td class="value"> <?php echo $data['title']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Payment Type :</th>
                                        <td class="value"> <?php echo $data['payment_type']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Invoice Id :</th>
                                        <td class="value"> <?php echo $data['invoice_id']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Student Id :</th>
                                        <td class="value"> <?php echo $data['student_id']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Method :</th>
                                        <td class="value"> <?php echo $data['method']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Description :</th>
                                        <td class="value"> <?php echo $data['description']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Amount :</th>
                                        <td class="value"> <?php echo $data['amount']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Timestamp :</th>
                                        <td class="value"> <?php echo $data['timestamp']; ?> </td>
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
                            
                            
                            <a class="btn btn-sm btn-info"  href="<?php print_link("payment/edit/$data[payment_id]"); ?>">
                                <i class="fa fa-edit"></i> 
                            </a>
                            
                            
                            <a class="btn btn-sm btn-danger recordDeletePromptAction"  href="<?php print_link("payment/delete/$data[payment_id]/?csrf_token=$csrf_token"); ?>" >
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
