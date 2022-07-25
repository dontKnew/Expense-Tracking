<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ExpenseModel;
class ReportController extends BaseController
{
    public function index()
    {
        //
    }

    public function DayWise()
    {
        helper("form");
        if($this->request->getMethod() =='post'){
            $rules = [
                'fromdate'         => 'required',
                'todate'      => 'required',
            ];
            $data = array(
                "ExpenseDate>="=>$this->request->getVar('fromdate'),
                "ExpenseDate<="=>$this->request->getVar('todate'),
            );
            if($this->validate($rules)){
                $modelE = new ExpenseModel();
                $data = $modelE->where($data)->findAll();
                return view('dashboard/Expense/Report/daywiseList', ['reportdetails'=>$data,'fromdate'=>$this->request->getVar('fromdate'),'todate'=>$this->request->getVar('todate')]);
            }else {
                $data['validation'] = $this->validator;
                return view('dashboard/Expense/Report/daywise', $data);
            }    
        }
        return view('dashboard/Expense/Report/daywise', ["report"=>"active"]);;
    }
}
