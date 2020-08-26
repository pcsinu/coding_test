$(document).ready(function() {

    var date_input=$('.datepick'); //our date input has the name "date"
		date_input.datepicker({
			format: 'yyyy-mm-dd',
			todayHighlight: true,
			autoclose: true,
		})

    var base_url = $("#base-url").val(); 

    $(document).on("click","#save_student",function() {
        var name =  $("#name").val();
        var dob =  $("#dob").val();

        if(!name || !dob)
          { 
            swal("Invalid Data", "Please fill all the fields to proceed!"); exit;
          }
        postData = { name : name,dob : dob}; 
        postData[global_csrf_token_name]= global_csrf_token_value;
       

        $.ajax({
                type: "POST",
                url: base_url+ 'index.php/home/save_student',
                dataType : 'html',
                data: postData ,
                success:function(response) { 
                    //remvLoadingPanel();

                    //swal("Updated","Successfully Updated Misc Fees", "success");
                    location.reload();


                },
                error:function(jqXHR, exception) { 
                    //remvLoadingPanel();
                    location.reload();
                }
        });


    });

    $(document).on("click","#save_course",function() {
        var course =  $("#course").val();;
        var course_id =  $("#course_id").val();

        if(!course || !course_id)
          { 
            swal("Invalid Data", "Please fill course and course id to proceed!"); exit;
          }
        postData = { course : course,course_id : course_id}; 
        postData[global_csrf_token_name]= global_csrf_token_value;
       
        $.ajax({
                type: "POST",
                url: base_url+ 'index.php/course/save_course',
                dataType : 'html',
                data: postData ,
                success:function(response) { 
                    //remvLoadingPanel();

                    //swal("Updated","Successfully Updated Misc Fees", "success");
                    location.reload();


                },
                error:function(jqXHR, exception) { 
                    //remvLoadingPanel();
                    location.reload();
                }
        });


    });

    $(document).on("click","#edit_student",function() {

        var name =  $("#name").val();
        var dob =  $("#dob").val();

        if(!name || !dob)
          { 
            swal("Invalid Data", "Please fill name and date of birth to proceed!"); exit;
          }
        var formdata = $("#edit_student_form").serialize(); 
        //formdata.append(global_csrf_token_name, global_csrf_token_value); 
       
        $.ajax({
                type: "POST",
                url: base_url+ 'index.php/home/update_student',
                dataType : 'html',
                data: formdata ,
                success:function(response) {  
                    //remvLoadingPanel();

                    //swal("Updated","Successfully Updated Misc Fees", "success");
                    location.reload();


                },
                error:function(jqXHR, exception) {  
                    //remvLoadingPanel();
                    location.reload();
                }
        });


    });

    $(document).on("click",".view_details",function() {

        var id = $(this).attr('id');
        postData = { student_id : id}; 
        postData[global_csrf_token_name]= global_csrf_token_value;
        //formdata.append(global_csrf_token_name, global_csrf_token_value); 
       
        $.ajax({
                type: "POST",
                url: base_url+ 'index.php/home/student_details',
                dataType : 'html',
                data: postData ,
                success:function(response) { 
                    //remvLoadingPanel();
                    $('#student_details').html(response);
                    
                    //swal("Updated","Successfully Updated Misc Fees", "success");
                    //location.reload();


                },
                error:function(jqXHR, exception) {  
                    //remvLoadingPanel();
                    location.reload();
                }
        });


    });

    
    $(document).on("click",".delete_course",function() {

        var id = $(this).attr('id'); 
        postData = { course_id : id}; 
        postData[global_csrf_token_name]= global_csrf_token_value;
        //formdata.append(global_csrf_token_name, global_csrf_token_value); 
        swal({
            title: "Are you sure?",
            text: "Do you want to delete the Course",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                        type: "POST",
                        url: base_url+ 'index.php/course/delete_course',
                        dataType : 'html',
                        data: postData ,
                        success:function(response) { 
                            //remvLoadingPanel();
                            //$('#student_details').html(response);
                            
                            //swal("Updated","Successfully Updated Misc Fees", "success");
                            location.reload();


                        },
                        error:function(jqXHR, exception) {  
                            //remvLoadingPanel();
                            location.reload();
                        }
                });
             }
            });


    });

    $(document).on("click",".delete_student",function() {

        var id = $(this).attr('id'); 
        postData = { student_id : id}; 
        postData[global_csrf_token_name]= global_csrf_token_value;
        //formdata.append(global_csrf_token_name, global_csrf_token_value); 

        swal({
            title: "Are you sure?",
            text: "Do you want to delete the student",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {  
             $.ajax({
                type: "POST",
                url: base_url+ 'index.php/home/delete_student',
                dataType : 'html',
                data: postData ,
                success:function(response) { 
                    //remvLoadingPanel();
                    //$('#student_details').html(response);
                    
                    //swal("Updated","Successfully Updated Misc Fees", "success");
                    location.reload();


                },
                error:function(jqXHR, exception) {  
                    //remvLoadingPanel();
                    location.reload();
                }
            });  
           }
          });
      
        


    });

    $(document).on("click","#edit_course",function() {
        var course =  $("#course").val();
        var course_id =  $("#course_key").val();
        if(!course || !course_id)
          { 
            swal("Invalid Data", "Please fill course and course id to proceed!"); exit;
          }
        var formdata = $("#edit_course_form").serialize(); 
        //formdata.append(global_csrf_token_name, global_csrf_token_value); 
       
        $.ajax({
                type: "POST",
                url: base_url+ 'index.php/course/update_course',
                dataType : 'html',
                data: formdata ,
                success:function(response) {  
                    //remvLoadingPanel();

                    //swal("Updated","Successfully Updated Misc Fees", "success");
                    //location.reload();


                },
                error:function(jqXHR, exception) {  
                    //remvLoadingPanel();
                    //location.reload();
                }
        });


    });
});   