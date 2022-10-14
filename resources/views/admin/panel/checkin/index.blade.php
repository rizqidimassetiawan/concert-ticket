@extends('templates.app')
@push('style')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-bs5/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('')}}assets/css/thema-date.css">
<link rel="stylesheet" type="text/css" href="{{ asset('')}}assets/css/datedropper.css">
<link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables-buttons-bs5/buttons.bootstrap5.min.css') }}">

<style>


@keyframes ldio-6yuhhzk9ems-1 {
  0% { top: 13px; height: 74px }
  50% { top: 31.5px; height: 37px }
  100% { top: 31.5px; height: 37px }
}
@keyframes ldio-6yuhhzk9ems-2 {
  0% { top: 17.625px; height: 64.75px }
  50% { top: 31.5px; height: 37px }
  100% { top: 31.5px; height: 37px }
}
@keyframes ldio-6yuhhzk9ems-3 {
  0% { top: 22.25px; height: 55.5px }
  50% { top: 31.5px; height: 37px }
  100% { top: 31.5px; height: 37px }
}
.ldio-6yuhhzk9ems div { position: absolute; width: 10px }.ldio-6yuhhzk9ems div:nth-child(1) {
  left: 20px;
  background: #e15b64;
  animation: ldio-6yuhhzk9ems-1 1.8518518518518516s cubic-bezier(0,0.5,0.5,1) infinite;
  animation-delay: -0.37037037037037035s
}
.ldio-6yuhhzk9ems div:nth-child(2) {
  left: 45px;
  background: #f8b26a;
  animation: ldio-6yuhhzk9ems-2 1.8518518518518516s cubic-bezier(0,0.5,0.5,1) infinite;
  animation-delay: -0.18518518518518517s
}
.ldio-6yuhhzk9ems div:nth-child(3) {
  left: 70px;
  background: #abbd81;
  animation: ldio-6yuhhzk9ems-3 1.8518518518518516s cubic-bezier(0,0.5,0.5,1) infinite;
  animation-delay: undefineds
}

.loadingio-spinner-pulse-hf2ilzojin6 {
  width: 38px;
  height: 38px;
  display: inline-block;
  overflow: hidden;
}
.ldio-6yuhhzk9ems {
  width: 100%;
  height: 100%;
  position: relative;
  transform: translateZ(0) scale(0.38);
  backface-visibility: hidden;
  transform-origin: 0 0; /* see note above */
}
.ldio-6yuhhzk9ems div { box-sizing: content-box; }
/* generated by https://loading.io/ */
 
  .fa-2x {
    font-size: 1rem;
  }

  /* .message {
    display: none;
  } */
  #loading{
    display: none;
  }
  .select2-container--default .select2-selection--multiple .select2-selection__choice {
    margin: .25rem .25rem .25rem 0;
    height: 1.375rem;
    line-height: 1.375rem;
    color: #fff;
    font-size: .875rem;
    font-weight: 600;
    background-color: #4c78dd;
    border: none;
    border-radius: .25rem
  }

  .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    color: rgba(255, 255, 255, .5);
    cursor: pointer;
    display: inline-block;
    font-weight: bold;
    margin-right: 7px;
  }

  .hidden {
    display: none !important;
  }
</style>
@endpush()
@section('content')


<!-- Main Container -->
<main id="main-container">

  <!-- Hero -->
  <div class="bg-body-light">
    <div class="content content-full" style="padding-top: 4px;padding-bottom: 6px;">
      <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center py-2">
        <div class="flex-grow-1">
          <h1 class="h3 fw-bold mb-2">
            Sliders
          </h1>
          <h2 class="fs-base lh-base fw-medium text-muted mb-0">
            Draggable with mouse and touch, flexible and mobile friendly content sliders.
          </h2>
        </div>
        <nav class="flex-shrink-0 mt-3 mt-sm-0 ms-sm-3" aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-alt">
            <li class="breadcrumb-item">
              <a class="link-fx" href="/home">Home</a>
            </li>
            <li class="breadcrumb-item">
              <a class="link-fx" href="/scheduler/custom">Custom Scheduler</a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
              Form Create
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
  <!-- END Hero -->

  <div class="content">

    <div class="block block-rounded">
      <div class="block-header block-header-default">
        <h3 class="block-title">From Create</h3>
      </div>
      <div class="block-content">

        <form action="/" method="post">
          @csrf
          <div class="row mb-3">
            <div class="col">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Location..." name="search" id="search-input">
                <button class="btn btn-outline-secondary" type="button" id="btn-search"><i
                    class="fa fa-fw fa-search"></i></button>
              </div>
              <div class="message">
                
              </div>
              
            </div>
          </div>
          <div class="row p-0 m-0" id="loading">
           <div class="col d-flex justify-content-center">
              <div class="loadingio-spinner-pulse-hf2ilzojin6"><div class="ldio-6yuhhzk9ems">
                 <div></div><div></div><div></div>
              </div>
            </div>
          </div> 
          </div>
            
          <div class="d-flex justify-content-between mb-4" id="place-list"></div>
    

          <div class="row" style="margin: 4rem 172px 1rem 172px; ">
            <div class="col">
             <div class="d-grid">
                <button class="btn btn-dark" type="submit">Check In</button>
             </div>
            </div>
          </div>
        </form>

        {{-- <form action="/" action="get">
           <div class="row mb-3">
            <div class="col">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Location..." name="search" id="search-input">
                <button class="btn btn-outline-secondary" type="submit" id="btn-search"><i
                    class="fa fa-fw fa-search"></i></button>
              </div>
              <div class="message">
                
              </div>
              
            </div>
        </div>
        </form> --}}
     



      </div>
    </div>
    <!-- END Image Sliders -->
  </div>
  <!-- END Page Content -->
</main>
<!-- END Main Container -->

@endsection
@push('scripts')

<script src="{{ asset('assets/js/plugins/flatpickr/flatpickr.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/select2/js/select2.full.min.js') }}"></script>
{{-- <script src="{{ asset('assets/js/search-location.js') }}"></script> --}}
<script src="{{ asset('')}}assets/js/plugins/datedropper/datedropper.js"></script>



<script>
  $('#example-select2-multiple').select2({
    allowClear: true,
    tags: true,
  });

  $('#dropper').dateDropper();

  $('#invalidCheck').on('change', function () {
    if (this.checked) {
      $('#example-select2-multiple').val(null).trigger('change');
      $('#example-select2-multiple').prop('disabled', true);
      $('#example-select2-multiple').removeAttr('required');
    } else {
      $('#example-select2-multiple').prop('disabled', false);
    }
  });

  flatpickr("#check_in", {});
  flatpickr("#check_out", {});
</script>


@endpush