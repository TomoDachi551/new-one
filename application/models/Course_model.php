<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Course_model extends CI_Model {
    public function get_all_courses() {
        return $this->db->get('courses')->result();
    }
}
?>