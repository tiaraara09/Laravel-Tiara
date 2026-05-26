@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Mata Kuliah: {{ $subject->name }}</h2>
    <p>SKS: {{ $subject->sks }}</p>

    <h4>Jadwal Kuliah</h4>
    @if($subject->schedules->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Ruang</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subject->schedules as $schedule)
                <tr>
                    <td>{{ $schedule->day }}</td>
                    <td>{{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}</td>
                    <td>{{ $schedule->room ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Belum ada jadwal untuk mata kuliah ini.</p>
    @endif

    <a href="{{ route('students.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection