<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model
{
    private $_table = "tbl_karyawan";

    public $id;
    public $name;
    public $npk;
    public $image;
    public $jenis_kelamin;
    public $tanggal_lahir; //ini date

    public function rules()
    {
        return [
            ['field' => 'name',
            'label' => 'Name',
            'rules' => 'required'],

            ['field' => 'npk',
            'label' => 'NPK',
            'rules' => 'numeric'],
            
            ['field' => 'jenis_kelamin',
            'label' => 'Jenis Kelamin',
            'rules' => 'required'],
			['field' => 'tanggal_lahir',
				'label' => 'Tanggal Lahir',
				'rules' => 'required']
        ];
    }

    public function getAll()
    {
        return $this->db->get($this->_table)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->_table, ["id" => $id])->row();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id = uniqid();
        $this->name = $post["name"];
		$this->npk = $post["npk"];
		$this->image = $this->_uploadImage();
        $this->jenis_kelamin = $post["jenis_kelamin"];
        $this->tanggal_lahir = $post["tanggal_lahir"];
        $this->db->insert($this->_table, $this);
    }

    public function update()
    {
        $post = $this->input->post();
        $this->id = $post["id"];
		$this->name = $post["name"];
		$this->npk = $post["npk"];
		if (!empty($_FILES["image"]["name"])) {
            $this->image = $this->_uploadImage();
        } else {
            $this->image = $post["old_image"];
		}
		$this->jenis_kelamin = $post["jenis_kelamin"];
		$this->tanggal_lahir = $post["tanggal_lahir"];
        $this->db->update($this->_table, $this, array('id' => $post['id']));
    }

    public function delete($id)
    {
		$this->_deleteImage($id);
        return $this->db->delete($this->_table, array("id" => $id));
	}
	
	private function _uploadImage()
	{
		$config['upload_path']          = './upload/';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['file_name']            = $this->id;
		$config['overwrite']			= true;
		$config['max_size']             = 1024;

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('image')) {
			return $this->upload->data("file_name");
		}
		print_r($this->upload->display_errors());
		//return "default.jpg";
	}

	private function _deleteImage($id)
	{
		$data= $this->getById($id);
		if ($data->image != "default.jpg") {
			$filename = explode(".", $data->image)[0];
			return array_map('unlink', glob(FCPATH."upload/$filename.*"));
		}
	}

}
