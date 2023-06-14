<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function index()
    {
        //return view('welcome_message');
    }

    public function processLogin() {
        $rules = [
            'email' => 'required|valid_email',
            'password' => 'required'
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $userModel = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $userModel->where('email', $email)->first();
        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid email or password.');
        }

        $session = session();
        $session->set([
            'user_id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'profile_picture' => $user['profile_picture']
        ]);

        return redirect()->to('/');
    }

    public function processRegister() {
        $rules = [
            'name' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'profile_picture' => 'uploaded[profile_picture]|max_size[profile_picture,1024]|is_image[profile_picture]'
        ];
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }


        $profilePicture = $this->request->getFile('profile_picture');
        $profilePictureName = '';
        if ($profilePicture->isValid() && !$profilePicture->hasMoved()) {
            $newName = $profilePicture->getRandomName();
            $profilePicture->move(ROOTPATH . 'public/uploads', $newName);
            $profilePictureName = $profilePicture->getName();
        }


        $userModel = new UserModel();
        $userData = [
            'name' => $this->request->getVar('name'),
            'email' => $this->request->getVar('email'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'profile_picture' => $profilePictureName
        ];
        $userModel->insert($userData);

        return redirect()->to('login')->with('success', 'Registration successful. You can now log in.');
    }

    public function logout() {
        $session = session();
        $session->destroy();

        return redirect()->to('login')->with('success', 'You have been logged out.');
    }
}
