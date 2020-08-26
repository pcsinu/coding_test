<?php include('header.php'); ?>
  

<div class="container">
<div class="page-header">
    <h3>Student Details</h3>      
  </div>

<div class="form-group"> 
<button type="button" class="btn btn-info float-right" data-toggle="modal" data-target="#myModal">Add Student</button>
  <a href="<?php echo base_url().'index.php/course' ?>"><button type="button" class="btn btn-primary float-right">Courses</button></a>
 
</div>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Date Of Birth</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php 
     if(sizeof($result) > 0)
     {
       $i = 1;
       foreach($result as $student)
       {
         ?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><?php echo $student['name']; ?></td>
              <td><?php echo $student['date_of_birth']; ?></td>
              <td>
                <a href="<?php echo base_url().'index.php/home/edit_student/'.$student['id']; ?>" title="Edit Student/ Add Marks"><button type="button" class="btn btn-success float-right"><span class="glyphicon glyphicon-pencil"></span></button></a>
                
                <button type="button" class="btn btn-info float-right view_details" data-toggle="modal" id="<?php echo $student['id']; ?>" data-target="#myMarks"><span class="glyphicon glyphicon-eye-open"></button>
                
                <button type="button" class="btn btn-danger float-right delete_student" id="<?php echo $student['id']; ?>"><span class="glyphicon glyphicon-trash"></span></button></td>
              </td>
            </tr>
         <?php
         $i = $i + 1;
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
        <h4 class="modal-title">Add Student</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="dob">Date of Birth:</label>
            <input type="text" class="form-control datepick" id="dob">
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save_student">Save</button>
      </div>
    </div>

  </div>
</div>

<div id="myMarks" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" onclick="javascript:window.location.reload()">&times;</button>
        <h4 class="modal-title">Student Details</h4>
      </div>
      <div class="modal-body" id="student_details">
         
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="javascript:window.location.reload()">Close</button>
      </div>
    </div>

  </div>
</div>


  
<?php include('footer.php'); ?>

 

