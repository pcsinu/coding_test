<?php include('header.php'); ?>

<div class="container">
<div class="page-header">
    <h3>Update Course</h3>      
  </div>

<div class="form-group"> 
  <a href="<?php echo base_url().'index.php/course' ?>"><button type="button" class="btn btn-primary float-right">Back</button></a>
</div>



<form class="form-horizontal" id="edit_course_form">
  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" >
  <input type="hidden" name="course_id" value="<?php echo $course[0]['id'] ?>" >
  <div class="form-group">
    <label class="control-label col-sm-4" for="name">Course Id :</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="course_key" name="course_key" value="<?php echo $course[0]['course_id'] ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="dob">Course :</label>
    <div class="col-sm-8">
    <input type="text" class="form-control" id="course" name="course" value="<?php echo $course[0]['course'] ?>">
    </div>
  </div>

  


  
  
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <button type="button" class="btn btn-primary" id="edit_course">Submit</button>
    </div>
  </div>
</form> 


</div>




  


<?php include('footer.php'); ?>
