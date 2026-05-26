@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0"><i class="bi bi-person-badge"></i> Detail Data Mahasiswa</h4>
                </div>
                <div class="card-body">
                    <!-- Tabel Data Mahasiswa -->
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered">
                            <tr>
                                <th style="width: 30%; background-color: #f8f9fa;">NIM</th>
                                <td>{{ $student->nim }}</td>
                            </tr>
                            <tr>
                                <th style="background-color: #f8f9fa;">Nama Lengkap</th>
                                <td>{{ $student->name }}</td>
                            </tr>
                            <tr>
                                <th style="background-color: #f8f9fa;">Alamat</th>
                                <td>{{ $student->address }}</td>
                            </tr>
                            <tr>
                                <th style="background-color: #f8f9fa;">Jurusan (Major)</th>
                                <td>{{ $student->major->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th style="background-color: #f8f9fa;">Mata Kuliah yang Diambil</th>
                                <td>
                                    @if($student->subjects->count())
                                        <ul class="mb-0">
                                            @foreach($student->subjects as $subject)
                                                <li>{{ $subject->name }} (SKS: {{ $subject->sks }})</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <i class="text-muted">Belum mengambil mata kuliah</i>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>

                    <!-- Jadwal Kuliah per Mata Kuliah -->
                    @if($student->subjects->count())
                        <div class="mt-4">
                            <h5 class="border-bottom pb-2 mb-3"><i class="bi bi-calendar-week"></i> Jadwal Kuliah per Mata Kuliah</h5>
                            @foreach($student->subjects as $subject)
                                <div class="card mb-3 shadow-sm">
                                    <div class="card-header bg-light fw-bold">
                                        {{ $subject->name }}
                                        <span class="badge bg-secondary ms-2">{{ $subject->sks }} SKS</span>
                                    </div>
                                    <div class="card-body">
                                        @if($subject->schedules->count())
                                            <ul class="list-group list-group-flush">
                                                @foreach($subject->schedules as $schedule)
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <span>
                                                            <i class="bi bi-calendar-day"></i> {{ $schedule->day }}
                                                            &nbsp;|&nbsp;
                                                            <i class="bi bi-clock"></i> {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }} - {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
                                                        </span>
                                                        <span class="badge bg-info text-dark">Ruang: {{ $schedule->room ?? '-' }}</span>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <p class="text-muted mb-0">Belum ada jadwal untuk mata kuliah ini.</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif

                    <!-- Tombol Kembali -->
                    <div class="mt-4">
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection