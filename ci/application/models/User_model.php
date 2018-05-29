<?php
class User_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    /**
     * @brief user表添加数据
     * @param $data
     * @return int
     * @author Mr.Lee
     */
    public function insertUser($data) {
        if (! isset($data['create_time'])) {
            $data['create_time'] = time();
        }

        if (! isset($data['update_time'])) {
            $data['update_time'] = time();
        }

        $this->db->insert('user', $data);
        return $this->db->insert_id();
    }
}
