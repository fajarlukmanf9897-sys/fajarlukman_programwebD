@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span>{{ $message->subject }}</span>
                    <a href="{{ route('messages.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                </div>

                <div class="card-body">
                    <p><strong>Dari:</strong> {{ $message->sender->name }}</p>
                    <p><strong>Tanggal:</strong> {{ $message->created_at->format('d/m/Y H:i') }}</p>
                    <hr>
                    <p class="mb-4">{{ $message->body }}</p>

                    {{-- Tombol hapus diletakkan di halaman detail --}}
                    <div class="d-flex justify-content-end">
                        <form action="{{ route('messages.destroy', $message) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection