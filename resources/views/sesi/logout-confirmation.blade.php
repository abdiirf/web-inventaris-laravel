@extends('layouts/aplikasi')

@section('konten')
    <div class="w-50 center border rounded px-3 py-3 mx-auto">
        <h1>Logout Confirmation</h1>
        <p>Apakah Anda yakin ingin logout?</p>
        <form action="/sesi/confirm-logout" method="post">
            @csrf
            <div class="mb-3 d-grid">
                <button type="submit" class="btn btn-danger">Ya, Logout</button>
            </div>
        </form>
        <div class="mb-3 d-grid">
            <a href="/siswa" class="btn btn-secondary">Batal</a>
        </div>
    </div>
@endsection
