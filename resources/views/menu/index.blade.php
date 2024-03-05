@extends('templates.layout')

@push('style')
@endpush

@section('content')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Menu</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active" aria-current="page"><a href="/menu">Menu</a></li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">
            <div class="card-body">

                <!-- Alert Success -->
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <!-- Alert Ketika ada kesalahan -->
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-x-circle"></i> Terdapat beberapa masalah:
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFormMenu">
                    <i class="bi bi-plus"></i> Tambah Menu
                </button>   
                <a href="{{ route('exportExcelMenu') }}" class="btn btn-success">
                    <i class="bi bi-table"></i> Export XSLX
                </a>
                <a href="{{ route('exportPdfMenu') }}" class="btn btn-danger">
                    <i class="bi bi-file-pdf"></i> Export PDF
                </a>
                <button href="{{ route('bintang') }}" type="button" class="btn btn-warning btn-import"
                    data-bs-toggle="modal" data-bs-target="#formImport">
                    <i class="fas fa-file-import"></i> Import
                </button>
                @include('menu.data')
            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection

@include('menu.form')

@push('script')
<script>
    $('.alert-success').fadeTo(2000, 500).slideUp(500, function() {
        $('.alert-success').slideUp(500)
    })

    $('.alert-danger').fadeTo(2000, 500).slideUp(500, function() {
        $('.alert-danger').slideUp(500)
    })

    $(function() {
        // dialog hapus data
        $('.btn-delete').on('click', function(e) {
            const nama = $(this).closest('tr').find('td:eq(1)').text();
            // console.log('nama')
            Swal.fire({
                icon: 'error',
                title: 'Hapus Data',
                html: `Apakah data <b>${nama}</b> akan di hapus?`,
                confirmButtonText: 'Ya',
                denyButtonText: 'Tidak',
                'showDenyButton': true,
                focusConfirm: false
            }).then((result) => {
                if (result.isConfirmed)
                    $(e.target).closest('form').submit()
                else swal.close()
            })
        })


        // Update or input
        $('#modalFormMenu').on('show.bs.modal', function(e) {
            const btn = $(e.relatedTarget)
            const modal = $(this)
            const mode = btn.data('mode')
            const id = btn.data('id')
            const nama = btn.data('nama_menu')
            const harga = btn.data('harga')
            const gambar = btn.data('gambar')
            const keterangan = btn.data('keterangan')
            const jenis_id = btn.data('jenis_id')

            // Membedakan Input Atau Edit
            if (mode === 'edit') {
                modal.find('.modal-title').text('Edit Data')
                modal.find('#nama_menu').val(nama)
                modal.find('#harga').val(harga)
                modal.find('#gambar').val(gambar)
                modal.find('#keterangan').val(keterangan)
                modal.find('#jenis_id').val(jenis_id)
                modal.find('#method').html('@method("PUT")')
                modal.find('form').attr('action', `{{ url('menu') }}/${id}`)
            } else {
                modal.find('.modal-title').text('Tambah Data')
                modal.find('#nama_menu').val('')
                modal.find('#harga').val('')
                modal.find('#gambar').val('')
                modal.find('#keterangan').val('')
                modal.find('#jenis_id').val('')
                modal.find('#method').html('')
                modal.find('form').attr('action', '{{ url("menu") }}')
            }
        })

        $('#modalFormMenu').on('shown.bs.modal', function() {
            $('#nama_menu').delay(1000).focus().select();
        })
    })

    document.getElementById('paymentForm').addEventListener('submit', function(e) {
        e.preventDefault();
        var keterangan = document.getElementById('keterangan').value;
        fetch('/process_payment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    keterangan: keterangan
                })
            })
            .then(response => response.json())
            .then(data => {
                console.log(data);
                // Handle response from server
            })
            .catch(error => console.error('Error:', error));
    });
</script>
@endpush