<?php
namespace App\Controllers;
use App\Models\ContactModel;

class Contact extends BaseController{
    public function index(){
        $session = \Config\Services::session();
        $data['session']=$session;

        # Fetching All Data
        $model = new ContactModel();
        $contacts = $model->getRecords();
        $data['contacts']=$contacts;

        return view('phonebook/index', $data);
    }

    // Create
    public function add(){
        $session = \Config\Services::session();
        helper('form');
        $data=[];

        if($this->request->getMethod()=='post'){
            // form validation 
            $input = $this->validate([
                'name'=>'required|min_length[3]',
                'mobile'=>'required|min_length[10]',
            ]);

            if($input== true){
                // form validated successfully
                $model = new ContactModel();
                $model->save([
                    'name'=>$this->request->getPost('name'),
                    'mobile'=>$this->request->getPost('mobile'),
                ]);
                    $session->setFlashdata('success','Contact has been added.');
                    return redirect()->to('/');
            }else{
                // form not validated
                $data['validation']=$this->validator;
            }
        }

        return view('phonebook/add',$data);
    }

    // Update
    public function update($id){
        $session = \Config\Services::session();
        helper('form');
        $data=[];

        // show data in update page
        $model =new ContactModel();
        $contact = $model->getRow($id);
        
        // for error in update id  
        if(!empty($contact)){
            $data['contact']= $contact;
        }else{
            $session->setFlashdata('error','Contact not found');
            return redirect()->to('/');
        }

        if($this->request->getMethod()=='post'){
            // form validation 
            $input = $this->validate([
                'name'=>'required|min_length[3]',
                'mobile'=>'required|min_length[10]',
            ]);

            if($input== true){
                // form validated successfully
                $model = new ContactModel();
                $model->update($id,[
                    'name'=>$this->request->getPost('name'),
                    'mobile'=>$this->request->getPost('mobile'),
                ]);
                    $session->setFlashdata('success','Contact has been updated.');
                    return redirect()->to('/');
            }else{
                // form not validated
                $data['validation']=$this->validator;
            }
        }

        return view('phonebook/update',$data);
    }
}

?>