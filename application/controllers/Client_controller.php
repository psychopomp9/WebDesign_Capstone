<?php

class Client_controller extends CI_controller
{
    public function index()
    {
        $data['topdoctor_data'] = $this->doctor_model->doctortoplist();
        $data['toptreatment_data'] = $this->treatment_model->treatmenttoplist();
        $data['treatment_data'] = $this->treatment_model->treatmentlist();
        $this->load->view('client/index', $data);
    }

    public function login()
    {
        $this->load->view('admin/login');
    }
    public function user_auth()
    {
        $user_email = $this->input->post('user_email');
        $user_password = $this->input->post('user_password');

        $res = $this->user_model->user_auth($user_email, $user_password);

        if ($res != null) {

            $_SESSION['user_email'] = $res['user_email'];
            $_SESSION['user_password'] = $res['user_password'];
            $_SESSION['user_type'] = $res['user_type'];
            $_SESSION['user_id'] = $res['user_id_fk'];

            if ($res['user_type'] == 'patient') {

                redirect('Client_controller/index');
            } else {

                redirect('Clinic_controller/index');
            }
        } else {

            $data['invalid'] = "invalid user email and password";
            $this->load->view('client/login');
        }

    }
    public function logout()
    {
        unset($_SESSION['user_email']);
        unset($_SESSION['user_password']);
        unset($_SESSION['user_type']);
        unset($_SESSION['user_id']);
        redirect('Client_controller/index');
    }

    public function insertuser()
    {
        $data['user_email'] = $this->input->post('user_email');
        $data['user_password'] = $this->input->post('user_password');
        $data['user_type'] = $this->input->post('user_type');

        $this->user_model->insertuser($data);
        redirect('Clinic_controller/index');
    }

    public function appointmentdetail()
    {

        $data['appointment_data'] = $this->appointment_book_model->bookappointmentlist();

        $this->load->view('client/show_appointmentdetail');
    }
    public function insertappointment()
    {

        $data['patient_name'] = $this->input->post('patient_name') . "(" . $this->input->post('case_id') . ")";

        $data['ap_type'] = $this->input->post('ap_type');
        $data['treatment_id_fk'] = $this->input->post('treatment_name');
        $data['email'] = $this->input->post('email');
        $data['age'] = $this->input->post('age');
        $data['date'] = $this->input->post('date');
        $data['mobile_no'] = $this->input->post('mobile_no');
        $data['reason'] = $this->input->post('reason');

        $this->appointment_model->insertappointment($data);

        redirect('Client_controller/index');
    }
    public function service()
    {
        $data['treatment_data'] = $this->treatment_model->treatmentlist();
        $this->load->view('client/services', $data);
    }
    //doctors
    public function doctors()
    {
        $data['doctor_data'] = $this->doctor_model->doctorlist();
        $this->load->view('client/doctors', $data);
    }
    public function patientprofile()
    {
        $this->load->view('client/patientprofile');
    }
    public function edituserprofile()
    {
        // $data['patient_data']=$this->patient_model->patientdata($id);
        $this->load->view('client/edituserprofile');
    }
    public function updatepatientprofile()
    {
        $data['patient_id_pk'] = $this->input->post('patient_id_pk');
        $data['patient_name'] = $this->input->post('patient_name');

        $data['gender'] = $this->input->post('gender');

        $data['age'] = $this->input->post('age');
        $data['mobile_no'] = $this->input->post('mobile_no');
        $data['email_id'] = $this->input->post('email_id');
        $data['address'] = $this->input->post('address');

        if ($_FILES["picture"]["name"] != null) {
            $data['picture'] = $this->pictureupload();
        }

        $result = $this->patient_model->updatepatient($data);
        $da['user_id_fk'] = $result;
        $da['user_email'] = $data['email_id'];
        $da['user_password'] = $data['mobile_no'];
        $da['user_type'] = 'patient';

        $this->user_model->updateuser($da);
        redirect('Client_controller/patientprofile');
    }

    public function pictureupload()
    {
        $type = explode('.', $_FILES["picture"]["name"]);
        $type = strtolower($type[count($type) - 1]);
        $url = "upload/" . 'patient_name' . rand(1, 999) . '.' . $type;
        if (in_array($type, array("jpeg", "jpg", "png", "gif"))) {
            if (is_uploaded_file($_FILES["picture"]["tmp_name"])) {
                if (move_uploaded_file($_FILES["picture"]["tmp_name"], $url)) {
                    return $url;
                }
            }
        } else {
            echo "file not supported";
        }
    }
    public function aboutus()
    {
        $this->load->view('client/aboutus');
    }
    public function contactus()
    {
        $this->load->view('client/contact');
    }
    public function insertcontactus()
    {
        $data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['subject'] = $this->input->post('subject');
        $data['message'] = $this->input->post('message');

        $this->contactus_model->insertcontactus($data);
        redirect('Client_controller/index');
    }

    public function forgetpassword()
    {
        $this->load->view('client/forgotpassword');
    }
    public function forgetpass()
    {
        $this->load->view('client/forgetpass');
    }
    public function checkemail()
    {
        $user_email = $this->input->post('user_email');
        $res = $this->user_model->user_pass($user_email);
        if ($res != null) {
            $data['user_data'] = $res;

            $this->load->view('client/forgetpass', $data);
        } else {
            $data['invalid'] = "invalid email address";
            $this->load->view('client/forgotpassword', $data);
        }
    }
    public function updatepassword()
    {
        $user_password = $this->input->post('user_password');
        $user_cpass = $this->input->post('user_cpass');

        if ($user_password != $user_cpass) {
            $data['invalid'] = "password does't match";
            $this->load->view('client/forgetpass', $data);
        } else {
            $data['user_id_pk'] = $this->input->post('user_id_pk');
            $data['user_password'] = $this->input->post('user_password');

            $this->user_model->updatedpass($data);
            redirect('Clinic_controller/login');

        }
    }
    //change pass
    public function changepass()
    {
        $this->load->view('client/changepass');
    }
    public function updatepass()
    {
        $pass = $this->input->post('user_cpassword');
        $cpass = $this->input->post('user_password');

        if ($pass != $cpass) {
            $data['invalid'] = "password does't match";
            $this->load->view('client/changepass', $data);
        } else {
            $data['user_id_fk'] = $this->input->post('user_id_fk');
            $data['user_password'] = $this->input->post('user_password');

            $this->user_model->updateduser($data);
            redirect('Client_controller/patientprofile');
        }

    }

}
