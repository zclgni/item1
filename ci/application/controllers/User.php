<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    /**
     * @brief index controller
     * @author
     */
    public function index()
    {
        $data['title'] = 'This is a test page';
        $data['content'] = 'This is article content';

        $this->db->select('username, mobile, age');
        $this->db->from('user')->where();
        $query = $this->db->get();

        $this->load->library('pagination');
        $perPage                = 2;
        $config['base_url']     = '/index.php/user/index/p';
        $config['total_rows']   = count($query->result());
        $config['per_page']     = $perPage;
        $config['uri_segment']  = 4;
        $config['use_page_numbers']     = TRUE;
        $config['enable_query_strings'] = true;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $data['userList'] = $query->result();
        $this->load->view('user/index', $data);
    }

    /**
     * @brief XXXXXXXXXXXXXXXXXXXXX
     * @author
     */
    public function create () {

        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';
        $this->load->view('user/create', $data);
    }

    /**
     * @brief 添加用户
     * @author
     */
    public function insert() {
        $this->load->helper('form');
        $this->load->library('form_validation');

        // 校验用户名
        $this->form_validation->set_rules(
            'username', '用户名',
            'required|min_length[5]|max_length[12]',
            array(
                'required'  => '%s必填',
            )
        );
        // 校验手机号
        $this->form_validation->set_rules('mobile', '手机号', 'required|numeric', ['required' => '%s必填', 'numeric' => '%s必须为整数']);
        // 校验年龄
        $this->form_validation->set_rules('age', '年龄', 'required|numeric', ['required' => '%s必填', 'numeric' => '%s必须为整数']);

        $data['username']   = $this->input->post('username');
        $data['mobile']     = $this->input->post('mobile');
        $data['age']        = $this->input->post('age');

        // 配置上传图片参数
        $config['upload_path']      = './uploads/images/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config['max_size']         = 10000;
        $config['max_width']        = 10240;
        $config['max_height']       = 7680;
        $config['encrypt_name']     = true;
        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('avatar')) {
            $data['error'] = $this->upload->display_errors();
            $data['title'] = 'Create a news item';
            $this->load->view('user/create', $data);
        } else {
            $uploadInfo = $this->upload->data();
            $insertData['avatar'] = $config['upload_path'] . $uploadInfo['raw_name'] . $uploadInfo['file_ext'];

            // 提交验证
            if ($this->form_validation->run() === FALSE) {
                $this->load->view('user/create', $data);
            } else {
                // 提交数据
                $insertData['username']   = $data['username'];
                $insertData['mobile']     = $data['mobile'];
                $insertData['age']        = $data['age'];
                $res = $this->user_model->insertUser($insertData);
                $this->load->view('user/index');
            }
        }

    }
}
