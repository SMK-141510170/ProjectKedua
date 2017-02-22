@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading"><center>Ubah Tunjangan</center></div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('tunjangan.update',$tunjangan->id) }}">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}
                            
                            <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Kode Tunjangan</label>
                            <div class="col-md-6">
                                <input id="kode_tunjangan" type="text" class="form-control" name="kode_tunjangan" value="{{ $tunjangan->kode_tunjangan}}" required autofocus>
                            </div>
                            </div>
          
                            <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nama Golongan</label>
                            <div class="col-md-6">
                            <select class="form-control" name="id_golongan" required>
                            <option >Pilih</option>
                            @foreach($golongan as $data)
                            <option value="{!! $data->id !!}">{!! $data->nama_golongan !!}</option>
                            @endforeach
                            </select>
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Nama Jabatan </label>
                            <div class="col-md-6">
                            <select class="form-control" name="id_jabatan" required>
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
                            <select class="form-control" name="status" required>
                            <option>Pilih</option>
                            <option>Belum Menikah</option>
                            <option>Sudah Menikah</option>
                                </select>
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="nip" class="col-md-4 control-label">Jumlah Anak</label>
                            <div class="col-md-6">
                                <input id="ju" type="text" class="form-control" name="nip" value="{{ $tunjangan->jumlah_anak}}" required autofocus>
                            </div>
                            </div>

                            <div class="form-group">
                            <label for="nip" class="col-md-4 control-label">Besaran Uang</label>
                            <div class="col-md-6">
                                <input id="nip" type="text" class="form-control" name="nip" value="{{ $tunjangan->besaran_uang}}" required autofocus>
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
