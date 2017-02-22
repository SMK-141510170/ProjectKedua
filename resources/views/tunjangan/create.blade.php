@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><center>Tambah Tunjangan</center></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('tunjangan.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="kode_tunjangan" class="col-md-4 control-label">Kode Tunjangan</label>
                            <div class="col-md-6">
                            <div class="form-group {{$errors->has('kode_tunjangan') ? 'has-errors':'message'}}" >
                                <input id="kode_tunjangan" type="text" class="form-control" name="kode_tunjangan" value="{{ old('kode_tunjangan') }}"  autofocus>
                             @if($errors->has('kode_tunjangan'))
                                <span class="help-block">
                                    <strong>{{$errors->first('kode_tunjangan')}}</strong>
                                </span>
                            @endif
                            </div>
                            </div>
                        </div>

                            <div class="form-group " >
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

                            <div class="form-group " >
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
                            <label for="status" class="col-md-4 control-label">Status</label>
                            <div class="col-md-6">
                            <select class="form-control" name="status" >
                            <option>Pilih</option>
                            <option>Sudah Menikah</option>
                            <option>Belum Menikah</option>
                                </select>
                            </div>
                            </div>

                           <div class="form-group">
                            <label for="jumlah_anak" class="col-md-4 control-label">Jumlah Anak</label>
                            <div class="col-md-6">
                                <input id="jumlah_anak" type="text" class="form-control" name="jumlah_anak" value="{{ old('jumlah_anak') }}"  autofocus>
                            </div>
                            </div>


                            <div class="form-group">
                            <label for="besaran_uang" class="col-md-4 control-label">Besaran Uang</label>
                            <div class="col-md-6">
                            <div class="form-group {{$errors->has('besaran_uang') ? 'has-errors':'message'}}" >
                                <input id="besaran_uang" type="text" class="form-control" name="besaran_uang" value="{{ old('besaran_uang') }}"  autofocus>
                             @if($errors->has('besaran_uang'))
                                <span class="help-block">
                                    <strong>{{$errors->first('besaran_uang')}}</strong>
                                </span>
                            @endif
                            </div>
                            </div>
                            </div>

                        

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
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
