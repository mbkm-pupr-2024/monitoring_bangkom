@extends('layout.navbar')

@section('style')
@endsection

@section('sidebar')
@include('layout.sidebar')
@endsection

@section('content')

<div class="app-content">
    @if(Session::has('success'))
        <script>
            Swal.fire({
                title: '{{ Session::get('popUp_title') }}',
                text: '{{ Session::get('success') }}',
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb breadcrumb-container bg-primary">
                            <li class="breadcrumb-item"><a href="#">Perlatihan Berlangsung</a></li>
                            <li class="breadcrumb-item"><a href="#">{{ $pelatihan->pelatihan }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Status Pelatihan</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card todo-container">
                        <div class="row">
                            <div class="col-xl-4 col-xxl-3">
                                <div class="todo-menu">
                                    <h5 class="todo-menu-title">Status</h5>
                                    @if ($status->status == 'Selesai')
                                        <span class="badge badge-success float-end" >Selesai</span>
                                    @else
                                        <span class="badge badge-info float-end" >Sedang berlangsung</span>
                                    @endif
                                    <hr>
                                    <br>
                                    <ul class="list-unstyled todo-status-filter nav nav-pills" id="pills-tab" role="tablist">
                                        <?php
                                            $no_sop = 1;
                                        ?>
                                        @foreach ($sopKegiatan as $sop)
                                        @if ($detil_status->isEmpty())
                                            @if ($no_sop == 1)
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="pills-{{ $sop[0]->sop_pelatihan->id }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $sop[0]['id'] }}" type="button" role="tab" aria-controls="pills-{{ $sop[0]['id'] }}" aria-selected="true">
                                                        <i class="material-icons-outlined">{{ $sop[0]->sop_pelatihan->icon}}</i>{{ $sop[0]->sop_pelatihan->sop}}
                                                    </a>
                                                </li>
                                            @else
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="pills-{{ $sop[0]->sop_pelatihan->id }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $sop[0]['id'] }}" type="button" role="tab" aria-controls="pills-{{ $sop[0]['id'] }}" aria-selected="true">
                                                    <i class="material-icons-outlined">{{ $sop[0]->sop_pelatihan->icon}}</i>{{ $sop[0]->sop_pelatihan->sop}}
                                                </a>
                                            </li>
                                            @endif
                                        @else
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="pills-{{ $sop[0]->sop_pelatihan->id }}-tab" data-bs-toggle="pill" data-bs-target="#pills-{{ $sop[0]['id'] }}" type="button" role="tab" aria-controls="pills-{{ $sop[0]['id'] }}" aria-selected="true">
                                                    <i class="material-icons-outlined">{{ $sop[0]->sop_pelatihan->icon}}</i>{{ $sop[0]->sop_pelatihan->sop}}
                                                </a>
                                            </li>
                                        @endif
                                        @php
                                            $no_sop++;
                                        @endphp
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="col-xl-8 col-xxl-9">
                                <div class="todo-list">
                                    @php
                                        $index_kegiatan = 1;
                                    @endphp
                                    <div class="tab-content" id="pills-tabContent">
                                    @php
                                        $last_pills_tab = '';
                                        $last_pills_content = '';
                                    @endphp
                                    @foreach ($sopKegiatan as $kegiatans)
                                    @if ($detil_status->isEmpty())
                                        @if ($index_kegiatan == 1)
                                            <ul class="list-unstyled tab-pane fade show active" id="pills-{{ $kegiatans[0]['id'] }}" role="tabpanel" aria-labelledby="pills-{{ $kegiatans[0]['id'] }}-tab">
                                        @else
                                        <ul class="list-unstyled tab-pane fade" id="pills-{{ $kegiatans[0]['id'] }}" role="tabpanel" aria-labelledby="pills-{{ $kegiatans[0]['id'] }}-tab">
                                        @endif
                                    @else
                                        <ul class="list-unstyled tab-pane fade" id="pills-{{ $kegiatans[0]['id'] }}" role="tabpanel" aria-labelledby="pills-{{ $kegiatans[0]['id'] }}-tab">
                                    @endif
                                        @php
                                            $no_kegiatan = 1;
                                            $last_done_event = 1;
                                        @endphp
                                        @foreach ($kegiatans as $kegiatan)
                                            <li class="todo-item">
                                                <div class="todo-item-content">
                                                    <span class="todo-item-title">{{ $no_kegiatan . '. '  .$kegiatan->kegiatan }}
                                                    </span>
                                                    <span class="todo-item-subtitle">{{ $kegiatan->deskripsi }}</span>
                                                </div>
                                                @if ($detil_status->contains('kegiatan', $kegiatan->id))
                                                    <div class="widget-stats-icon widget-stats-icon-warning">
                                                        <i class="large material-icons-outlined text-success font-weight-bold">task_alt</i>
                                                    </div>
                                                    @php
                                                        $last_pills_tab = $kegiatans[0]->sop_pelatihan->id;
                                                        $last_pills_content = $kegiatans[0]['id'];
                                                        $last_done_event++;
                                                    @endphp
                                                @else
                                                    @auth('admin')
                                                    <div class="todo-item-actions">
                                                        <script>
                                                            function ceklis_button_{{ $kegiatan->id }}() {
                                                                Swal.fire({
                                                                title: "Konfirmasi Ceklis Kegiatan",
                                                                text: "Apakah Anda yakin ingin melakukan ceklis kegiatan ini? ",
                                                                icon: "warning",
                                                                showCancelButton: true,
                                                                confirmButtonColor: "#3085d6",
                                                                cancelButtonText: "Batal",
                                                                cancelButtonColor: "#d33",
                                                                confirmButtonText: "Ceklis"
                                                                }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    window.location.href = "/pelatihan/{{ $pelatihan->id }}/ceklis-status/{{ $kegiatan->id }}";
                                                                }
                                                                });
                                                            }
                                                        </script>
                                                        <a onclick="ceklis_button_{{ $kegiatan->id }}()" class="todo-item-done" style="cursor: pointer;"><i class="material-icons-outlined no-m">done</i></a>
                                                    </div>
                                                    @endauth
                                                @endif
                                            </li>
                                        @php
                                            $no_kegiatan++;
                                        @endphp
                                            @endforeach
                                        </ul>
                                    @php
                                        $index_kegiatan++;
                                    @endphp
                                        @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('assets/js/pages/widgets.js') }}"></script>
<script>
    var targetPills = "pills-{{ $last_pills_tab }}-tab";
    var targetPillsElement = document.getElementById(targetPills);
        if (targetPillsElement) {
            targetPillsElement.classList.add("active");
            // targetPillsElement.scrollIntoView({
            // behavior: "smooth", // Smooth scrolling
            // block: "start" // Scroll to the top of the element
        // });
            // targetPillsElement.scrollIntoView({ behavior: 'smooth' });
        }

    var targetPillsContent = "pills-{{ $last_pills_content }}";
    var targetPillsContentElement = document.getElementById(targetPillsContent);
        if (targetPillsContentElement) {
            targetPillsContentElement.classList.add("show", "active");
        }

    var targetId = "selesai_{{ $last_done_event - 1 }}";
    var targetElement = document.getElementById(targetId);
    if (targetElement) {
        targetElement.scrollIntoView({ behavior: 'smooth' });
        // targetElement.scrollIntoView();
    }
</script>

@endsection

