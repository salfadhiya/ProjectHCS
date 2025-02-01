@extends('layouts.master')
@section('title', 'Admin Human Capital Servis')
@section('content')

<div class="section">
    <div class="col-12 col-lg-12">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h6>Data Nilai - {{$peserta->id_peserta}}</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($fields as $field => $label)
                            <div class="col-md-6">
                                <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="{{ $field }}"
                                    id="{{ $field }}"
                                    value="{{ $nilai->$field ?? '-' }}"
                                    disabled
                                />
                            </div>

                            <div class="col-md-6">
                                <label for="{{ $field }}_grade" class="form-label">Grade</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="{{ $field }}_grade"
                                    id="{{ $field }}_grade"
                                    value="{{ $grades[$field] }}"
                                    disabled
                                />
                            </div>
                        @endforeach

                    </div>
                    <br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input
                                type="text"
                                class="form-control"
                                id="jumlah"
                                name="jumlah"
                                value="{{$nilai->jumlah}}"
                                disabled
                            />
                        </div>

                        <div class="col-md-12">
                            <label for="rata_rata" class="form-label">Rata-Rata</label>
                            <input
                                type="text"
                                class="form-control"
                                id="rata_rata"
                                name="rata_rata"
                                value="{{$nilai->rata_rata}}"
                                disabled
                            />
                        </div>
                    </div>
                    <br>
                    <a href="/peserta" class="btn btn-primary">Kembali</a>
                    <a href="/peserta/{{$peserta->id_peserta}}/nilaitambah" class="btn btn-info">Konfigurasi Nilai</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
