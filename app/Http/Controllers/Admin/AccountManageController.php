<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AccountManageController extends Controller
{
    public function index (Request $r) {
        if (!empty($r->search)) {
            $users = User::search($r->search)->get();
        } else {
            $users = User::all();
        }
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


        $group = $data['group'];
        if ($group == "member") {
            $user->member()->firstOrCreate([]);
        } else if ($group == "karyawan") {
            $user->karyawan()->firstOrCreate([
                'status' => 'Siap'
            ]);
        } else {
            $user->admin()->firstOrCreate([]);
        }

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
            'status' => 'required',
            'nama_lengkap' => 'required'
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
     
        
        $karyawanData = $r->only('nama_lengkap' ,'alamat_rumah', 'no_tlp', 'status', 'umur');
        
        if ($r->hasFile('foto_diri')) {

            $CurrentImage = (empty($user->karyawan()->first()->foto_diri)) ? 'NoImageA.png' :$user->karyawan()->first()->foto_diri;
            $Imagename = $this->SaveFile($r, 'foto_diri', 'assets/img/foto-diri/', $CurrentImage);
            $this->DeleteFile($CurrentImage, 'assets/img/foto_diri/', 'NoImageA.png');

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

    public function Update_Member (Request $r) {

        $r->validate([
            'username' => 'required',
            'email' => 'required',
            'group' => 'required',
            'nama_lengkap' => 'required',
            'alamat_rumah' => 'required',
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
     
        
        $memberData = $r->only('nama_lengkap' ,'alamat_rumah');
        
        $MemberM = $user->member()->first() or false;

        if ($MemberM) {
            $MemberM->update($memberData);
        } else {
            $user->member()->create($memberData);
        }

        return redirect()->back()->with('success', 'perubahan berhasi!');
    }

    public function Update_Admin (Request $r) {

        $r->validate([
            'username' => 'required',
            'email' => 'required',
            'group' => 'required',
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
     
        
        //$adminData = $r->only('');

        $adminData = array();
        
        if ($r->hasFile('foto_diri')) {

            $CurrentImage = (empty($user->karyawan()->first()->foto_diri)) ? 'NoImageA.png' :$user->karyawan()->first()->foto_diri;
            $Imagename = $this->SaveFile($r, 'foto_diri', 'assets/img/foto-diri/', $CurrentImage);
            $this->DeleteFile($CurrentImage, 'assets/img/foto-diri/', 'NoImageA.png');

            $foto_diri = [
                'foto_diri' => $Imagename
            ];

            $adminData = array_merge($adminData, $foto_diri);
        }
        
        $AdminM = $user->admin()->first() or false;

        if ($AdminM) {
            $AdminM->update($adminData);
        } else {
            $user->admin()->create($adminData);
        }

        return redirect()->back()->with('success', 'perubahan berhasi!');
    }

}
