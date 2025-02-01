@extends('layouts.master')
@section('title', 'Admin Human Capital Servis')
@section('content')

<section id="content-types">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h6>Nilai Peserta</h6>
                </div>
                <div class="card-body">
                    <form action="/nilai/{{$nilai->id_peserta}}/nilaisimpan" method="post" id="nilaiForm">
                        @csrf

                        <!-- Form Input Nilai -->
                        @foreach($fields as $field => $label)
                            <div class="mb-3">
                                <label for="{{ $field }}" class="form-label">{{ $label }}</label>
                                <input
                                    type="number"
                                    class="form-control nilai-input"
                                    name="{{ $field }}"
                                    id="{{ $field }}"
                                    value="{{ old($field, $nilai->$field ?? '') }}"
                                    onchange="calculateTotal()"
                                />
                            </div>
                        @endforeach

                        <div class="mb-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <input
                                type="text"
                                class="form-control"
                                id="jumlah"
                                name="jumlah"
                                value="{{ old('jumlah', $nilai->jumlah ?? '') }}"
                                disabled
                            />
                        </div>

                        <div class="mb-3">
                            <label for="rata_rata" class="form-label">Rata-Rata</label>
                            <input
                                type="text"
                                class="form-control"
                                id="rata_rata"
                                name="rata_rata"
                                value="{{ old('rata_rata', $nilai->rata_rata ?? '') }}"
                                disabled
                            />
                        </div>

                        <input type="hidden" name="jumlah" id="jumlah_hidden">
                        <input type="hidden" name="rata_rata" id="rata_rata_hidden">


                        <a href="/peserta" class="btn btn-secondary">Kembali</a>
                        <button class="btn btn-primary" type="submit">Simpan Data</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h6>Data Peserta</h6>
                    <p>ID Peserta : {{$peserta->id_peserta}}</p>
                    <p>Nama : {{$peserta->id_apply}}</p>
                    <p>Pembimbing Perusahaan : {{$peserta->pembimbing_perusahaan}}</p>
                    <p>Gedung Penempatan : {{$peserta->gdg_penempatan}}</p>
                    <p>Unit Penempatan : {{$peserta->unit_penempatan}}</p>
                    <p>Akhir Penempatan : {{$peserta->bulan_berakhir}} - {{$peserta->tahun_berakhir}}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
function calculateTotal() {
    let jumlah = 0;
    let fields = document.querySelectorAll('.nilai-input');
    let totalCount = 0;

    // Jumlahkan semua nilai input
    fields.forEach(field => {
        if (field.value) {
            jumlah += parseFloat(field.value);
            totalCount++;
        }
    });

    // Hitung rata-rata
    let rata_rata = totalCount > 0 ? jumlah / totalCount : null;

    // Pastikan rata_rata tidak null sebelum diupdate
    if (rata_rata === null) {
        alert("Rata-rata tidak boleh kosong!");
        return; // Menghentikan submit jika rata_rata tidak valid
    }

    // Update jumlah dan rata-rata
    document.getElementById('jumlah').value = jumlah;
    document.getElementById('rata_rata').value = rata_rata.toFixed(2);

    document.getElementById('jumlah_hidden').value = jumlah;
    document.getElementById('rata_rata_hidden').value = rata_rata.toFixed(2);
}

// Panggil fungsi saat input berubah
document.querySelectorAll('.nilai-input').forEach(input => {
    input.addEventListener('input', calculateTotal);
});

    // Panggil sekali saat halaman dimuat untuk mengatur jumlah dan rata-rata awal
    calculateTotal();
</script>

@endsection
