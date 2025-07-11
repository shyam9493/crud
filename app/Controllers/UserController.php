<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\User;

class UserController extends BaseController
{
    public function index()
    {
        $model = new User();
        $data['users'] = $model->findAll();

        return view('Pages/Main', $data);
    }
    public function create()
    {
        return view('Pages/Add');
    }
    public function store()
    {
        $model = new User();
        $data = [
            'employee_id' => $this->request->getPost('employee_id'),
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'designation' => $this->request->getPost('designation'),
        ];
        
        if ($model->insert($data)) {
            return redirect()->to('/')->with('message', 'User created successfully');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }
    public function edit($id)
    {
        $model = new User();
        $data['user'] = $model->find($id);

        if (!$data['user']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found');
        }

        return view('Pages/Edit', $data);
    }
    public function update($id)
    {
        $model = new User();
        $data = [
            'employee_id' => $this->request->getPost('employee_id'),
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'designation' => $this->request->getPost('designation'),
        ];
        if ($model->update($id, $data)) {
            return redirect()->to('/')->with('message', 'User updated successfully');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }
}
