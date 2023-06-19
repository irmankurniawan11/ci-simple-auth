<?php 

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController {
    public function index() {

    }

    public function deletePhoto($id) {
        if(session('user_id')!=$id) {
            return redirect()->to(base_url())->with('error', 'Silakan login.');
        }
        $userModel = new UserModel();
        $user = $userModel->where('id', $id)->first();

        if(!$user) {
            return redirect()->to(base_url())->with('error', 'User tidak ada.');
        }
        if($user['profile_picture']==null) {
            return redirect()->to(base_url())->with('error', 'Tidak dapat menghapus.');
        }

        $userModel->update($user['id'], [
            'profile_picture' => null
        ]);

        if($user['profile_picture']!=null) {
            unlink(ROOTPATH . 'public/uploads/'.$user['profile_picture']);
        }

        session()->remove('profile_picture');
        session()->regenerate();
        
        return redirect()->to('/')->with('success', 'Profile photo successfully deleted.');
    }
}