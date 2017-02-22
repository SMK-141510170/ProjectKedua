@extends('layouts.app')
@section('content')

<div class="col-md-6 col-md-offset-4">
    <div class="panel panel-primary">
        <div class="panel-heading"><center>Tambah Pengguna</center></div>
            <div class="panel-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('pegawai.store') }} " enctype="multipart/form-data">
                {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Nama</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  autofocus>
                        </div>
                    </div>
                  
                    <div class="form-group">                     
                            <label for="email" class="col-md-4 control-label">Alamat E-mail</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" > 
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="password" class="col-md-4 control-label">Sandi</label>
                            <div class="col-md-6">
                              <input id="password" type="password" class="form-control" name="password" >
                            </div>
                            </div>
                        

                            <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmasi Sandi</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                            </div>
                            </div>

                     
                            <label for="permission" class="col-md-4 control-label">Permission</label>
                            <div class="col-md-6">
                                <select name="permission" class="form-control">
                                    <option value="pegawai">Pegawai</option>
                                    <option value="pemilik">Pemilik</option>
                                </select>   
                            </div>
                            </div>

                   


                </div>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-4">
            <div class="panel panel-primary">
                <div class="panel-heading"><center>Tambah Pegawai</center></div>
                <div class="panel-body">
                    
                  

                     
                            <div class="form-group">
                            <label for="nip" class="col-md-4 control-label">Nip</label>
                            <div class="col-md-6">
                            <div class="form-group {{$errors->has('nip') ? 'has-errors':'message'}}" >
                                <input id="nip" type="text" class="form-control" name="nip" value="{{ old('nip') }}"  autofocus></input>
                            @if($errors->has('nip'))
                                <span class="help-block">
                                    <strong>{{$errors->first('nip')}}</strong>
                                </span>
                            @endif
                            </div>
                            </div>
                            </div>                        

                        <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Nama Jabatan </label>
                        <div class="col-md-6">
                            <select class="form-control" name="id_jabatan" >
                            <option >Pilih</option>
                            @foreach($jabatan as $data)
                            <option value="{!! $data->id !!}">{!! $data->nama_jabatan !!}</option>
                            @endforeach
                            </select>
                            </div>
                            </div>
                            

                            <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nama Golongan </label>
                            <div class="col-md-6">
                            <select class="form-control" name="id_golongan" >
                            <option >Pilih</option>
                            @foreach($golongan as $data)
                            <option value="{!! $data->id !!}">{!! $data->nama_golongan !!}</option>
                            @endforeach
                            </select>
                            </div>
                            </div>
                     
                            <div class="form-group">
                            <label for="foto" class="col-md-4 control-label">Foto</label>
                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control" name="foto" value="{{ old('foto') }}"  autofocus></input> 
                            </div>
                            </div>
                            </div>

                       
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
