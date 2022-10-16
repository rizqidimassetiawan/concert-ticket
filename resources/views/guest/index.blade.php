@extends('templates.auth')

@push('styles')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('')}}assets/css/thema-date.css">

<link rel="stylesheet" type="text/css" href="{{ asset('')}}assets/css/thema-regis.css">
<link rel="stylesheet" type="text/css" href="{{ asset('')}}assets/css/datedropper.css">

<style>
  .select2-container--default .select2-selection--single .select2-selection__placeholder {
    color: #495057;
  }

  .select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: #4c78dd;
  }

  .select2-container .select2-selection--single {
    height: 38px !important;
  }

  .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 34px;
  }

  .select2-container--default .select2-selection--single .select2-selection__clear {

    height: 35px;

  }

  .dataTables_paginate .paging_simple_numbers {}

  #table-1_paginate {
    display: none !important;
  }

  .dataTables_length {
    display: none;
  }

  .dataTables_filter {
    display: none !important;
  }

  .dataTables_info {
    display: none;
  }

  .select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 36px !important;
    position: absolute;
    top: 1px;
    right: 1px;
    width: 20px;
  }

  .table-hover tbody tr:hover td,
  .table-hover tbody tr:hover th {
    background-color: #0d6efd !important;
    color: #ffff;
  }

  div.dataTables_wrapper div.dataTables_info {
    padding-top: 20px;
    white-space: nowrap;
  }

  a {
    color: #1f2937;
  }

  a:hover {
    color: #444;
  }

  .end {
    text-align: end;
  }
</style>

@endpush
@section('content')

<div class="bg-primary-dark">
  <div class="row g-0 bg-primary-dark-op">
    <!-- Meta Info Section -->
    <div class="hero-static col-lg-4 d-none d-lg-flex flex-column justify-content-center">
      <div class="p-4 p-xl-5 flex-grow-1 d-flex align-items-center">
        <div class="w-100">
          <a class="link-fx fw-semibold fs-2 text-white" href="index.html">
            One<span class="fw-normal">UI</span>
          </a>
          <p class="text-white-75 me-xl-8 mt-2">
            Creating a new account is completely free. Get started with 5 projects to manage and feel free to upgrade as
            your business grow.
          </p>
        </div>
      </div>
      <div class="p-4 p-xl-5 d-xl-flex justify-content-between align-items-center fs-sm">
        <p class="fw-medium text-white-50 mb-0">
          <strong>OneUI 5.0</strong> &copy; <span data-toggle="year-copy"></span>
        </p>
        <ul class="list list-inline mb-0 py-2">
          <li class="list-inline-item">
            <a class="text-white-75 fw-medium" href="javascript:void(0)">Legal</a>
          </li>
          <li class="list-inline-item">
            <a class="text-white-75 fw-medium" href="javascript:void(0)">Contact</a>
          </li>
          <li class="list-inline-item">
            <a class="text-white-75 fw-medium" href="javascript:void(0)">Terms</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- END Meta Info Section -->

    <!-- Main Section -->
    <div class="hero-static col-lg-8 d-flex flex-column align-items-center bg-body-light">
      <div class="p-3 w-100 d-lg-none text-center">
        <a class="link-fx fw-semibold fs-3 text-dark" href="index.html">
          One<span class="fw-normal">UI</span>
        </a>
      </div>
      <div class="p-4 w-100 flex-grow-1 d-flex align-items-center">
        <div class="w-100">
          <!-- Header -->
          <div class="text-center mb-5">
            <p class="mb-3">
              <i class="fa fa-2x fa-circle-notch text-primary-light"></i>
            </p>
            <h1 class="fw-bold mb-2">
              Pesan Tiket Konser
            </h1>
            <p class="fw-medium text-muted">
              Dapatkan Sensasi Menonton Secara Langsung
            </p>
          </div>
          <!-- END Header -->

          <!-- Sign Up Form -->
          <!-- jQuery Validation (.js-validation-signup class is initialized in js/pages/op_auth_signup.min.js which was auto compiled from _js/pages/op_auth_signup.js) -->
          <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
          <form style="padding-left: 5rem;padding-right:5rem" action="/booking" method="POST">
            @method('post')
            @csrf
            <div class="row">
              <div class="col">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" name="name">
              </div>

              <div class="col">
                <label class="form-label">Tanggal Lahir</label>
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="fa fa-calendar-alt"></i>
                  </span>
                  <input type="text" class="form-control @error('date_birth') is-invalid @enderror" name="date_birth"
                    type="text" data-large-mode="true" id="dropper" data-translate-mode="true" data-theme="thema-date"
                    value="{{ old('date_birth') }}" style="background: white">
                  @error('date_birth')
                  <small class="text-danger"></small>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row mt-4">
              <div class="col">
                <label class="form-label">Tanggal Acara</label>
                <div class="input-group">
                  <span class="input-group-text">
                    <i class="fa fa-calendar-alt"></i>
                  </span>
                  <input type="text" class="form-control @error('event_time') is-invalid @enderror" name="event_time"
                    type="text" data-large-mode="true" id="date-regis" data-translate-mode="true" data-theme="thema-regis"
                    value="{{ old('event_time') }}" style="background: white">
                  @error('event_time')
                  <small class="text-danger"></small>
                  @enderror
                </div>
              </div>
              <div class="col">
                <label class="form-label">Kelas tiket</label>
                <select class="js-example-basic-single-kelas form-control @error('class') is-invalid @enderror"
                  style="width: 100%" name="class">
                  <option></option>
                  <option value="VIP">VIP</option>
                  <option value="Bisnis">Bisnis</option>
                  <option value="Bisnis">Ekonomi</option>

                </select><br>
                @error('religion')
                <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="col">
                <label class="form-label">Band Favorit</label>
                <select class="js-example-basic-single-band form-control @error('class') is-invalid @enderror"
                  style="width: 100%" name="band_id">
                  <option></option>
                  @foreach ($bands as $band)
                  <option value="{{ $band->id }}">{{ $band->name }}</option>
                  @endforeach
                </select><br>
                @error('religion')
                <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>
            </div>

            <div class="row mt-4">
              <div class="col">
                <label class="form-label">Agama</label>
                <select class="js-example-basic-single-religion form-control @error('religion') is-invalid @enderror"
                  style="width: 100%" name="religion">
                  <option></option>
                  <option value="Islam" {{ old('religion')=='Islam' ? 'selected' : '' }}>Islam
                  </option>
                  <option value="Katholik" {{ old('religion')=='Katholik' ? 'selected' : '' }}>
                    Khatolik</option>
                  <option value="Protestan" {{ old('religion')=='Protestan' ? 'selected' : '' }}>
                    Protestan</option>
                  <option value="Budha" {{ old('religion')=='Budha' ? 'selected' : '' }}>Budha
                  </option>
                  <option value="Hindu" {{ old('religion')=='Hindu' ? 'selected' : '' }}>Hindu
                  </option>
                  <option value="Konghucu" {{ old('religion')=='Konghucu' ? 'selected' : '' }}>
                    Konghucu</option>
                </select><br>
                @error('religion')
                <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              <div class="col">
                <label class="form-label">Jenis Kelamin</label>
                <div class="space-x-2">
                  <div class="form-check form-check-inline">
                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                      id="example-radios-inline1" name="gender" value="Pria" {{ old('gender')=='Pria' ? 'checked' : ''
                      }}>
                    <label class="form-check-label" for="example-radios-inline1">Pria</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input @error('gender') is-invalid @enderror" type="radio"
                      id="example-radios-inline2" name="gender" value="Wanita" {{ old('gender')=='Wanita' ? 'checked'
                      : '' }}>
                    <label class="form-check-label" for="example-radios-inline2">Wanita</label>
                  </div>
                </div>
                @error('gender')
                <small class="text-danger">{{ $message }}</small>
                @enderror
              </div>

              

            </div>

            <div class="row mt-4">
              <div class="col-6">
                <label for="exampleInputPassword1" class="form-label" style="margin-top: 5rem">Alamat Lengkap</label>
              </div>
              <div class="col">
                <div class="row mb-3">
                  <div class="col">
                    <select class="form-control @error('province_id') is-invalid @enderror" style="margin-left:7px"
                      data-placeholder="=== Pilih Provinsi ===" name="province_id" id="select_province">
                      <option value="{{ old('province_id') }}"></option>
                    </select>
                    @error('province_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col">
                    <select class="form-control @error('regency_id') is-invalid @enderror" style="margin-left:7px"
                      data-placeholder="=== Pilih Kabupaten / Kota ===" name="regency_id" id="select_regency">
                      <option value="{{ old('regency_id') }}"></option>
                    </select>
                    @error('regency_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <div class="col">
                    <select class="form-control @error('district_id') is-invalid @enderror" style="margin-left:7px"
                      data-placeholder="=== Pilih Kecamatan ===" name="district_id" id="select_district">
                      <option value="{{ old('district_id') }}"></option>
                    </select>
                    @error('district_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <select class="form-control @error('village_id') is-invalid @enderror" style="margin-left:7px"
                      data-placeholder="=== Pilih Kelurahan ===" name="village_id" id="select_village">
                      <option value="{{ old('village_id') }}"></option>
                    </select>
                    @error('village_id')
                    <small class="text-danger">{{ $message }}</small>
                    @enderror
                  </div>
                </div>
              </div>
            </div>

            <div class="d-grid gap-2 col-6 mx-auto mt-5">
              <button class="btn btn-outline-dark" type="submit">Pesan Sekarang</button>
            </div>
          </form>
          <!-- END Sign Up Form -->
        </div>
      </div>
      <div
        class="px-4 py-3 w-100 d-lg-none d-flex flex-column flex-sm-row justify-content-between fs-sm text-center text-sm-start">
        <p class="fw-medium text-black-50 py-2 mb-0">
          <strong>OneUI 5.0</strong> &copy; <span data-toggle="year-copy"></span>
        </p>
        <ul class="list list-inline py-2 mb-0">
          <li class="list-inline-item">
            <a class="text-muted fw-medium" href="javascript:void(0)">Legal</a>
          </li>
          <li class="list-inline-item">
            <a class="text-muted fw-medium" href="javascript:void(0)">Contact</a>
          </li>
          <li class="list-inline-item">
            <a class="text-muted fw-medium" href="javascript:void(0)">Terms</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- END Main Section -->
  </div>

  <!-- Terms Modal -->
  <div class="modal fade" id="one-signup-terms" tabindex="-1" role="dialog" aria-labelledby="one-signup-terms"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-popout" role="document">
      <div class="modal-content">
        <div class="block block-rounded block-transparent mb-0">
          <div class="block-header block-header-default">
            <h3 class="block-title">Terms &amp; Conditions</h3>
            <div class="block-options">
              <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                <i class="fa fa-fw fa-times"></i>
              </button>
            </div>
          </div>
          <div class="block-content">
            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris
              adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos
              habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit
              metus mi.</p>
            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris
              adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos
              habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit
              metus mi.</p>
            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris
              adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos
              habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit
              metus mi.</p>
            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris
              adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos
              habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit
              metus mi.</p>
            <p>Dolor posuere proin blandit accumsan senectus netus nullam curae, ornare laoreet adipiscing luctus mauris
              adipiscing pretium eget fermentum, tristique lobortis est ut metus lobortis tortor tincidunt himenaeos
              habitant quis dictumst proin odio sagittis purus mi, nec taciti vestibulum quis in sit varius lorem sit
              metus mi.</p>
          </div>
          <div class="block-content block-content-full text-end bg-body">
            <button type="button" class="btn btn-sm btn-alt-secondary me-1" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-sm btn-primary" data-bs-dismiss="modal">I Agree</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END Terms Modal -->
</div>

@endsection


@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('')}}assets/js/plugins/select2/js/icon_select.full.min.js"></script>
<script src="{{ asset('')}}assets/js/region.js"></script>
<script>
  $(document).ready(function () {
    $('.js-example-basic-single-kelas').select2({
      allowClear: true,
      placeholder: "=== Pilih Kelas ==="
    });
    $('.js-example-basic-single-religion').select2({
      allowClear: true,
      placeholder: "=== Pilih Agama ==="
    });
    $('.js-example-basic-single-band').select2({
      allowClear: true,
      placeholder: "=== Band Favorit ==="
    });
    $('#dropper').dateDropper();
    $('#date-regis').dateDropper();
  });    
</script>

<script src="{{ asset('')}}assets/js/plugins/datedropper/datedropper.js"></script>

@endpush