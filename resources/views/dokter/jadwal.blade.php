@extends('layouts.main')

@section('content')
<div class="container">
    <h1 class="mt-4">Jadwal Dokter</h1>
    <div class="card">
        <div class="card-header">
            <h5 class="font-weight-bold text-primary">Daftar Jadwal Dokter
                <span>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addScheduleModal">+ Tambah Jadwal</button>
                </span>
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama Dokter</th>
                            <th>Hari</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($jadwals as $jadwal)
                        <tr>
                            <td>{{ $jadwal->dokter->nama_dokter }}</td>
                            <td>{{ $jadwal->hari }}</td>
                            <td>{{ $jadwal->jam_mulai }}</td>
                            <td>{{ $jadwal->jam_selesai }}</td>
                            <td>
                                <button class="btn btn-warning btn-edit" data-id="{{ $jadwal->id }}">Edit</button>
                                <form action="{{ route('jadwal-dokter.destroy', $jadwal->id) }}" method="post" class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button onclick="return confirm('Are you sure?')" class="btn btn-danger" type="submit">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Add Schedule Modal -->
<div class="modal fade" id="addScheduleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('jadwal-dokter.store') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="dokter_id">Nama Dokter</label>
                        <select name="dokter_id" id="dokter_id" class="form-control">
                            @foreach($dokters as $dokter)
                            <option value="{{ $dokter->id }}">{{ $dokter->nama_dokter }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <input type="text" name="hari" id="hari" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jam_mulai">Jam Mulai</label>
                        <input type="text" name="jam_mulai" id="jam_mulai" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jam_selesai">Jam Selesai</label>
                        <input type="text" name="jam_selesai" id="jam_selesai" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Edit Schedule Modal -->
<div class="modal fade" id="editScheduleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form id="editScheduleForm" method="post">
            @csrf
            @method('put')
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_dokter_id">Nama Dokter</label>
                        <select name="dokter_id" id="edit_dokter_id" class="form-control">
                            @foreach($dokters as $dokter)
                            <option value="{{ $dokter->id }}">{{ $dokter->nama_dokter }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="edit_hari">Hari</label>
                        <input type="text" name="hari" id="edit_hari" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit_jam_mulai">Jam Mulai</label>
                        <input type="text" name="jam_mulai" id="edit_jam_mulai" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="edit_jam_selesai">Jam Selesai</label>
                        <input type="text" name="jam_selesai" id="edit_jam_selesai" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function() {
    // Edit button click handler
    $('.btn-edit').on('click', function() {
        var id = $(this).data('id');
        $.get('/jadwal-dokter/' + id + '/edit', function(data) {
            $('#edit_dokter_id').val(data.dokter_id);
            $('#edit_hari').val(data.hari);
            $('#edit_jam_mulai').val(data.jam_mulai);
            $('#edit_jam_selesai').val(data.jam_selesai);
            $('#editScheduleForm').attr('action', '/jadwal-dokter/' + id);
            $('#editScheduleModal').modal('show');
        });
    });
});
</script>
@endsection
