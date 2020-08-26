<?php
class Course extends CI_Controller {

  public function __construct()
  {
     parent::__construct();
     $this->load->model('common_model', 'common');
  }

  #---------------------------------------------------------------------------
  public function index() 
  {
    $data['result'] = $this->common->get_courses(); 
    $this->load->view('course',$data);
  }

  public function save_course() 
  { 
    $data = array('course' => $this->input->post('course'),'course_id' => $this->input->post('course_id'));
    $course_id = $this->common->save_data('courses',$data);

    
  }

  public function delete_course() 
  { 
    $id = $this->input->post('course_id'); 
    $this->db->delete('courses', array('id' => $id));
    $this->db->delete('course_student', array('course_id' => $id)); 
    
  }

  public function edit_course($id)
  {
    $search_data = array('id' => $id);
    $data['course'] = $this->common->get_courses($id); 
    $this->load->view('edit_course',$data);
  }

  public function update_course()
  {
    print_r($_POST);
    $id = $this->input->post('course_id'); 
    $course_id = $this->input->post('course_key'); 
    $course = $this->input->post('course');

    $arr_data = array('course_id' => $course_id, 'course' => $course);
    $this->common->update_course($arr_data,$id);

       
  }

  
}
?>
