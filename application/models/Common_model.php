<?php
class Common_model extends CI_Model
{
    
    public $_table;
    function __construct()
    {
       
    }
  

    public function save_data($table=NULL,$arr_data=NULL)
	{
	        $this->db->insert($table,$arr_data);
	        return $this->db->insert_id();
    }
    
    public function get_student($arr_data=NULL)
	{
               
        $this->db->select('id,name,date_of_birth');
        $this->db->from('students');
        if(sizeof($arr_data) > 0)
        {
          foreach($arr_data as $key => $val)
          {
            $this->db->where($key,$val); 
          }  
        }
        $result = $this->db->get();

        return $result->result_array();
    }
    
    public function get_courses($id=NULL)
	{
        
        $this->db->select('id,course,course_id');
        $this->db->from('courses');
        if($id != NULL)
        {
            $this->db->where('id',$id); 
        }
        
        $result = $this->db->get();
        return $result->result_array();
	}

    public function update_student($array_data ,$student_id)
    {
        $this->db->set("name",$array_data['name']);
        $this->db->set("date_of_birth",$array_data['date_of_birth']);
        $this->db->from('students');
        $this->db->where('id',$student_id);
        $success =$this->db->update();
         
    }

    public function delete_mark($student_id ,$course_id)
    {
        $this->db->from("course_student");
        $this->db->where("course_id",$course_id);
        $this->db->where("student_id",$student_id);
        $this->db->delete();
        return true;
        
    }

    public function update_mark($student_id,$course_id,$mark)
    {
        $this->db->select('id');
        $this->db->from('course_student');
        $this->db->where("course_id",$course_id);
        $this->db->where("student_id",$student_id);
        $count = $this->db->get()->num_rows();

        $arr_data = array('course_id' => $course_id,'student_id'=>$student_id,'mark' => $mark);
        if($count > 0)
        { 
            $this->db->set("mark",$mark); 
            $this->db->where("course_id",$course_id);
            $this->db->where("student_id",$student_id); 
            $this->db->from('course_student');
            $this->db->update(); $this->db->last_query();
        }
        else
        {
            $this->db->insert('course_student',$arr_data);
        }
    }

    public function get_student_marks($student_id)
	{
               
        $this->db->select('course_student.mark,courses.course,courses.id');
        $this->db->join('courses', 'courses.id=course_student.course_id','left');
        $this->db->from('course_student');
        
        $this->db->where('course_student.student_id',$student_id); 
       
        $result = $this->db->get();

        return $result->result_array();
    }

    public function update_course($array_data ,$course_id)
    {
        $this->db->set("course",$array_data['course']);
        $this->db->set("course_id",$array_data['course_id']);
        $this->db->from('courses');
        $this->db->where('id',$course_id);
        $success =$this->db->update();
         
    }  


}
