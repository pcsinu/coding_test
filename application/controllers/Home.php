<?php
class Home extends CI_Controller {

  public function __construct()
  {
     parent::__construct();
     $this->load->model('common_model', 'common');
  }

  #---------------------------------------------------------------------------
  public function index() 
  {
    $search_data = array();
    $data['result'] = $this->common->get_student($search_data); 
    $this->load->view('index',$data);
  }

  public function save_student() 
  { 
    $data = array('name' => $this->input->post('name'),'date_of_birth' => $this->input->post('dob'));
    $student_id = $this->common->save_data('students',$data);
   
  }

  public function edit_student($id)
  {
    $search_data = array('id' => $id);
    $data['student'] = $this->common->get_student($search_data);
    $data['courses'] = $this->common->get_courses(); 
    $marks = $this->common->get_student_marks($id); 
    $mark_array = array();
    if(sizeof($marks) > 0)
    {
      foreach($marks as $mark)
      {
        $cource_code = $mark['id'];
        $mark = $mark['mark'];
        $mark_array[$cource_code] = $mark;
      }
    }
    $data['marks'] = $mark_array;
    $this->load->view('edit_student',$data);
  }

  public function update_student()
  {
    $name = $this->input->post('name'); 
    $dob = $this->input->post('dob'); 
    $student_id = $this->input->post('student_id');

    $arr_data = array('name' => $name, 'date_of_birth' => $dob);
    $this->common->update_student($arr_data,$student_id);

    $marks = $this->input->post('mark'); 
    
    foreach($marks as $course_id => $mark)
    {
      if($mark)
      { 
        $this->common->update_mark($student_id,$course_id,$mark);
      }
      else
      {
        $this->common->delete_mark($student_id,$course_id);
      }
    }

     
  }

  public function student_details()
  {
    $id = $this->input->post('student_id');
    $search_arr = array('id'=>$id); 
    $student_det = $this->common->get_student($search_arr); 
    $course_det = $this->common->get_student_marks($id); 

    $return_val = '<tr>
                     <th> <label for="name">Name</label> </th>
                     <td>'.$student_det[0]['name'].' </td>
                   </tr>
                   <tr>
                    <th> <label for="name">Date Of Birth</label></th>
                    <td>'.$student_det[0]['date_of_birth'].'</td>
                   </tr>';
      $mark_dets = '';
      if(sizeof($course_det) > 0)
      {
        $return_val = $return_val.'<tr><th colspan="2"></th></tr><tr><th colspan="2" style="color:green;padding-top:20px;padding-bottom:10px">Marks Awarded</th></tr><tr><th colspan="2"></th></tr>';
        foreach($course_det as $det)
        {
          $mark_det = '<tr>
                        <th><label for="name">'.$det['course'].'</label></th>
                        <td>'.$det['mark'].'</td>
                       </tr>';
          $mark_dets =   $mark_dets. $mark_det;        
        }
      }
    print '<table style="width:100%">'.$return_val.$mark_dets.'</table>';
  }

  public function delete_student() 
  { 
    $id = $this->input->post('student_id'); 
    $this->db->delete('students', array('id' => $id));
    $this->db->delete('course_student', array('student_id' => $id)); 
    
  }
  
}
?>
