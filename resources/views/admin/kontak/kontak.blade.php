@extends('admin.index.index')
@section('title', 'Table')
@section('content')

<link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

<main id="main" class="main">
  <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Kontak</li>
        </ol>
      </nav>
  </div>

  <section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-12">
        <div class="row">

          <!-- Top Selling -->
          <div class="col-15">
            <div class="card top-selling overflow-auto">

              <div class="card-body pb-0">
                
                <div class="card-header">
                  <center>DATA KONTAK<br>
                  </div>
                  <div class="card-header">
                  <a href="/admin/kontak/add/"><button class="btn btn-sm btn-primary float-right">TAMBAH</button></a>

                </div>

                <table id="myTable" class="table table-borderless">
                  
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>WHATSAPP</th>
                      <th>ALAMAT</th>
                      <th>EMAIL</th>
                      <th>ACTION</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($data as $d)
                    <tr>
                      <td>{{$d->id}}</td>
                      <td>{{$d->no_telp}}</td>
                      <td>{{$d->alamat}}</td>
                      <td>{{$d->email}}</td>
                      <td>
                        <a href="admin/kontak/details/{{$d->id}}"><button class="btn btn-warning">EDIT</button></a>
                        <a href="admin/kontak/delete{{$d->id}}"><button class="btn btn-danger">DELETE</button></a>
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>

              </div>

            </div>
          </div>
          <!-- End Top Selling -->

        </div>
      </div>
      <!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">
      </div>
      <!-- End Right side columns -->

    </div>
  </section>


</main>

<script>
  $(document).ready(function () {
    $('#myTable').DataTable();
  });
</script>
@endsection