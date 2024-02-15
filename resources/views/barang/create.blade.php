@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Posts - Rio</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <!-- Menambahkan CSS untuk Mode Gelap -->
        <style>
            body {
                background: #121212; /* Warna latar belakang */
                color: #fff; /* Warna teks */
            }

            .navbar {
                background: #343a40 !important; /* Warna latar belakang navbar */
            }

            .card {
                background: #1e1e1e; /* Warna latar belakang card */
                color: #fff; /* Warna teks card */
            }

            /* Penyesuaian warna teks untuk link */
            a {
                color: #17a2b8;
            }

            /* Menyesuaikan warna tombol */
            .btn {
                background-color: #17a2b8;
                color: #fff;
            }

            /* Menyesuaikan warna tombol pada hover */
            .btn:hover {
                background-color: #138496;
            }

            /* Menyesuaikan warna tabel */
            table {
                color: #fff;
            }

            /* Menyesuaikan warna latar belakang tbody pada tabel */
            tbody {
                background: #1e1e1e;
            }

            /* Menyesuaikan warna tombol pada formulir pencarian */
            .form-inline button {
                background-color: #17a2b8;
                color: #fff;
            }

            /* Menyesuaikan warna tombol pada hover pada formulir pencarian */
            .form-inline button:hover {
                background-color: #138496;
            }

            /* Menyesuaikan warna teks pada kolom "GAMBAR," "JUDUL," "CONTENT," dan "AKSI" */
            th, td {
                color: #fff;
            }
        </style>
    </head>
<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('barang.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="form-group">
                                <label class="font-weight-bold">Nama Barang</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" value="{{ old('nama_barang') }}" placeholder="Masukkan Nama_barang">

                                <!-- error message untuk nama_barang -->
                                @error('nama_barang')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">GAMBAR</label>
                                <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">

                                <!-- error message untuk title -->
                                @error('image')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'content' );
</script>
</body>
</html>


@endsection
