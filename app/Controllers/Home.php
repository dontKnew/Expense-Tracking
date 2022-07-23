<?php

namespace App\Controllers;
use App\Models\User;
class Home extends BaseController
{
    public function index()
    {
        helper('form');
        return view('login');
    }

    public function register()
    {
        helper('form');
        return view('register');
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
                    return view('register');
                } else {
                    $session->setFlashData('error','Something went wrong. Please try again.');
                    return view('register');
                }
        }else {
            $data['validation'] = $this->validator;
            return view('register', $data);   
        }
    }

    public function login()
        {
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
                return view('/', $data);
            }
        }
    
        public function logout()
        {
            $session = session();
            $session->destroy();
            return redirect()->to('/');
        }

}
