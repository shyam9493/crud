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
        $data['users'] = $model->orderBy('created_at', 'DESC')->findAll();

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
            return redirect()->to('users')->with('success', 'Employee created successfully!');
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
            return redirect()->to('users')->with('success', 'Employee updated successfully!');
        } else {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }
    }
    public function delete($id)
    {
        $model = new User();
        
        // Check if user exists
        $user = $model->find($id);
        if (!$user) {
            return redirect()->to('users')->with('error', 'Employee not found!');
        }

        // Attempt to delete the user
        if ($model->delete($id)) {
            return redirect()->to('users')->with('success', 'Employee deleted successfully!');
        } else {
            return redirect()->to('users')->with('error', 'Failed to delete employee. Please try again.');
        }
    }
    public function show($id)
    {
        $model = new User();
        $data['user'] = $model->find($id);

        if (!$data['user']) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found');
        }

        return view('Pages/Show', $data);
    }
}
