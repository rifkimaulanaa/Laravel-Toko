<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data konsumens </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">View With Konsumen</h3>
                    <h5 class="text-center"><a href="https://Konsumen.com">Konsumen</a></h5>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('konsumens.create') }}" class="btn btn-md btn-success mb-3">ADD konsumen</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">No Handphone</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($konsumens as $konsumen)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ asset('storage/konsumens/'.$konsumen->image) }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $konsumen->name }}</td>
                                        <td>{{ $konsumen->alamat }}</td>
                                        <td>{{ $konsumen->jenis_kelamin }}</td>
                                        <td>{{ $konsumen->no_hp }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('konsumens.destroy', $konsumen->id) }}" method="POST">
                                                <a href="{{ route('konsumens.show', $konsumen->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('konsumens.edit', $konsumen->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data konsumens belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $konsumens->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

    </script>

</body>
</html>