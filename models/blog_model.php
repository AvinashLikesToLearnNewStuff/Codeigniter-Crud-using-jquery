<?php
class blog_model extends CI_Model
{
    function create_blog($formArray)
    {
        $this->db->insert('blog', $formArray);
    }

    function all()
    {
        return $blogs =   $this->db->get('blog')->result_array();
    }
    function get_blog($id)
    {
        $this->db->where('id', $id);
        return  $blog =    $this->db->get('blog')->row_array();
    }
    function update_blog($Id, $formArray)
    {
        $this->db->where('id', $Id);
        $this->db->update('blog', $formArray);
    }
    function delete_blog($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('blog');
    }
}
