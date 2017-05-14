<?php
class Questions_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_questions($id = FALSE)
    {
       if ($id === FALSE)
       {
           $query = $this->db->get('questions2_test');
           return $query->result_array();
       }

       $query = $this->db->get_where('questions2_test', array('id' => $id));
       return $query->row_array();
    }

    public function set_questions()
    {
       $this->load->helper('url');

       //$id = url_title($this->input->post('id'), 'dash', TRUE);

       $data = array(
          'id' => $this->input->post('id'),
          'statement' => $this->input->post('statement'),
          'choiceA' => $this->input->post('choiceA'),
          'choiceB' => $this->input->post('choiceB'),
          'choiceC' => $this->input->post('choiceC'),
          'choiceD' => $this->input->post('choiceD'),
          'correctChoice' => $this->input->post('correctChoice'),
       );

       return $this->db->insert('questions2_test', $data);
    }
}

?>
