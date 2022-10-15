@extends('templates.app')

@push('style')
<link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="{{ asset('')}}assets/css/thema-date.css">
<link rel="stylesheet" type="text/css" href="{{ asset('')}}assets/css/thema-regis.css">
<link rel="stylesheet" type="text/css" href="{{ asset('')}}assets/css/datedropper.css">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">

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
    .dataTables_paginate .paging_simple_numbers{
        
    }
    #table-1_paginate{
        display: none !important;
    }
    .dataTables_length{
        display: none;
    }
    .dataTables_filter{
        display: none !important;
    }
    .dataTables_info{
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
    a{
        color: #1f2937;
    }
    a:hover{
        color: #444;
    }
    .end {
        text-align: end;
    }
</style>
@endpush

@section('content')

<!-- Main Container -->
<main id="main-container">

    <!-- Breadcrumb -->
  <div class="bg-body-light">
    <div class="content content-full" style="padding-top: 4px;padding-bottom: 6px;">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-2">
            Form Data Pengunjung
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            Draggable with mouse and touch, flexible and mobile friendly content sliders.
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt" style="background: none">
            <li class="breadcrumb-item">
              <a class="link-fx" href="/home">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a class="link-fx" href="/manage-visitor">visitors</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
              Form Edit visitor
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Breadcrumb -->

    <div class="content">
        <div class="card mb-4">
            <h5 class="card-header" style="padding:8px 0px">
                <div class="border-kiri" style="border-left: 4px solid #1f2937;padding:6px 13px">
                        <div class="col" style="margin-left:-8px;padding-left:0px;margin-top:8px"><span> Edit Data Pengunjung</span></div>    
                </div>
            </h5>
            <div class="card-body">
                <div class="row">
                    <p class="text-secondary">Catatan : tanda (<span class="text-danger">*</span>) Wajib Diisi !</p>
                    <form action="/visitor/{{ $visitor->id }}" method="post">
                        @method('patch')
                        @csrf
                        <div class="col-10">
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label end">Nama Pengunjung<small
                                        class="text-danger">*</small></label>
                                <div class="col">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="formGroupExampleInput" name="name" placeholder="Name Lengkap"
                                        value="{{ old('name',$visitor->name)}}">
                                    @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label end">Nomer Tiket <small
                                        class="text-danger">*</small></label>
                                <div class="col-6">
                                    <input type="text" readonly class="form-control @error('no_ticket') is-invalid @enderror"
                                        id="formGroupExampleInput" placeholder="Nomer Tiket"
                                        value="{{ $visitor->no_ticket }}">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label end">Kelas dan Acara<small
                                        class="text-danger">*</small></label>
                                <div class="col">
                                    <select
                                        class="js-example-basic-single-kelas form-control @error('class') is-invalid @enderror"
                                        style="width: 89.1%" name="class">
                                        
                                        <option value="VIP" {{ old('class', $visitor->class ) == 'VIP' ?
                                            'selected' : ''}}>VIP
                                        </option>
                                        <option value="Bisnis" {{ old('class', $visitor->class )=='Bisnis' ?
                                            'selected' : '' }}>
                                            Bisnis</option>
                                        <option value="Ekonomi" {{ old('class', $visitor->class )=='Ekonomi' ?
                                            'selected' : '' }}>
                                            Ekonomi</option>
                                    </select><br>
                                    @error('religion')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                        <i class="fa fa-calendar-alt"></i>
                                        </span>
                                        <input type="text" class="form-control @error('event_time') is-invalid @enderror" name="event_time"
                                        type="text" data-large-mode="true" id="date-regis" data-lock="from" data-translate-mode="true" data-theme="thema-regis"
                                        value="{{ old('event_time',$visitor->event_time) }}" style="background: white">
                                        @error('event_time')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label end">Tanggal Lahir <small
                                        class="text-danger">*</small></label>
                                <div class="col-5">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                        <i class="fa fa-calendar-alt"></i>
                                        </span>
                                        <input type="text" class="form-control @error('date_birth') is-invalid @enderror" name="date_birth"
                                        type="text" data-large-mode="true" id="dropper" data-translate-mode="true" data-theme="thema-date"
                                        value="{{ old('date_birth',$visitor->date_birth) }}" style="background: white">
                                        @error('date_birth')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label end">Agama<small
                                        class="text-danger">*</small></label>
                                <div class="col-5 ">
                                    <select
                                        class="js-example-basic-single-religion form-control @error('religion') is-invalid @enderror"
                                        style="width: 89.1%" name="religion">
                                        
                                        <option value="Islam" {{ old('religion', $visitor->religion ) == 'Islam' ?
                                            'selected' : ''}}>Islam
                                        </option>
                                        <option value="Katholik" {{ old('religion', $visitor->religion )=='Katholik' ?
                                            'selected' : '' }}>
                                            Khatolik</option>
                                        <option value="Protestan" {{ old('religion',$visitor->religion)=='Protestan' ?
                                            'selected' : '' }}>
                                            Protestan</option>
                                        <option value="Budha" {{ old('religion',$visitor->religion)=='Budha' ?
                                            'selected' : '' }}>Budha
                                        </option>
                                        <option value="Hindu" {{ old('religion',$visitor->religion)=='Hindu' ?
                                            'selected' : '' }}>Hindu
                                        </option>
                                        <option value="Konghucu" {{ old('religion',$visitor->religion)=='Konghucu' ?
                                            'selected' : '' }}>
                                            Konghucu</option>
                                    </select><br>
                                    @error('religion')
                                    <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row" style="margin-bottom: 0px">
                                <label for="staticEmail" class="col-sm-3 col-form-label end">Jenis Kelamin<small
                                        class="text-danger">*</small></label>
                                <div class="col">
                                    <div class="mb-4">
                                        <div class="space-x-2">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input @error('gender') is-invalid @enderror"
                                                    type="radio" id="example-radios-inline1" name="gender" value="Pria" {{
                                                    old('gender',$visitor->gender) == 'Pria' ? 'checked' : '' }} >
                                                <label class="form-check-label"
                                                    for="example-radios-inline1">Pria</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input @error('gender') is-invalid @enderror"
                                                    type="radio" id="example-radios-inline2" name="gender" value="Wanita" {{
                                                    old('gender',$visitor->gender) == 'Wanita' ? 'checked' : '' }} >
                                                <label class="form-check-label"
                                                    for="example-radios-inline2">Wanita</label>
                                            </div>
                                        </div>
                                        @error('gender')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
    
                            {{-- style="margin-left: 5px;padding-right: 0px;margin-right: 0px; --}}
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-3 col-form-label end">Alamat Lengkap <small
                                        class="text-danger">*</small></label>
                                <div class="col">
                                    <div class="row">
                                        <div class="col">
                                            <select class="form-control @error('province_id') is-invalid @enderror"
                                                style="margin-left:7px" data-placeholder="=== Provinsi ==="
                                                name="province_id" id="select_province">
                                                <option value="{{ old('province_id',$province_selected->id) }}">
                                                    {{$province_selected->name }}
                                                </option>
                                            </select>
                                            @error('province_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <select class="form-control @error('regency_id') is-invalid @enderror"
                                                data-placeholder="=== Kabupaten / Kota ===" name="regency_id"
                                                id="select_regency">
                                                <option value="{{ old('regency_id',$regency_selected->id) }}">{{
                                                    $regency_selected->name }}</option>
                                            </select>
                                            @error('regency_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col">
                                            <select class="form-control @error('district_id') is-invalid @enderror"
                                                data-placeholder="=== Kecamatan ===" name="district_id"
                                                id="select_district">
                                                <option value="{{ old('district_id',$district_selected->id) }}">{{
                                                    $district_selected->name}}</option>
                                            </select>
                                            @error('district_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <select class="form-control @error('village_id') is-invalid @enderror"
                                                data-placeholder="=== Desa ===" name="village_id" id="select_village">
                                                <option value="{{ old('village_id',$village_selected->id) }}">{{
                                                    $village_selected->name }}</option>
                                            </select>
                                            @error('village_id')
                                            <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>

                            
                            <div class="row mt-5" style="margin: 0px 172px;">
                                <div class="col">
                                    <button type="submit" class="btn btn-block btn-dark"
                                        style="margin-left: 47px">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
           
        </div>
</main>

@endsection

@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('')}}assets/js/plugins/select2/js/icon_select.full.min.js"></script>
<script src="{{ asset('')}}assets/js/region.js"></script>
<script>
    $(document).ready(function () {
        $('#table-1').DataTable();
        $('.js-example-basic-single-kelas').select2({
            allowClear: true,
            placeholder: "=== Pilih Kelas ==="
        });
        $('.js-example-basic-single-religion').select2({
            allowClear: true,
            placeholder: "=== Pilih Agama ==="
        });
        $(".js-example-basic-single-unit").select2({
            allowClear: true,
            placeholder: "=== Sektor Unit ==="
        });
         $(".js-example-basic-single-position").select2({
            allowClear: true,
            placeholder: "=== Jabatan ==="
        });
        $('#dropper').dateDropper();
        $('#date-regis').dateDropper();
    });    
</script>

<script src="{{ asset('')}}assets/js/plugins/datedropper/datedropper.js"></script>

<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

@endpush