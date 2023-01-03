<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Awscontroller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('Aws3');
    }


    public function index()
    {

        $this->load->view('AWS_index');
    }

    public function Ajax()
    {


        if ($this->input->post('result') == "show") {
            $s3 = new Aws3();
            $data['images'] = $s3->get_all_files();

            if (isset($data)) {
                $this->load->view('image_card', $data);
            }
        } elseif ($this->input->post('result') == "delete") {

            $file_name = $this->input->post('file_name');
            $path = "resourses/images/" . $file_name;
            unlink($path);
            $s3 = new Aws3();
            $s3->delete_file($file_name);
        } elseif ($this->input->post('result') == "edit") {

            $file_name['imagename'] = $this->input->post('file_name');
            if (isset($file_name)) {
                $this->load->view('editImage', $file_name);
            }
        } elseif ($this->input->post('result') == "update") {
            $s3 = new Aws3();
            $filename = $_FILES["upload"]['name'];
            $result = $s3->fileExist($_REQUEST['edit_image_name']);
            if ($result == "file updated") {
                $path = "resourses/images/" . $_REQUEST['edit_image_name'];
                unlink($path);
                $s3->delete_file($_REQUEST['edit_image_name']);
                if (move_uploaded_file($_FILES["upload"]["tmp_name"], "resourses/images/" . $filename)) {

                    $s3->sendfile($filename, $filename);
                }
            }
        }
    }

    public function upload()
    {
        $filename = $_FILES["ftp"]['name'];
        $s3 = new Aws3();

        if (move_uploaded_file($_FILES["ftp"]["tmp_name"], "resourses/images/" . $filename)) {

            $s3->sendfile($filename, $filename);
        }
    }
}
