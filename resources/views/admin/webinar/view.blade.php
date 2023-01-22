@extends('admin.body.index')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <h1 class="h3 text-gray-800"><b>Data Webinar</b></h1>
                <a href="{{ route('admin.webinar.add') }}" style="float: right;"
                    class="btn btn-rounded btn-success mb-4">Tambah
                    Data</a>
            </div>

                    @php
                        function img_url($url) {
                            $url = str_replace("public/test", "", $url);
                            
                            return $url;
                        }
                    @endphp
                    
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-condensed table-hover  ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Pemateri</th>
                                <th>Cover</th>
                                <th width="170px">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($webinar as $key => $allwebinar)
                                <tr>
                                    <td scope="key"> {{ $key + $webinar->firstItem() }}</td>
                                    <td>{{ $allwebinar->title }}</td>
                                    <td>{{ $allwebinar->date }}</td>
                                    <td>
                                        @if (strtotime($allwebinar->date) >= strtotime(gmdate('Y-m-d', time() + 60 * 60 * 7)))
                                            <span class="badge bg-warning text-dark mb-2">Akan Datang</span>
                                        @else
                                            <span class="badge bg-success text-light mb-2">Selesai</span>
                                        @endif
                                    </td>

                                    <td>{{ $allwebinar->speaker }}</td>
                                    <td><img src="{{ img_url(asset("test/storage/app/public/" . $allwebinar->cover)) }}" width="100px" alt=""></td>
                                    <td>
                                        <div class="row">
                                            <a href="{{ route('admin.webinar.detail', $allwebinar->id) }}"
                                                class="btn btn-info btn-sm"style="margin-left: 4px;">Detail</a>
                                            <a href="{{ route('admin.webinar.edit', $allwebinar->id) }}"
                                                class="btn btn-primary btn-sm"style="margin-left: 4px; ">Edit</a>
                                            <a href="{{ route('admin.webinar.delete', $allwebinar->id) }}"
                                                class="btn btn-danger btn-sm"style="margin-left: 4px;"
                                                id="delete">Hapus</a>
                                            <a href="">
                                                <i class="bi bi-eye-fill"></i>
                                            </a>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row mt-5" style="margin-left: 10px;">
                        {{ $webinar->links('vendor.pagination.bootstrap-5') }}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
