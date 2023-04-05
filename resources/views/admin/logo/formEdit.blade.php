@extends('admin.index.index')
@section('title', 'Form Edit')
@section('content')

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Form Elements</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
          <li class="breadcrumb-item active">Elements</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-9">

          <div class="card">
            <div class="card-body">
                <form role="form" action="{{url('/admin/logo/update/'. $data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf  
              <h5 class="card-title">Tambah Produk</h5>

              <!-- General Form Elements -->
              <form>
                <div class="row mb-3">
                    <label for="inputID" class="col-sm-2 col-form-label">ID</label>
                    <input type="number" class="form-control" name="id" value="{{$data->id}}">
                </div>

                <div class="row mb-3">
                  <label for="inputGambar" class="col-sm-2 col-form-label">Logo</label>
                  <input class="form-control" type="file" name="img_logo" value="{{$data->img_logo}}">
                </div>

                <div class="col-sm-10">
                    <button type="submit" class="float-right btn btn-primary">Submit</button>
                </div>

              </form><!-- End General Form Elements -->

            </div>
          </div>

        </div>

      </div>
    </section>

  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


@endsection