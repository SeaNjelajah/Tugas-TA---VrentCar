<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AccountManageController extends Controller
{
    public function index () {
        $users = User::all();
        return view('AdminPage.AccountManage.main', compact('users'));
    }

    public function Create (Request $r) {

        $r->validate([
            'username' => 'required',
            'email' => 'required',
            'group' => 'required',
            'password' => 'required'
        ]);
        
        $data = $r->only('username', 'email', 'group');
        $Imagename = $this->SaveFile($r, 'foto_profil', 'assets/img/users/', 'NoUserPic.png');
        
        $other = [
            'password' => Hash::make($r->get('password')),
            'foto_profil' => $Imagename
        ];

        $data = array_merge($data, $other);
        $user = User::create ($data);

        return redirect()->back()->with('success', 'New user created!');
    }

    public function delete (Request $r) {
        $user = User::find($r->id);
        $this->DeleteFile($user->foto_profil, 'assets/img/users/', 'NoUserPic.png');
        $user->delete();
    }

    public function Update_Karyawan (Request $r) {
        $r->validate([
            'username' => 'required',
            'email' => 'required',
            'group' => 'required',
            'alamat_rumah' => 'required',
            'no_tlp' => 'required',
            'umur' => 'required|numeric',
            'status' => 'required'
        ]);

        $user = User::find($r->id);
        $data = $r->only(['username', 'email', 'group']);

        if ($r->hasFile('foto_profil')) {

            $CurrentImage = (empty($user->foto_profil)) ? 'NoUserPic.png' : $user->foto_profil;
            $Imagename = $this->SaveFile($r, 'foto_profil', 'assets/img/users/', 'NoUserPic.png');
            $this->DeleteFile($CurrentImage, 'assets/img/users/', 'NoUserPic.png');

            $foto_profil = [
                'foto_profil' => $Imagename
            ];

            $data = array_merge($data, $foto_profil);
        }

        if (!empty($r->password)) {

            $password = [
                'password' => Hash::make($r->password)
            ];

            $data = array_merge($data, $password);
        }
        
        $user->update($data);
     
        
        $karyawanData = $r->only('alamat_rumah', 'no_tlp', 'status', 'umur');
        
        if ($r->hasFile('foto_diri')) {

            $CurrentImage = (empty($user->karyawan()->first()->foto_diri)) ? 'NoImageA.png' :$user->karyawan()->first()->foto_diri;
            $Imagename = $this->SaveFile($r, 'foto_diri', 'assets/img/foto-diri/', $CurrentImage);
            $this->DeleteFile($CurrentImage, 'assets/img/users/', 'NoImageA.png');

            $foto_diri = [
                'foto_diri' => $Imagename
            ];

            $karyawanData = array_merge($karyawanData, $foto_diri);
        }
        
        $karyawanM = $user->karyawan()->first() or false;

        if ($karyawanM) {
            $karyawanM->update($karyawanData);
        } else {
            
            $user->karyawan()->create($karyawanData);
        }

        return redirect()->back()->with('success', 'perubahan berhasi!');
    }
}
