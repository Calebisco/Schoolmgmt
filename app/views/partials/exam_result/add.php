
<?php
$comp_model = new SharedController;

$csrf_token = Csrf :: $token;

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
                    <h3 class="record-title">Add New Exam Result</h3>
                    
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
                        <form id="exam_result-add-form" role="form" novalidate enctype="multipart/form-data" class="form form-horizontal needs-validation" action="<?php print_link("exam_result/add?csrf_token=$csrf_token") ?>" method="post">
                            <div>
                                
                                
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="student_id">Student Id <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input id="ctrl-student_id"  value="<?php  echo $this->set_field_value('student_id',''); ?>" type="number" placeholder="Enter Student Id" step="1"  required="" name="student_id"  class="form-control " />
                                                    
                                                    
                                                    
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="question_id">Question Id <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-question_id"  value="<?php  echo $this->set_field_value('question_id',''); ?>" type="number" placeholder="Enter Question Id" step="1"  required="" name="question_id"  class="form-control " />
                                                        
                                                        
                                                        
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="answer">Answer <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-answer"  value="<?php  echo $this->set_field_value('answer',''); ?>" type="text" placeholder="Enter Answer"  required="" name="answer"  class="form-control " />
                                                            
                                                            
                                                            
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                        </div>
                                        <div class="form-group form-submit-btn-holder text-center">
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
            