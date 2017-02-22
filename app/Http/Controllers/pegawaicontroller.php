<?php

namespace App\Http\Controllers;
use App\pegawai;
use App\User;
use App\golongan;
use App\jabatan;
use Input;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;


class pegawaicontroller extends Controller
{
    use RegistersUsers;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  

    public function index()
    {
        //
        $pegawai=pegawai::all();
        return view('pegawai.index',compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user=user::all();
        $jabatan=jabatan::all();
        $golongan=golongan::all();
        return view('pegawai.create',compact('golongan','jabatan','user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

          $this->validate($request,[
            'name'=>'required',
            'nip' =>'required|numeric|min:3|unique:pegawais',
            'permission'=>'required|max:255',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|min:6|confirmed',
            ]);


          $user=user::create([
         'name'=>$request->get('name'),
         'email'=>$request->get('email'),
         'permission'=>$request->get('permission'),
         'password'=>bcrypt($request->get('password')),
            ]);

           $file = Input::file('foto');
        $destinationPath = public_path().'/assets/image/';
        $filename = $file->getClientOriginalName();
        $uploadSuccess = $file->move($destinationPath, $filename);

        if(Input::hasFile('foto')){
            $pegawai= new pegawai;
        $pegawai->nip=$request->get('nip');
        $pegawai->id_jabatan =$request->get('id_jabatan');
        $pegawai->id_golongan=$request->get('id_golongan');
        $pegawai->id_user =$user->id;
        $pegawai->foto = $filename;
        $pegawai->save();

       

        return redirect('/pegawai');
    }
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //

        $pegawai=pegawai::find($id);
        $golongan=golongan::all();
        $jabatan=jabatan::all();
        return view('pegawai.edit',compact('pegawai','golongan','jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $pegawai = pegawai::find($id);
            $pegawai->Nip = $request->get('nip');
            $pegawai->jabatan_id = $request->get('jabatan_id');
            $pegawai->golongan_id = $request->get('golongan_id'); 
        $this->validate($request, [
          
            /*'Nip' => 'required|numeric|min:2|unique:pegawais,Nip',
            */
            'Nip' => 'required|numeric|min:3',
            ]);
       
       
       
        if ($request->hasFile('foto')){
            $filename = null;
            $uploaded_foto = $request->file('foto');
            $extension = $uploaded_foto->getClientOriginalExtension();
            $filename = md5(time()).'.'.$extension;
            $destinationPath = public_path().DIRECTORY_SEPARATOR.'/image';
            $uploaded_foto->move($destinationPath, $filename);
            if ($pegawai->foto) {
                $old_foto = $pegawai->foto;
                $filepath = public_path().DIRECTORY_SEPARATOR.'/image'.DIRECTORY_SEPARATOR.$pegawai->foto;
                try{
                    File::delete($filepath);
                }
                catch(FileNotFoundException $e){
                    //file sudah dihapus
                }
            }
            $pegawai->foto = $filename;
           
        }
         $pegawai->save();
       
                return redirect('/pegawai');

        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        pegawai::find($id)->delete();
        return redirect('pegawai');
    }
}
