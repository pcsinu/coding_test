<?php include('header.php'); ?>
  

<div class="container">

<div class="page-header">
    <h3>Course Details</h3>      
  </div>

<div class="form-group"> 
  <a href="<?php echo base_url().'index.php/home' ?>"<button type="button" class="btn btn-primary float-right">Students</button></a>
  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">Add Course</button>
</div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Course Id</th>
        <th>Course</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php 
     if(sizeof($result) > 0)
     {
       foreach($result as $course)
       {
         ?>
            <tr>
              <td>1</td>
              <td><?php echo $course['course_id']; ?></td>
              <td><?php echo $course['course']; ?></td>
              <td>
                <a href="<?php echo base_url().'index.php/course/edit_course/'.$course['id']; ?>" title="Edit Course"><button type="button" class="btn btn-success float-right"><span class="glyphicon glyphicon-pencil"></span></button></a>
                
                <button type="button" class="btn btn-danger float-right delete_course" id="<?php echo $course['id']; ?>"><span class="glyphicon glyphicon-trash"></span></button></td>
            </tr>
         <?php
       }
     }
     else
     {
        ?>
          <tr><td colspan="4">No Data found</td></tr>
        <?php
     }

    ?>
     
    </tbody>
  </table>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Course</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="course_id">Course Id</label>
            <input type="text" class="form-control" id="course_id">
          </div>
          <div class="form-group">
            <label for="course">Course</label>
            <input type="text" class="form-control" id="course">
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save_course">Save</button>
      </div>
    </div>

  </div>
</div>


  

<?php include('footer.php'); ?>
