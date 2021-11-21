<?php

class Client_controller extends CI_controller
{  
    public function service()
    {
        $data['treatment_data']=$this->treatment_model->treatmentlist();
        $this->load->view('client/services',$data);
    }
    
    public function doctors()
    {
        $data['doctor_data']=$this->doctor_model->doctorlist();
        $this->load->view('client/doctors',$data);
    }
}
   
?>