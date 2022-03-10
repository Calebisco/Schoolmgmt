
<?php

$comp_model = new SharedController;

$csrf_token = Csrf :: $token;

//Page Data From Controller
$view_data = $this->view_data;

$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;

$field_name = Router :: $field_name;
$field_value = Router :: $field_value;

$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;


?>

<section class="page">
    
    <?php
    if( $show_header == true ){
    ?>
    
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            
            <div class="row ">
                
                <div class="col-sm-4 comp-grid">
                    <h3 class="record-title">Student</h3>
                    
                </div>
                
                <div class="col-sm-3 comp-grid">
                    
                    <a  class="btn btn btn-primary my-1" href="<?php print_link("student/add") ?>">
                        <i class="fa fa-plus"></i>                              
                        Add New Student 
                    </a>
                    
                </div>
                
                <div class="col-sm-5 comp-grid">
                    
                    <form  class="search" method="get">
                        <div class="input-group">
                            <input value="<?php echo get_query_str_value('search'); ?>" class="form-control" type="text" name="search"  placeholder="Search" />
                                <div class="input-group-append">
                                    <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                    
                    <div class="col-md-12 comp-grid">
                        <div class="">
                            <?php
                            if(!empty($field_name) || !empty($_GET['search'])){
                            ?>
                            <hr class="sm d-block d-sm-none" />
                            <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                                <ul class="breadcrumb m-0 p-1">
                                    <?php
                                    if(!empty($field_name)){
                                    ?>
                                    <li class="breadcrumb-item"><a class="text-capitalize" href="<?php print_link('student') ?>"><?php echo $field_name ?></a></li>
                                    <li  class="breadcrumb-item active text-capitalize"><?php echo urldecode($field_value) ?></li>
                                    <?php 
                                    }   
                                    ?>
                                    
                                    <?php
                                    if(!empty($_GET['search'])){
                                    ?>
                                    <li class="breadcrumb-item">
                                        <a class="text-capitalize" href="<?php print_link('student') ?>">Search</a>
                                    </li>
                                    <li  class="breadcrumb-item active text-capitalize"> <strong><?php echo get_value('search'); ?></strong></li>
                                    <?php
                                    }
                                    ?>
                                    
                                </ul>
                            </nav>  
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <?php
        }
        ?>
        
        <div  class="">
            <div class="container-fluid">
                
                <div class="row ">
                    
                    <div class="col-md-12 comp-grid">
                        
                        <?php $this :: display_page_errors(); ?>
                        
                        <div  class=" animated fadeIn">
                            <div id="student-list-records">
                                
                                <?php
                                if(!empty($records)){
                                ?>
                                <div class="page-records table-responsive">
                                    <table class="table  table-striped table-sm">
                                        <thead class="table-header bg-light">
                                            <tr>
                                                
                                                <th class="td-sno td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="toggle-check-all custom-control-input" type="checkbox" />
                                                        <span class="custom-control-label"></span>
                                                    </label>
                                                </th>
                                                
                                                <th class="td-sno">#</th>
                                                <th > Student Id</th>
                                                <th > Name</th>
                                                <th > Birthday</th>
                                                <th > Sex</th>
                                                <th > Religion</th>
                                                <th > Blood Group</th>
                                                <th > Address</th>
                                                <th > Phone</th>
                                                <th > Email</th>
                                                <th > Password</th>
                                                <th > Father Name</th>
                                                <th > Mother Name</th>
                                                <th > Class Id</th>
                                                <th > Section Id</th>
                                                <th > Parent Id</th>
                                                <th > Roll</th>
                                                <th > Transport Id</th>
                                                <th > Dormitory Id</th>
                                                <th > Dormitory Room Number</th>
                                                <th > Authentication Key</th>
                                                
                                                <th class="td-btn"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            <?php
                                            $counter = 0;
                                            
                                            foreach($records as $data){
                                            $counter++;
                                            
                                            
                                            ?>
                                            <tr>
                                                
                                                <th class=" td-checkbox">
                                                    <label class="custom-control custom-checkbox custom-control-inline">
                                                        <input class="optioncheck custom-control-input" name="optioncheck[]" value="<?php echo $data['student_id'] ?>" type="checkbox" />
                                                            <span class="custom-control-label"></span>
                                                        </label>
                                                    </th>
                                                    
                                                    <th class="td-sno"><?php echo $counter; ?></th>
                                                    
                                                    
                                                    <td><a href="<?php print_link("student/view/$data[student_id]") ?>"><?php echo $data['student_id']; ?></a></td>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <a  data-source='<?php echo json_encode_quote(Menu :: $academic_syllabus_code); ?>' 
                                                            data-pk="<?php echo $data['student_id'] ?>" 
                                                            data-url="<?php print_link("student/editfield/$data[student_id]"); ?>" 
                                                            data-name="name" 
                                                            data-title="Enter Name" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['name']; ?>  
                                                        </a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <a  data-source='<?php echo json_encode_quote(Menu :: $academic_syllabus_code); ?>' 
                                                            data-pk="<?php echo $data['student_id'] ?>" 
                                                            data-url="<?php print_link("student/editfield/$data[student_id]"); ?>" 
                                                            data-name="birthday" 
                                                            data-title="Enter Birthday" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['birthday']; ?>  
                                                        </a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <a  data-source='<?php echo json_encode_quote(Menu :: $academic_syllabus_code); ?>' 
                                                            data-pk="<?php echo $data['student_id'] ?>" 
                                                            data-url="<?php print_link("student/editfield/$data[student_id]"); ?>" 
                                                            data-name="sex" 
                                                            data-title="Enter Sex" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['sex']; ?>  
                                                        </a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <a  data-source='<?php echo json_encode_quote(Menu :: $academic_syllabus_code); ?>' 
                                                            data-pk="<?php echo $data['student_id'] ?>" 
                                                            data-url="<?php print_link("student/editfield/$data[student_id]"); ?>" 
                                                            data-name="religion" 
                                                            data-title="Enter Religion" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['religion']; ?>  
                                                        </a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <a  data-source='<?php echo json_encode_quote(Menu :: $academic_syllabus_code); ?>' 
                                                            data-pk="<?php echo $data['student_id'] ?>" 
                                                            data-url="<?php print_link("student/editfield/$data[student_id]"); ?>" 
                                                            data-name="blood_group" 
                                                            data-title="Enter Blood Group" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['blood_group']; ?>  
                                                        </a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <a  data-source='<?php echo json_encode_quote(Menu :: $academic_syllabus_code); ?>' 
                                                            data-pk="<?php echo $data['student_id'] ?>" 
                                                            data-url="<?php print_link("student/editfield/$data[student_id]"); ?>" 
                                                            data-name="address" 
                                                            data-title="Enter Address" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['address']; ?>  
                                                        </a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <a  data-source='<?php echo json_encode_quote(Menu :: $academic_syllabus_code); ?>' 
                                                            data-pk="<?php echo $data['student_id'] ?>" 
                                                            data-url="<?php print_link("student/editfield/$data[student_id]"); ?>" 
                                                            data-name="phone" 
                                                            data-title="Enter Phone" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['phone']; ?>  
                                                        </a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <td><a href="<?php print_link("mailto:$data[email]") ?>"><?php echo $data['email']; ?></a></td>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <a  data-source='<?php echo json_encode_quote(Menu :: $academic_syllabus_code); ?>' 
                                                            data-pk="<?php echo $data['student_id'] ?>" 
                                                            data-url="<?php print_link("student/editfield/$data[student_id]"); ?>" 
                                                            data-name="password" 
                                                            data-title="Enter Password" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['password']; ?>  
                                                        </a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <a  data-source='<?php echo json_encode_quote(Menu :: $academic_syllabus_code); ?>' 
                                                            data-pk="<?php echo $data['student_id'] ?>" 
                                                            data-url="<?php print_link("student/editfield/$data[student_id]"); ?>" 
                                                            data-name="father_name" 
                                                            data-title="Enter Father Name" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['father_name']; ?>  
                                                        </a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <a  data-source='<?php echo json_encode_quote(Menu :: $academic_syllabus_code); ?>' 
                                                            data-pk="<?php echo $data['student_id'] ?>" 
                                                            data-url="<?php print_link("student/editfield/$data[student_id]"); ?>" 
                                                            data-name="mother_name" 
                                                            data-title="Enter Mother Name" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['mother_name']; ?>  
                                                        </a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <a  data-source='<?php echo json_encode_quote(Menu :: $academic_syllabus_code); ?>' 
                                                            data-pk="<?php echo $data['student_id'] ?>" 
                                                            data-url="<?php print_link("student/editfield/$data[student_id]"); ?>" 
                                                            data-name="class_id" 
                                                            data-title="Enter Class Id" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['class_id']; ?>  
                                                        </a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <a  data-step="1" 
                                                            data-source='<?php echo json_encode_quote(Menu :: $academic_syllabus_code); ?>' 
                                                            data-value="<?php echo $data['section_id']; ?>" 
                                                            data-pk="<?php echo $data['student_id'] ?>" 
                                                            data-url="<?php print_link("student/editfield/$data[student_id]"); ?>" 
                                                            data-name="section_id" 
                                                            data-title="Enter Section Id" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['section_id']; ?>  
                                                        </a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <a  data-step="1" 
                                                            data-source='<?php echo json_encode_quote(Menu :: $academic_syllabus_code); ?>' 
                                                            data-value="<?php echo $data['parent_id']; ?>" 
                                                            data-pk="<?php echo $data['student_id'] ?>" 
                                                            data-url="<?php print_link("student/editfield/$data[student_id]"); ?>" 
                                                            data-name="parent_id" 
                                                            data-title="Enter Parent Id" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['parent_id']; ?>  
                                                        </a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <a  data-source='<?php echo json_encode_quote(Menu :: $academic_syllabus_code); ?>' 
                                                            data-pk="<?php echo $data['student_id'] ?>" 
                                                            data-url="<?php print_link("student/editfield/$data[student_id]"); ?>" 
                                                            data-name="roll" 
                                                            data-title="Enter Roll" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['roll']; ?>  
                                                        </a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <a  data-step="1" 
                                                            data-source='<?php echo json_encode_quote(Menu :: $academic_syllabus_code); ?>' 
                                                            data-value="<?php echo $data['transport_id']; ?>" 
                                                            data-pk="<?php echo $data['student_id'] ?>" 
                                                            data-url="<?php print_link("student/editfield/$data[student_id]"); ?>" 
                                                            data-name="transport_id" 
                                                            data-title="Enter Transport Id" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['transport_id']; ?>  
                                                        </a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <a  data-step="1" 
                                                            data-source='<?php echo json_encode_quote(Menu :: $academic_syllabus_code); ?>' 
                                                            data-value="<?php echo $data['dormitory_id']; ?>" 
                                                            data-pk="<?php echo $data['student_id'] ?>" 
                                                            data-url="<?php print_link("student/editfield/$data[student_id]"); ?>" 
                                                            data-name="dormitory_id" 
                                                            data-title="Enter Dormitory Id" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="number" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['dormitory_id']; ?>  
                                                        </a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <a  data-source='<?php echo json_encode_quote(Menu :: $academic_syllabus_code); ?>' 
                                                            data-pk="<?php echo $data['student_id'] ?>" 
                                                            data-url="<?php print_link("student/editfield/$data[student_id]"); ?>" 
                                                            data-name="dormitory_room_number" 
                                                            data-title="Enter Dormitory Room Number" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['dormitory_room_number']; ?>  
                                                        </a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <td>
                                                        <a  data-source='<?php echo json_encode_quote(Menu :: $academic_syllabus_code); ?>' 
                                                            data-pk="<?php echo $data['student_id'] ?>" 
                                                            data-url="<?php print_link("student/editfield/$data[student_id]"); ?>" 
                                                            data-name="authentication_key" 
                                                            data-title="Enter Authentication Key" 
                                                            data-placement="left" 
                                                            data-toggle="click" 
                                                            data-type="textarea" 
                                                            data-mode="popover" 
                                                            data-showbuttons="left" 
                                                            class="is-editable" >
                                                            <?php echo $data['authentication_key']; ?>  
                                                        </a>
                                                    </td>
                                                    
                                                    
                                                    
                                                    
                                                    <th class="td-btn">
                                                        
                                                        
                                                        <a class="btn btn-sm btn-success has-tooltip" title="View Record" href="<?php print_link('student/view/'.$data['student_id']); ?>">
                                                            <i class="fa fa-eye"></i> 
                                                        </a>
                                                        
                                                        
                                                        <a class="btn btn-sm btn-info has-tooltip" title="Edit This Record" href="<?php print_link('student/edit/'.$data['student_id']); ?>">
                                                            <i class="fa fa-edit"></i> 
                                                        </a>
                                                        
                                                        
                                                        <a class="btn btn-sm btn-danger recordDeletePromptAction has-tooltip" title="Delete this record" href="<?php print_link("student/delete/$data[student_id]/?csrf_token=$csrf_token"); ?>" >
                                                            <i class="fa fa-times"></i>
                                                            
                                                        </a>
                                                        
                                                        
                                                    </th>
                                                </tr>
                                                <?php 
                                                }
                                                ?>
                                                
                                                
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <?php
                                    if( $show_footer == true ){
                                    ?>
                                    <div class="">
                                        <div class="row">   
                                            <div class="col-sm-4">  
                                                
                                                <button data-prompt-msg="Are you sure you want to delete these records" data-url="<?php print_link("student/delete/{sel_ids}/?csrf_token=$csrf_token"); ?>" class="btn btn-sm btn-danger btn-delete-selected d-none">
                                                    <i class="fa fa-times"></i> Delete Selected
                                                </button>
                                                
                                                
                                                <button class="btn btn-sm btn-primary export-btn"><i class="fa fa-save"></i> </button>
                                                
                                                
                                                <?php Html :: import_form('student/import_data' , "", 'CSV , JSON'); ?>
                                                
                                            </div>
                                            <div class="col">   
                                                
                                                <?php
                                                if( $show_pagination == true ){
                                                $pager = new Pagination($total_records,$record_count);
                                                $pager->page_name='student';
                                                $pager->show_page_count=true;
                                                $pager->show_record_count=true;
                                                $pager->show_page_limit=true;
                                                $pager->show_page_number_list=true;
                                                $pager->pager_link_range=5;
                                                
                                                $pager->render();
                                                }
                                                ?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                    }
                                    else{
                                    ?>
                                    <div class="text-muted animated bounce  p-3">
                                        <h4><i class="fa fa-ban"></i> </h4>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                    
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </section>
        