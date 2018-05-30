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
        $subject = 'This is a test';
        $message = $this->input->post('comment');

        // $body = var_dump($_POST);


    $result = $this->email
    ->from($this->input->post('email'))
    ->reply_to('yoursecondemail@somedomain.com')    // Optional, an account where a human being reads.
    ->to('ariftahir17@gmail.com')
    ->subject($subject)
    ->message($message);
    // ->send();

 if ($this->email->send()) {

     $this->session->set_flashdata("email_sent","<div class='alert alert-success' role='alert'><p>Thank you, we will be in contact soon.</p></div>"); 
     redirect(base_url().'contact');
    // redirect(base_url().'contact', 'refresh');

    } else {
        // echo $this->email->print_debugger();
    $this->session->set_flashdata("email_not_sent","<div class='alert alert-danger' role='alert'><p>Sorry, your email was not sent, please contact us if this problem persists.</p></div>"); 
     redirect(base_url().'contact');
    }



// var_dump($result);
// echo '<br />';
// echo $this->email->print_debugger();

    exit;
}

}

?>