<?php class Blog_controller extends CI_Controller
{
    function index()
    {
        $this->load->model('blog_model');

        $blogs = $this->blog_model->all();
        $data = array();
        $data['blogs'] = $blogs;

        $this->load->view('blog_list_view', $data);
    }
    function load_create_view()
    {
        $this->load->view('blog_create_view');
    }
    function create_blog()
    {
        $this->load->model('blog_model');
        $this->form_validation->set_rules('title', 'username', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() == false) {
            $this->load_create_view();
        } else {

            $formArray = array();

            $formArray['title'] = $this->input->post('title');
            $formArray['description'] = $this->input->post('description');
            $formArray['status'] = "up";


            $this->blog_model->create_blog($formArray);
            $this->session->set_flashdata('success', 'record added successfully');
            redirect(base_url() . 'index.php/Blog_controller/index');
        }
    }
    function load_edit_view() //ye function blog edit view ko load karta hai
    {
        $this->load->view('blog_edit_view');
    }

    function edit($Id)
    {
        $this->load->model('blog_model'); //pehle blog model ko load kiya
        $blog = $this->blog_model->get_blog($Id); //phir blog ka id nikala


        if ($this->input->post()) {
            // Form has been submitted and validated
            $formArray = array(
                'title' => $this->input->post('title'), //toh variables ko aray me dalo
                'description' => $this->input->post('description')
            );

            $this->blog_model->update_blog($Id, $formArray);
            $this->session->set_flashdata('success', 'record updated successfully');
            redirect(base_url() . 'index.php/Blog_controller/index');
        } else {
            // Form has not been submitted or has validation errors
            $data = array('user' => $blog);
            $this->load->view('blog_edit_view', $data);
        }
    }
    function ajax_delete()
    {
        $arr_response = array('status' => 500);
        $blogid = $_POST['blogid'];
        //var_dump($blogid);

        $this->db->where('id', $blogid);
        $this->db->delete('blog');


        $arr_response['status'] = 200;
        $arr_response['message'] = 'Blog has been deleted successfully';
        echo json_encode($arr_response);
    }

    function ajax_demo()
    {
        $arr_response = array('status' => 500);

        //var_dump($blogid);
        $formArray = array(
            'colum' => 'vale',
            'colum' => 'vale',

        );
        $this->db->insert('blog', $formArray);


        $arr_response['status'] = 200;
        $arr_response['message'] = 'Blog has been deleted successfully';
        echo json_encode($arr_response);
    }

    function coupon()
    {
        $this->load->view('coupon.php');
    }


    function delete($id)
    {

        // echo $id;
        //pehle toh model load kiya
        $this->load->model('blog_model');
        //phir jo data objec aya tha usko get kiya - jo key id apan send kiye the
        // $id = $_POST['id'];

        //iske baad usko model me dalenge
        if ($this->blog_model->delete_blog($id)) {
            echo 1;
        } else {
            echo 0;
        }
    }


    function list_blogs_using_jquery()
    {
        $this->load->view('list_blogs_using_jquery_view');
    }
}
