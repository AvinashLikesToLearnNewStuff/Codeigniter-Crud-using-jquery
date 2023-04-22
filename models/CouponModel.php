<?php

class CouponModel extends CI_Model
{
    function add($data)
    {
        $this->db->insert('coupons', $data);
    }
}
