
<?php
$comp_model = new SharedController;

$csrf_token = Csrf :: $token;

$data = $this->view_data;

//$rec_id = $data['__tableprimarykey'];
$page_id = Router :: $page_id;

$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;

?>

<section class="page">
    
    <?php
    if( $show_header == true ){
    ?>
    
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            
            <div class="row ">
                
                <div class="col-12 comp-grid">
                    <h3 class="record-title">Edit  Enquiry</h3>
                    
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
                
                <div class="col-md-7 comp-grid">
                    
                    <?php $this :: display_page_errors(); ?>
                    
                    <div  class=" animated fadeIn">
                        <form novalidate  id="" role="form" enctype="multipart/form-data"  class="form form-horizontal needs-validation" action="<?php print_link("enquiry/edit/$page_id/?csrf_token=$csrf_token"); ?>" method="post">
                            <div>
                                
                                
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="category">Category <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                
                                                <textarea placeholder="Enter Category" id="ctrl-category"  required="" rows="" name="category" class=" form-control"><?php  echo $data['category']; ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                                
                                                
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="mobile">Mobile <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                
                                                <textarea placeholder="Enter Mobile" id="ctrl-mobile"  required="" rows="" name="mobile" class=" form-control"><?php  echo $data['mobile']; ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                                
                                                
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="purpose">Purpose <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                
                                                <textarea placeholder="Enter Purpose" id="ctrl-purpose"  required="" rows="" name="purpose" class=" form-control"><?php  echo $data['purpose']; ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                                
                                                
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="name">Name <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                
                                                <textarea placeholder="Enter Name" id="ctrl-name"  required="" rows="" name="name" class=" form-control"><?php  echo $data['name']; ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                                
                                                
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="whom_to_meet">Whom To Meet <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                
                                                <textarea placeholder="Enter Whom To Meet" id="ctrl-whom_to_meet"  required="" rows="" name="whom_to_meet" class=" form-control"><?php  echo $data['whom_to_meet']; ?></textarea>
                                                <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                                
                                                
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                
                                
                                
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit">
                                    
                                    <i class="fa fa-send"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
    
</section>