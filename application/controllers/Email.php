<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Email extends CI_Controller{

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        $this->load->library('email');
        $this->load->helper('form');
        $this->output->enable_profiler(TRUE);

    }

    public function index(){

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'localhost',
            'smtp_user' => '',
            'smtp_pass' => '',
            'smtp_crypto' => 'tls',
            'newline' => "\r\n",
            'smtp_port' => 25,
            'mailtype' => 'html'
        ];
        $this->load->library('email', $config);        
        $this->email->from('libsupport@qub.ac.uk');
        $this->email->to('ariftahir17@gmail.com');
        $this->email->subject('Test');
        $this->email->message('This is the FIRST email');
        $sent = $this->email->send();

        if ($sent) {

            $this->session->set_flashdata("email_sent","<div class='alert alert-success' role='alert'><p>Thank you, we will be in contact soon.</p></div>");


            $this->email->from('libsupport@qub.ac.uk');
            $this->email->to('ariftahir17@gmail.com');
            $this->email->subject('Test 2');
            $this->email->message('This is the SECOND email');
            $sent = $this->email->send();



            redirect(base_url().'contact');



        } else {
            // Use debugger for finding built in mailer errors
            // echo $this->email->print_debugger();
            $this->session->set_flashdata("email_not_sent","<div class='alert alert-danger' role='alert'><p>Sorry, your email was not sent, please contact by phone us if this problem persists.</p></div>");
            redirect(base_url().'contact');
        }
        exit;

    }
}

?>