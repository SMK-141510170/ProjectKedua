@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><center>Tambah Lembur Pegawai</center></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('lembur_pegawai.store') }}">
                        {{ csrf_field() }}
                       

                                <div class="form-group">
                               <label for="name" class="col-md-4 control-label">Kode Lembur</label>
                               <div class="col-md-6">
                               <select class="form-control" name="kode_lembur_id" >
                                <option>pilihan</option>
                                @foreach ($kategori_lembur as $data)
                                <option value="{!! $data->id!!}">{!! $data->kode_lembur!!} || {!! $data->jabatan->nama_jabatan!!} || {!! $data->golongan->nama_golongan!!}</option>
                                @endforeach
                               </select>
                               </div>
                               </div>



                               <div class="form-group">
                               <label for="name" class="col-md-4 control-label">Nama Pegawai</label>
                               <div class="col-md-6">
                               <select class="form-control" name="id_pegawai" >
                                <option>pilihan</option>
                                @foreach ($pegawai as $data)
                                <option value="{!! $data->id!!}">{!! $data->User->name!!}</option>
                                @endforeach
                               </select>
                               </div>
                               </div>


                            <div class="form-group">
                            <label for="jumlah_jam" class="col-md-4 control-label">Jumlah Jam</label>
                            <div class="col-md-6">
                            <div class="form-group {{$errors->has('jumlah_jam') ? 'has-errors':'message'}}" >
                                <input id="jumlah_jam" type="text" class="form-control" name="jumlah_jam" value="{{ old('jumlah_jam') }}"  autofocus>
                             @if($errors->has('jumlah_jam'))
                                <span class="help-block">
                                    <strong>{{$errors->first('jumlah_jam')}}</strong>
                                </span>
                            @endif
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
