<?php

namespace App\Controllers;
use App\Models\User;
use Exception;

class Home extends BaseController
{
    public function index()
    {
        helper('form');
        return view('login', ["title"=>"Login | Expense Tracker"]);
    }

    public function register()
    {
        helper('form');
        return view('register', ["title"=>"Register | Expense Tracker"]);
    }

    public function addUser()
    {
        helper('form');
        $session = \Config\Services::session();
        $session = session();

        $db = db_connect();

        $rules = [
            'fullname'        => 'required|min_length[3]|max_length[20]',
            'email'         => 'required|min_length[6]|max_length[50]|valid_email',
            'mobileno'        => 'required|min_length[10]|max_length[15]',
            'newpassword'      => 'required|min_length[6]|max_length[200]',
            // 'repeatepassword'  => 'required|min_length[6]|max_length[200]',
        ];
		if($this->validate($rules))
		{
			$fname=$this->request->getVar('fullname');
			$emailid=$this->request->getVar('email');
			$mobno=$this->request->getVar('mobileno');
			$password=md5($this->request->getVar('newpassword'));
            $data=array(
                'FullName'=>$fname,
                'Email'=>$emailid,
                'MobileNumber'=>$mobno,
                'Password'=>$password
            );
            $userModel = new User();
            $query=$userModel->save($data);
                if($query){
                    $session->setFlashData('success','Registration successfull, Now you can login.');	
                    return view('register', ["title"=>"Register | Expense Tracker"]);
                } else {
                    $session->setFlashData('error','Something went wrong. Please try again.');
                    return view('register', ["title"=>"Register | Expense Tracker"]);
                }
        }else {
            $data['validation'] = $this->validator;
            $data['title'] = "Register | Expense Tracker"; 
            return view('register', $data);   
        }
    }

    public function login()
        {
        helper('form');
            $session = session();
            $model = new User();
            
            $rules = [
                'email'         => 'required|min_length[6]|max_length[50]|valid_email',
                'password'      => 'required|min_length[6]|max_length[200]',
            ];
            if($this->validate($rules)){
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');
                $data = $model->where('Email', $email)->first();
                if($data){
                    $pass = $data['Password'];
                    $verify_pass = md5($password);
    
                    if($verify_pass == $pass){
                        $ses_data = [
                            'user_id'       => $data['ID'],
                            'user_name'     => $data['FullName'],
                            'user_email'    => $data['Email'],
                            'user_number'    => $data['MobileNumber'],
                            'user_regDate'    => $data['RegDate'],
                            'user_password'    => $data['Password'],
                            'logged_in'     => TRUE
                        ];
                        $session->set($ses_data);
    
                        return redirect()->to('dashboard');
                    }else{
                        $session->setFlashdata('error', 'Please enter the correct Password');
                        return redirect()->to('/');
                    }
                }else{
                    $session->setFlashdata('error', 'This Email is not registered us');
                    return redirect()->to('/');
                }
            }else {
                $data['validation'] = $this->validator;
                $data['title'] = "login | Expense Tracker";
                return view('/', $data);
            }
            return view('/');
        }

        public function resetPassword()
        {
            helper('form');
            if($this->request->getMethod()=="post"){
                $session = session();
                $model = new User();
                
                $rules = [
                    'email'         => 'required|min_length[6]|max_length[50]|valid_email',
                    'mobileno'      => 'required|min_length[10]|max_length[15]',
                ];
                if($this->validate($rules)){
                    $email = $this->request->getVar('email');
                    $mobileno = $this->request->getVar('mobileno');
                    $data = $model->where(['Email'=> $email, "MobileNumber"=>$mobileno])->first();
                    if($data){
                        $session->set("email",$email);
                        $session->set("resetPassword",true);
                        return redirect()->to('reset-password2'); 
                    }else {
                        $session->setFlashdata('error', 'Please enter correct information');
                        return redirect()->to('reset-password');
                    }
                }else {
                    $data['validation'] = $this->validator;
                    $data['title'] = "reset-password | Expense Tracker";
                    return view('reset_password', $data);
                }
            }
            return view('reset_password', ["title"=>"reset-password | Expense Tracker"]);
        }

        public function resetPassword2()
        {
            helper('form');
            if($this->request->getMethod()=="post"){
                $session = session();
                $model = new User();
                
                $rules = [
                    'email'         => 'required|min_length[6]|max_length[50]|valid_email',
                    'password'         => 'required|min_length[6]|max_length[200]',
                    'confirmpassword'      => 'required|min_length[6]|max_length[200]',
                ];
                if($this->validate($rules)){
                    
                    $password = $this->request->getVar('password');
                    $confirmpassword = $this->request->getVar('confirmpassword');
                    $email = $this->request->getVar('email');
                    
                    if($password === $confirmpassword){
                        $data = $model->where(['Email'=> $email])->first();
                        if($data['Password'] == md5($password)){
                            $session->setFlashdata('success', 'Old Password could not become new password');  
                            return redirect()->to('reset-password2');
                        }else {
                            $data1 = ["Password" => md5($password)];
                            try {
                                    $model->update($data['ID'], $data1);
                                    $session->remove('resetPassword');
                                    $session->remove('email');
                                    $session->setFlashdata('success', 'Password change successfull '); 
                                    return redirect()->to('/');
                            }catch(Exception $e){
                                    $session->setFlashdata('error', $e);
                                    return redirect()->to('reset-password2');
                            }
                        }
                    }else {
                            $session->setFlashdata('error', 'Please enter same password');
                            return redirect()->to('reset-password2');
                    }

                }else {
                    $data['validation'] = $this->validator;
                    $data['title'] = "reset-password | Expense Tracker";
                    return view('reset_password2', $data);
                }
            }
            return view('reset_password2', ["title"=>"Register | Expense Tracker"]);
        }
    
        public function logout()
        {
            $session = session();
            $session->destroy();
            return redirect()->to('/');
        }

}
