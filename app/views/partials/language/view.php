
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
                    <h3 class="record-title">View  Language</h3>
                    
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
                                        <th class="title"> Phrase Id :</th>
                                        <td class="value"> <?php echo $data['phrase_id']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Phrase :</th>
                                        <td class="value"> <?php echo $data['phrase']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> English :</th>
                                        <td class="value"> <?php echo $data['english']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Bengali :</th>
                                        <td class="value"> <?php echo $data['bengali']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Spanish :</th>
                                        <td class="value"> <?php echo $data['spanish']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Arabic :</th>
                                        <td class="value"> <?php echo $data['arabic']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Dutch :</th>
                                        <td class="value"> <?php echo $data['dutch']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Russian :</th>
                                        <td class="value"> <?php echo $data['russian']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Chinese :</th>
                                        <td class="value"> <?php echo $data['chinese']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Turkish :</th>
                                        <td class="value"> <?php echo $data['turkish']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Portuguese :</th>
                                        <td class="value"> <?php echo $data['portuguese']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Hungarian :</th>
                                        <td class="value"> <?php echo $data['hungarian']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> French :</th>
                                        <td class="value"> <?php echo $data['french']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Greek :</th>
                                        <td class="value"> <?php echo $data['greek']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> German :</th>
                                        <td class="value"> <?php echo $data['german']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Italian :</th>
                                        <td class="value"> <?php echo $data['italian']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Thai :</th>
                                        <td class="value"> <?php echo $data['thai']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Urdu :</th>
                                        <td class="value"> <?php echo $data['urdu']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Hindi :</th>
                                        <td class="value"> <?php echo $data['hindi']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Latin :</th>
                                        <td class="value"> <?php echo $data['latin']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Indonesian :</th>
                                        <td class="value"> <?php echo $data['indonesian']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Japanese :</th>
                                        <td class="value"> <?php echo $data['japanese']; ?> </td>
                                    </tr>
                                    
                                    
                                    <tr>
                                        <th class="title"> Korean :</th>
                                        <td class="value"> <?php echo $data['korean']; ?> </td>
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
                            
                            
                            <a class="btn btn-sm btn-info"  href="<?php print_link("language/edit/$data[phrase_id]"); ?>">
                                <i class="fa fa-edit"></i> 
                            </a>
                            
                            
                            <a class="btn btn-sm btn-danger recordDeletePromptAction"  href="<?php print_link("language/delete/$data[phrase_id]/?csrf_token=$csrf_token"); ?>" >
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
