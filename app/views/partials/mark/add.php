
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
                    <h3 class="record-title">Add New Mark</h3>
                    
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
                        <form id="mark-add-form" role="form" novalidate enctype="multipart/form-data" class="form form-horizontal needs-validation" action="<?php print_link("mark/add?csrf_token=$csrf_token") ?>" method="post">
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
                                                <label class="control-label" for="subject_id">Subject Id <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="">
                                                    <input id="ctrl-subject_id"  value="<?php  echo $this->set_field_value('subject_id',''); ?>" type="number" placeholder="Enter Subject Id" step="1"  required="" name="subject_id"  class="form-control " />
                                                        
                                                        
                                                        
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        <div class="form-group ">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <label class="control-label" for="class_id">Class Id <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="">
                                                        <input id="ctrl-class_id"  value="<?php  echo $this->set_field_value('class_id',''); ?>" type="number" placeholder="Enter Class Id" step="1"  required="" name="class_id"  class="form-control " />
                                                            
                                                            
                                                            
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            <div class="form-group ">
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <label class="control-label" for="exam_id">Exam Id <span class="text-danger">*</span></label>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="">
                                                            <input id="ctrl-exam_id"  value="<?php  echo $this->set_field_value('exam_id',''); ?>" type="number" placeholder="Enter Exam Id" step="1"  required="" name="exam_id"  class="form-control " />
                                                                
                                                                
                                                                
                                                            </div>
                                                            
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                
                                                
                                                
                                                <div class="form-group ">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <label class="control-label" for="mark_obtained">Mark Obtained <span class="text-danger">*</span></label>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="">
                                                                <input id="ctrl-mark_obtained"  value="<?php  echo $this->set_field_value('mark_obtained','0'); ?>" type="number" placeholder="Enter Mark Obtained" step="1"  required="" name="mark_obtained"  class="form-control " />
                                                                    
                                                                    
                                                                    
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    <div class="form-group ">
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <label class="control-label" for="mark_total">Mark Total <span class="text-danger">*</span></label>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="">
                                                                    <input id="ctrl-mark_total"  value="<?php  echo $this->set_field_value('mark_total','100'); ?>" type="number" placeholder="Enter Mark Total" step="1"  required="" name="mark_total"  class="form-control " />
                                                                        
                                                                        
                                                                        
                                                                    </div>
                                                                    
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        
                                                        
                                                        <div class="form-group ">
                                                            <div class="row">
                                                                <div class="col-sm-4">
                                                                    <label class="control-label" for="comment">Comment <span class="text-danger">*</span></label>
                                                                </div>
                                                                <div class="col-sm-8">
                                                                    <div class="">
                                                                        
                                                                        <textarea placeholder="Enter Comment" id="ctrl-comment"  required="" rows="" name="comment" class=" form-control"><?php  echo $this->set_field_value('comment',''); ?></textarea>
                                                                        <!--<div class="invalid-feedback animated bounceIn text-center">Please enter text</div>-->
                                                                        
                                                                        
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
                        