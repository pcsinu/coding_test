<?php include('header.php'); ?>

<div class="container">
<div class="page-header">
    <h3>Update Student</h3>      
  </div>

<div class="form-group"> 
  <a href="<?php echo base_url().'index.php/home' ?>"><button type="button" class="btn btn-primary float-right">Back</button></a>
</div>



<form class="form-horizontal" id="edit_student_form">
  <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>" >
  <input type="hidden" name="student_id" value="<?php echo $student[0]['id'] ?>" >
  <div class="form-group">
    <label class="control-label col-sm-4" for="name">Name :</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="name" name="name" value="<?php echo $student[0]['name'] ?>">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="dob">Date Of Birth :</label>
    <div class="col-sm-8">
      <input type="text" class="form-control datepick" id="dob" name="dob" value="<?php echo $student[0]['date_of_birth'] ?>">
    </div>
  </div>

  

<?php 
  if(sizeof($courses) > 0)
  {
    foreach($courses as $course)
    {
      $course_id = $course['id'];
      if(isset($marks[$course_id]))
      {
        $mark_alotted = $marks[$course_id];
      }
      else
      {
        $mark_alotted = '';
      }
      ?>
        <div class="form-group">
          <label class="control-label col-sm-4" for="<?php echo 'mark_'.$course['id']; ?>"><?php echo $course['course'] ?> :</label>
          <div class="col-sm-8">
            <input type="number"  class="form-control" id="<?php echo 'mark_'.$course['id']; ?>" name="mark[<?php echo $course['id']; ?>]" value="<?php echo $mark_alotted; ?>">
          </div>
        </div>
      <?php
    }
  }
 
?>
  
  
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <button type="button" class="btn btn-primary" id="edit_student">Submit</button>
    </div>
  </div>
</form> 


</div>




  


<?php include('footer.php'); ?>
