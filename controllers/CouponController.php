<?php

class CouponController extends CI_Controller
{
    function index()
    {
        $this->load->view('CouponAddView.php');
    }
    function add() //ye use nai ho raha kahin bhi 
    {

        $this->load->Model('CouponModel.php'); //model ko load kiya

    }

    function insert()
    {
        // $this->load->Model('CouponModel.php'); //model ko load kiya
        $arrayResponse = array('status' => 500);
        $formArray = array();
        $formArray['code'] = $this->input->post('coupon_code');
        $formArray['discount'] = $this->input->post('coupon_discount');
        $formArray['validity_start'] =  $this->input->post('coupon_validity_start');
        $formArray['validity_end'] = $this->input->post('coupon_validity_end');


        $this->db->insert('coupons',  $formArray);
        $arrayResponse['status'] = 200;
        $arrayResponse['message'] = "success";
        echo json_encode($arrayResponse);
    }
    function list()
    {

        $data = $this->db->get('coupons')->result_array(); //pehle sare ko array ke form me fetch karo
        $result = array();
        $result['abc'] = $data; //phir usko ek key do 
        $this->load->view('CouponListView', $result);
    }
    function delete($id)
    {
        $this->db->where('id', $id);
        $users =    $this->db->get('coupons')->row_array();
        $this->db->where('id', $id);
        $this->db->delete('coupons');

        // $this->list();
    }
    function edit($id) //id mil gayi 
    {
        $this->db->where('id', $id); //id jo hai usko find kiye table me
        $user =    $this->db->get('coupons')->row_array(); //phir row array return karo
        $data = array(); //phir ek array banao
        $data['user'] = $user; //usko user karke key de do

        $this->load->view('CouponEditView.php', $data); //view me data bhejo
    }

    function editdata($userid)
    {
        $error = array();
        $error['status'] = 540;


        $formArray = array();
        $formArray['code'] = $this->input->post('c_code');
        $formArray['discount'] = $this->input->post('c_discount');
        $formArray['validity_end'] = $this->input->post('v_start');
        $formArray['validity_start'] = $this->input->post('v_end');


        //print_r($formArray);
        $this->db->where('id', $userid);
        $this->db->update('coupons', $formArray);
        $error['status'] = 600;
        if ($error['status'] = 600) {
            $error['message'] = "success";
            // redirect(base_url() . 'index.php/CouponController/list');
        } else {
            $error['message'] = "fail";
        }
        echo json_encode($error);
    }
}
