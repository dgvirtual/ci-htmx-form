<?php

namespace App\Controllers;

class Fragment extends BaseController
{

    protected $data;
    protected $session;

    public function create()
    {
        $this->data['msg'] = service('session')->getFlashdata('msg');
        $this->data['validation'] = service('validation');
        helper('form');
        $this->data['title'] = 'Immediate server-side validation using fragments';

        return view('fragment_form_view', $this->data);
    }


    public function save()
    {
        $this->data['title'] = '';
        $validation =  service('validation');
        helper('form');
        $validation->setRules($this->returnRules());

        if (!$validation->withRequest($this->request)->run()) {
            service('session')->setFlashdata('msg', 'Errors in form!');
            return redirect()->to('fragment/create')->withInput();
        }

        /**
         * logic to insert/update the data goes here
         */ 

        service('session')->setFlashdata('msg', 'Success!');

        return redirect()->to('fragment/create')->withInput();
    }

    /**
     * rules in one place to be used by all methods (would usually be in the model)
     */
    private function returnRules()
    {
        return [
            'first_name' => ['label' => 'First Name', 'rules' => 'required|min_length[5]'],
            'last_name' => ['label' => 'Last Name', 'rules' => 'required|min_length[5]'],
            'color' => ['label' => 'Color', 'rules' => 'required|in_list[blue,yelow,green]'],
        ];
    }

    public function validateField(string $fieldName): string
    {
        $this->data['title'] = '';
        $validation =  service('validation');
        helper('form');

        $validation->setRules($this->returnRules($fieldName));
        $validation->withRequest($this->request)->run();

        if ($validation->hasError($fieldName)) {
            $this->data['errors'] = $validation->getErrors();
            $this->data['status'][$fieldName] = ' is-invalid';
        } else {
            $this->data['status'][$fieldName] = ' is-valid';
        }

        $this->data['values'][$fieldName] = $this->request->getVar($fieldName);

        $this->data['validation'] = $validation;

        return view_fragment('fragment_form_view', $fieldName, $this->data);
    }
}
