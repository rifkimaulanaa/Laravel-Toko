<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View konsumen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Konsumen Details</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/konsumens/' . $konsumens->image) }}" class="rounded"
                                alt="konsumen Image" style="width: 150px;">
                        </div>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <th>Name</th>
                                    <td>{{ $konsumens->name }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ ucfirst($konsumens->alamat) }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>{{ $konsumens->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th>No Handphone</th>
                                    <td>{{ $konsumens->no_hp }}</td>
                                </tr>
                                
                            </tbody>
                        </table>

                        <a href="{{ route('konsumens.index') }}" class="btn btn-secondary mt-3">Back</a>
                        <a href="{{ route('konsumens.edit', $konsumens->id) }}" class="btn btn-primary mt-3">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>