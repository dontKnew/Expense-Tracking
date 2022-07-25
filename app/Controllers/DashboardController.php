<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ExpenseModel;
use App\Models\User;
use Exception;

class DashboardController extends BaseController
{
    public function index()
    {   
        helper('form');
        $session = session();
        $modelE = new ExpenseModel();
        
        $todayExpenseData = array(
            "ExpenseDate"=>date('Y-m-d'),
            "UserId"=> $session->get("user_id"),
        );
        $todayExpense = $modelE->where($todayExpenseData)->find();

        $yesterdayExpenseData = array(
            "ExpenseDate"=>date('Y-m-d',strtotime("-1 days")),
            "UserId"=> $session->get("user_id"),
        );
        $yesterdayExpense = $modelE->where($yesterdayExpenseData)->findAll();

        $thisYearExpenseData = array(
            "year(ExpenseDate)="=>date('Y'),
            "UserId"=> $session->get("user_id"),
        );
        $thisYearExpense = $modelE->where($thisYearExpenseData)->findAll();
        
        $fdate = date('Y-m-d',strtotime("-1 week"));
        $Last7ExpenseData = array(
            "ExpenseDate>="=>$fdate,
            "ExpesneDate"=>date('Y-m-d'),
            // "UserId"=> $session->get("user_id"),
        );
        // $Last7Expense = $modelE->where($Last7ExpenseData)->groupBy("ExpenseData")->findAll();   
        // return print_r($Last7ExpenseData);

        $Last30ExpenseData = array(
            "ExpenseDate<="=>date('Y-m-d',strtotime("-1 month")),
            "ExpesneDate>="=>date('Y-m-d'),
            "UserId"=> $session->get("user_id"),
        );
        // $Last30Expense = $modelE->where($Last30ExpenseData)->findAll();


        $totalExpenseData = array(
            "UserId"=> $session->get("user_id"),
        );
        $totalExpense = $modelE->where($totalExpenseData)->findAll();

        return view('dashboard/dashboard', [
                "totalExpense"=>$totalExpense, 
                "thisYearExpense"=>$thisYearExpense,
                "Last30Expense"=>00,
                "Last7Expense"=>00,
                "todayExpense"=>$todayExpense, 
                "yesterdayExpense"=>$yesterdayExpense,
                "dashboard"=>"btn-success"
            ]
        );
    }

    public function changePassword()
    {
        helper('form');
        if ($this->request->getMethod() == "post") {
            $session = session();
            $userModel = new User();
            $rules = [
                'currentpassword'  => 'required',
                'newpassword'      => 'required|min_length[6]|max_length[200]',
                'confirmpassword'  => 'required|min_length[6]|max_length[200]',
            ];

            $cpass = $this->request->getVar('currentpassword');
            $conpass = $this->request->getVar('confirmpassword');
            $newpass = $this->request->getVar('newpassword');
            if ($this->validate($rules)) {
                if ($conpass !== $newpass) {
                    $session->setFlashdata('error', 'Please enter the same Password');
                    return redirect()->to('changePassword');
                } else {
                        if($newpass == $cpass){
                            $session->setFlashdata('error', 'Old password could not be as new password');
                            return redirect()->to('changePassword');
                        }else {
                            if (md5($cpass) == session('user_password')) {
                                $data = ["Password" => md5($newpass)];
                                try {
                                    $userModel->update(session('user_id'), $data);
                                } catch (Exception $e) {
                                    $session->setFlashdata('Error', $e);
                                    return redirect()->to('changePassword');
                                }
                                $session->setFlashdata('success', 'Password is changed success');
                                return redirect()->to('changePassword');
                            } else {
                                $session->setFlashdata('error', 'Please enter correct password');
                                return redirect()->to('changePassword');
                            }
                        }
                }
            } else {
                // $data['validation'] = $this->validator;
                // $data['changePassword'] = "btn-success";
                return view('dashboard/changePassword', ["validation"=>$this->validator, "changePassword"=>"btn-success"]);
            }
        }
        return view('dashboard/changePassword', ["changePassword"=>"btn-success"]);
    }

    function addExpenses()
    {

        helper('form');

        if ($this->request->getMethod() == "post") {
            $session = session();
            $modelE = new ExpenseModel();

            $data = array(
                "ExpenseItem" => $this->request->getVar('item'),
                "ExpenseCost" => $this->request->getVar('costitem'),
                "ExpenseDate" => $this->request->getVar('expensedate'),
                "UserId" => $session->get('user_id'),
            );
            $rules = [
                'expensedate'   => 'required',
                'item'          => 'required',
                'costitem'      => 'required|numeric'
            ];
            if ($this->validate($rules)) {
                try {
                    $modelE->save($data);
                    $session->setFlashData('success', 'Expense added successfull.');
                    return view('dashboard/Expense/add');
                } catch (Exception $e) {
                    $session->setFlashData('error', $e);
                    // return redirect('newexpense');
                    return view('dashboard/Expense/add');
                }
            } else {
                $data['validation'] = $this->validator;
                return view('dashboard/Expense/add', $data);
                // return print_r($data['alidation']->listErrors());
            }
        }
        return view('dashboard/Expense/add', ["expense"=>"btn-success"]);
    }

    public function ManageExpenses()
    {
        $modelE = new ExpenseModel();
        $session = session();
        $data = $modelE->orderBy("ID", "desc")->where("UserId", $session->get('user_id'))->findAll();
        $expense = [
            "expenses" => $data,
            "count" => count($data),
            "expense"=>"btn-success"
        ];
        return view('dashboard/Expense/manage', $expense);
    }

    public function ListExpenses()
    {
        $modelE = new ExpenseModel();
        $data = $modelE->orderBy("ID", "desc")->findAll();
        $expense = [
            "expenses" => $data,
            "count" => count($data),
            "expense"=>"btn-success"
        ];
        return view('dashboard/Expense/list', $expense);
    }

    public function DeleteExpenses($id = null)
    {
        $modelE = new ExpenseModel();
        $session = session();
        if ($id !== null) {
            try {
                $modelE->where("UserId", $session->get('user_id'))->delete($id);
                $session->setFlashdata("success", "Expense deleted succcessfull");
                return redirect()->to(base_url('Expenses/manage'));
            } catch (\Exception $e) {
                $session->setFlashdata("error", $e);
            }
        } else {
            $session->setFlashdata("error", "Expense delete id could not found");
            return redirect()->to(base_url('Expenses/manage'));
        }
    }

    public function Profile()
    {
        helper('form');
        if ($this->request->getMethod() == "post") {
            $session = session();
            $modelU = new User();
            $rules = [
                'fullname'        => 'required|min_length[3]|max_length[20]',
                'mobileno'        => 'required|min_length[10]|max_length[15]',
            ];
            if ($this->validate($rules)) {
                $fname = $this->request->getVar('fullname');
                $mobno = $this->request->getVar('mobileno');
                $data = array(
                    'FullName' => $fname,
                    'MobileNumber' => $mobno,
                );
                try {
                    $modelU->update($session->get('user_id'), $data);
                    $session->set(["user_name"=>$fname, "user_number"=>$mobno]);
                    $session->setFlashData('success', 'Profile Updated successfull');
                    return redirect()->to('Profile');
                    
                } catch (Exception $e) {
                    $session->setFlashData('error', $e);
                    return redirect()->to('Profile');
                    // return $session->get('user_id');
                }
            } else {
                $data['validation'] = $this->validator;
                return view('dashboard/profile', $data);
            }
        }
        return view('dashboard/profile', ["profile"=>"btn-success"] );
    }
}
