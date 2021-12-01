<?php

class Clinic_controller extends CI_Controller
{
    public function index()
    {
        if (isset($_SESSION['user_id'])) {
            // $data['doctor_data']=$this->doctor_model->doctorlist();

            $this->load->view('admin/index');
        } else {
            redirect('Client_controller/login');
        }
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
            $this->load->view('admin/login');
        }

    }
    public function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_password']);
        unset($_SESSION['user_type']);

        redirect('Client_controller/login');

    }
    public function forgetpassword()
    {
        $this->load->view('admin/forgotpassword');
    }
    public function forgetpass()
    {
        $this->load->view('admin/forgetpass');
    }
    public function checkemail()
    {
        $user_email = $this->input->post('user_email');
        $res = $this->user_model->user_pass($user_email);
        if ($res != null) {
            $data['user_data'] = $res;

            $this->load->view('admin/forgetpass', $data);
        } else {
            $data['invalid'] = "invalid email address";
            $this->load->view('admin/forgotpassword', $data);
        }
    }
    public function updatepassword()
    {
        $user_password = $this->input->post('user_password');
        $user_cpass = $this->input->post('user_cpass');

        if ($user_password != $user_cpass) {
            $data['invalid'] = "password does't match";
            $this->load->view('admin/forgetpass', $data);
        } else {
            $data['user_id_pk'] = $this->input->post('user_id_pk');
            $data['user_password'] = $this->input->post('user_password');

            $this->user_model->updatedpass($data);
            redirect('Clinic_controller/login');

        }
    }
    public function doctorprofile()
    {
        $this->load->view('admin/doctorprofile');
    }

    public function adddoctor()
    {

        $this->load->view('admin/adddoctor');
    }
    public function insertdoctor()
    {
        $data['doctor_name'] = $this->input->post('doctor_name');
        $data['gender'] = $this->input->post('gender');
        $data['age'] = $this->input->post('age');
        $data['degree'] = $this->input->post('degree');
        $data['experience'] = $this->input->post('experience');
        $data['mobile_no'] = $this->input->post('mobile_no');
        $data['email_id'] = $this->input->post('email_id');
        $data['charges'] = $this->input->post('charges');
        $data['doctor_image'] = $this->picupload();

        $result = $this->doctor_model->insertdoctor($data);

        $da['user_id_fk'] = $result;
        $da['user_email'] = $data['email_id'];
        $da['user_password'] = $data['mobile_no'];
        $da['user_type'] = 'doctor';

        $this->user_model->insertuser($da);

        redirect('Clinic_controller/showdoctor');
    }
    public function showdoctor()
    {

        $data['doctor_data'] = $this->doctor_model->doctorlist();
        $this->load->view('admin/showdoctor', $data);

    }
    public function editdoctor($id)
    {
        $data['doctor_data'] = $this->doctor_model->doctordata($id);
        $this->load->view('admin/adddoctor', $data);
    }
    public function updatedoctor()
    {
        $data['doctor_id_pk'] = $this->input->post('doctor_id_pk');
        $data['doctor_name'] = $this->input->post('doctor_name');
        $data['gender'] = $this->input->post('gender');
        $data['age'] = $this->input->post('age');
        $data['degree'] = $this->input->post('degree');
        $data['experience'] = $this->input->post('experience');
        $data['mobile_no'] = $this->input->post('mobile_no');
        $data['email_id'] = $this->input->post('email_id');
        $data['charges'] = $this->input->post('charges');
        if ($_FILES["doctor_image"]["name"] != null) {
            $data['doctor_image'] = $this->picupload();
        }

        $this->doctor_model->updatedoctor($data);

        redirect('Clinic_controller/showdoctor');
    }
    public function deletedoctor($id)
    {
        $this->doctor_model->deletedoctor($id);
        redirect('Clinic_controller/showdoctor');
    }

    public function picupload()
    {
        $type = explode('.', $_FILES["doctor_image"]["name"]);
        $type = strtolower($type[count($type) - 1]);
        $url = "upload/" . 'IMG_DOCTOR' . rand(1, 999) . '.' . $type;
        if (in_array($type, array("jpeg", "jpg", "png", "gif"))) {
            if (is_uploaded_file($_FILES["doctor_image"]["tmp_name"])) {
                if (move_uploaded_file($_FILES["doctor_image"]["tmp_name"], $url)) {
                    return $url;
                }
            }
        }

        return $url;
    }
    //appointment
    public function addappointment()
    {
        $data['treatment_data'] = $this->treatment_model->treatmentlist();
        $this->load->view('admin/addappointment', $data);
    }

    public function showappointment()
    {
        $data['doctor_data'] = $this->doctor_model->doctorlist();
        $data['appointment_data'] = $this->appointment_model->appointmentlist();
        $this->load->view('admin/showappointment', $data);

    }
    public function editappointment($id)
    {
        $data['treatment_data'] = $this->treatment_model->treatmentlist();
        $data['appointment_data'] = $this->appointment_model->appointmentdata($id);
        $this->load->view('admin/addappointment', $data);
    }
    public function updateappointment()
    {
        $data['ap_id_pk'] = $this->input->post('ap_id_pk');
        $data['patient_id_fk'] = $this->input->post('patient_name');
        $data['ap_type'] = $this->input->post('ap_type');
        $data['treatment_id_fk'] = $this->input->post('treatment_name');
        $data['email'] = $this->input->post('email');
        $data['age'] = $this->input->post('age');
        $data['date'] = $this->input->post('date');
        $data['mobile_no'] = $this->input->post('mobile_no');
        $data['reason'] = $this->input->post('reason');

        $this->appointment_model->updateappointment($data);

        redirect('Clinic_controller/showappointment');
    }
    public function deleteappointment($id)
    {

        $this->appointment_model->deleteappointment($id);
        redirect('Clinic_controller/showappointment');
    }

    // book appointment
    public function addbookappointment()
    {
        $data['doctor_data'] = $this->doctor_model->doctorlist();
        $data['treatment_data'] = $this->treatment_model->treatmentlist();
        $data['patient_data'] = $this->patient_model->patientlist();
        $this->load->view('admin/addbookappointment', $data);
    }
    public function insertbookappointment($id)
    {

        $appointment_data = $this->appointment_model->appointmentdata($id);

        $patient_name = explode('(', rtrim($this->input->post('patient_name'), ')'));
        if (count($patient_name) == 2) {
            $case_id = $patient_name[1];
        }
        $data1['patient_name'] = $patient_name[0];
        $data1['email_id'] = $this->input->post('email');
        $data1['age'] = $this->input->post('age');
        $data1['mobile_no'] = $this->input->post('mobile_no');
        $data1['case_id'] = "CASE-" . rand(1, 999);
        $patient_data = $this->patient_model->patient_check($data1);

        if ($patient_data != null) {
            $data['patient_id_fk'] = $patient_data['patient_id_pk'];
        } else {
            $data['patient_id_fk'] = $this->patient_model->insertpatient($data1);

            $da['user_id_fk'] = $data['patient_id_fk'];
            $da['user_email'] = $data1['email_id'];
            $da['user_password'] = $data1['mobile_no'];
            $da['user_type'] = 'patient';

            $this->user_model->insertuser($da);

        }

        $data['treatment_id_fk'] = $appointment_data['treatment_id_fk'];
        $data['doctor_id_fk'] = $this->input->post('doctor_name');
        $data['date'] = $appointment_data['date'];
        $data['time'] = $this->input->post('time');
        $data['reason'] = $appointment_data['reason'];
        $bid = $this->appointment_book_model->insertbookappointment($data);

        $data2['ap_id_pk'] = $id;
        $data2['is_read'] = 0;
        $this->appointment_model->updateappointment($data2);
        $bookappointment_data = $this->appointment_book_model->bookappointmentdata($bid);

        $msg = 'Your Appointment is confirm';

        $msg .= 'Time : ' . $bookappointment_data['time'] ;
        $msg .= 'Assign doctor :' . $bookappointment_data['doctor_name'];
        $msg .= 'Date :' . $bookappointment_data['date'];
        $msg .= 'See You Soon, Have a good day!';

        $this->email->to($appointment_data['email']);
        $this->email->from('rahul7654.chaudhari@gmail.com', 'Dentshine');
        $this->email->subject('for Confirm Appointment');
        $this->email->message($msg);
        $this->email->send();

        redirect('Clinic_controller/showbookappointment');
    }
    public function showbookappointment()
    {
        if ($_SESSION['user_type'] == 'doctor') {
            $data['bappointment_data'] = $this->appointment_book_model->bookappointmentdoctorlist($_SESSION['user_id']);
        } else {
            $data['bappointment_data'] = $this->appointment_book_model->bookappointmentlist();
        }

        $this->load->view('admin/showbookappointment', $data);

    }
    public function editbookappointment($id)
    {
        $data['doctor_data'] = $this->doctor_model->doctorlist();
        $data['treatment_data'] = $this->treatment_model->treatmentlist();
        $data['patient_data'] = $this->patient_model->patientlist();
        $data['appointment_data'] = $this->appointment_book_model->bookappointmentdata($id);
        $this->load->view('admin/addbookappointment', $data);
    }
    public function updatebookappointment()
    {
        $data['ap_book_id_pk'] = $this->input->post('ap_book_id_pk');
        $data['patient_id_fk'] = $this->input->post('patient_name');
        $data['treatment_id_fk'] = $this->input->post('treatment_name');
        $data['doctor_id_fk'] = $this->input->post('doctor_name');
        $data['date'] = $this->input->post('date');
        $data['time'] = $this->input->post('time');
        $data['reason'] = $this->input->post('reason');

        $this->appointment_book_model->updatebookappointment($data);

        redirect('Clinic_controller/showbookappointment');
    }
    public function deletebookappointment($id)
    {

        $this->appointment_book_model->deletebookappointment($id);
        redirect('Clinic_controller/showbookappointment');
    }

    //patient
    public function addpatient()
    {

        // $data['doctor_data']=$this->doctor_model->doctorlist();
        $this->load->view('admin/addpatient');
    }
    public function insertpatient()
    {

        $data['patient_name'] = $this->input->post('patient_name');
        $data['gender'] = $this->input->post('gender');
        $data['case_id'] = "CASE-" . rand(1, 999);
        $data['age'] = $this->input->post('age');
        $data['mobile_no'] = $this->input->post('mobile_no');
        $data['email_id'] = $this->input->post('email_id');
        $data['address'] = $this->input->post('address');
        // $data['doctor_id_fk']=$this->input->post('doctor_name');
        $data['picture'] = $this->pictureupload();

        $this->patient_model->insertpatient($data);
        redirect('Clinic_controller/showpatient');
    }
    public function showpatient()
    {

        $data['patient_data'] = $this->patient_model->patientlist();
        $this->load->view('admin/showpatient', $data);

    }

    public function editpatient($id)
    {

        // $data['doctor_data']=$this->doctor_model->doctorlist();
        $data['patient_data'] = $this->patient_model->patientdata($id);
        $this->load->view('admin/addpatient', $data);
    }
    public function updatepatient()
    {
        $data['patient_id_pk'] = $this->input->post('patient_id_pk');
        $data['patient_name'] = $this->input->post('patient_name');
        // $data['patient_lname']=$this->input->post('patient_lname');

        $data['gender'] = $this->input->post('gender');
        $data['age'] = $this->input->post('age');
        $data['mobile_no'] = $this->input->post('mobile_no');
        $data['email_id'] = $this->input->post('email_id');
        $data['address'] = $this->input->post('address');
        // $data['doctor_id_fk']=$this->input->post('doctor_name');

        if ($_FILES["picture"]["name"] != null) {
            $data['picture'] = $this->pictureupload();
        }

        $this->patient_model->updatepatient($data);
        redirect('Clinic_controller/showpatient');
    }
    public function deletepatient($id)
    {

        $this->patient_model->deletepatient($id);
        redirect('Clinic_controller/showpatient');

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
    //treatment
    public function addtreatment()
    {

        $data['doctor_data'] = $this->doctor_model->doctorlist();
        $this->load->view('admin/addtreatment', $data);
    }
    public function inserttreatment()
    {
        $data['treatment_name'] = $this->input->post('treatment_name');
        $data['doctor_id_fk'] = $this->input->post('doctor_name');
        $data['treatment_charges'] = $this->input->post('treatment_charges');
        $data['description'] = $this->input->post('description');
        $data['treatment_pic'] = $this->treatmentpicupload();

        $this->treatment_model->inserttreatment($data);
        redirect('Clinic_controller/showtreatment');
    }
    public function showtreatment()
    {

        $data['treatment_data'] = $this->treatment_model->treatmentlist();
        $this->load->view('admin/showtreatment', $data);
    }
    public function edittreatment($id)
    {

        $data['doctor_data'] = $this->doctor_model->doctorlist();
        $data['treatment_data'] = $this->treatment_model->treatmentdata($id);
        $this->load->view('admin/addtreatment', $data);
    }
    public function updatetreatment()
    {
        $data['treatment_id_pk'] = $this->input->post('treatment_id_pk');
        $data['treatment_name'] = $this->input->post('treatment_name');
        $data['doctor_id_fk'] = $this->input->post('doctor_name');
        $data['treatment_charges '] = $this->input->post('treatment_charges');
        $data['description'] = $this->input->post('description');
        if ($_FILES["treatment_pic"]["name"] != null) {
            $data['treatment_pic'] = $this->treatmentpicupload();
        }
        $this->treatment_model->updatetreatment($data);
        redirect('Clinic_controller/showtreatment');

    }
    public function deletetreatment($id)
    {

        $this->treatment_model->deletetreatment($id);
        redirect('Clinic_controller/showtreatment');

    }
    public function treatmentpicupload()
    {
        $type = explode('.', $_FILES["treatment_pic"]["name"]);
        $type = strtolower($type[count($type) - 1]);
        $url = "upload/" . 'treatment_pic' . rand(1, 999) . '.' . $type;
        if (in_array($type, array("jpeg", "jpg", "png", "gif"))) {
            if (is_uploaded_file($_FILES["treatment_pic"]["tmp_name"])) {
                if (move_uploaded_file($_FILES["treatment_pic"]["tmp_name"], $url)) {
                    return $url;
                }
            }
        } else {
            echo "file not supported";
        }
    }

    public function showcontactus()
    {
        $data['contactus_data'] = $this->contactus_model->contactuslistmain();
        $this->load->view('admin/show_contactus', $data);
    }
    public function deletecontactus($id)
    {
        $this->contactus_model->deletecontactus($id);
        redirect('Clinic_controller/showcontactus');
    }

}
