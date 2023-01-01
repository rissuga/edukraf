@extends('frontend.body.index2')
@section('content')
    <section id="kelas">
        <div class="row mt-5">
            <div class="col-md-12 pt-5 ">
                <h1 class="text-center">Edukraf Webinar</h1>
                <h5 class="text-center mt-3">Gali pengetahuan yang selama ini belum kamu pahami dengan menyimak
                    <br> video penjelasan yang telah kami bagikan.
                </h5>

            </div>
        </div>
    </section>

    @php
        function substrwords($text, $maxchar, $end = '...')
        {
            if (strlen($text) > $maxchar || $text == '') {
                $words = preg_split('/\s/', $text);
                $output = '';
                $i = 0;
                while (1) {
                    $length = strlen($output) + strlen($words[$i]);
                    if ($length > $maxchar) {
                        break;
                    } else {
                        $output .= ' ' . $words[$i];
                        ++$i;
                    }
                }
                $output .= $end;
            } else {
                $output = $text;
            }
            return $output;
        }
        
        function tgl_indo($tanggal)
        {
            $bulan = [
                1 => 'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember',
            ];
            $pecahkan = explode('-', $tanggal);
        
            // variabel pecahkan 0 = tahun
            // variabel pecahkan 1 = bulan
            // variabel pecahkan 2 = tanggal
        
            return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
        }
    @endphp


    <main id="main">

        <!-- ======= Courses Section ======= -->
        <section id="courses" class="courses pt-5">
            <div class="container" data-aos="fade-up">
                <div class="row justify-content-center mb-5 mt-3" style="margin-top: 15px;">
                    <div class="col-md-2 d-grid">
                        <a class="btn py-2 {{ empty(Request::segment(2)) ? 'btn-secondary' : 'btn-outline-secondary' }}"
                            href="{{ route('webinar') }}">Semua</a>
                    </div>
                    <div class="col-md-2 d-grid">
                        <a class="btn py-2 {{ Request::segment(2) == 'soon' ? 'btn-secondary' : 'btn-outline-secondary' }}"
                            href="{{ route('webinar_soon') }}" role="button">Akan Datang</a>
                    </div>
                    <div class="col-md-2 d-grid">
                        <a class="btn py-2 {{ Request::segment(2) == 'done' ? 'btn-secondary' : 'btn-outline-secondary' }}"
                            href="{{ route('webinar_done') }}" role="button">Selesai</a>
                    </div>
                </div>

                <div class="row " data-aos="zoom-in" data-aos-delay="100">

                    @if ($webinar->isEmpty())
                        <div class="my-5">
                            <img src="{{ asset('frontend/assets/img/empty.jpg') }}" alt=""
                                style="display:block; margin:auto; width:30%; box-shadow: 0px 2px 19px rgba(234, 231, 231, 0.11);">
                            <p class="font-size-16 text-grey">Maaf webinar masih belum
                                tersedia,
                                silahkan kembali dilain waktu ya
                            </p>
                        </div>
                    @endif

                    @foreach ($webinar as $key => $web)
                        <div class="col-md-4 align-items-stretch mt-4">
                            <div class="card card-button h-100"
                                onclick="window.location='{{ route('webinardetail', $web->id) }}'">
                                <div class="card-body-webinar">
                                    <img src="/storage/{{ $web->cover }}" class="card-img-top" alt="{{ $web->title }}"
                                        style="height: 300px; object-fit: cover;">

                                    <div class="mt-3">
                                        @if (strtotime($web->date) >= strtotime(gmdate('Y-m-d', time() + 60 * 60 * 7)))
                                            <span class="badge bg-warning text-dark mb-2">Akan Datang</span>
                                        @else
                                            <span class="badge bg-success text-light mb-2">Selesai</span>
                                        @endif

                                        <h5><b>{{ $web->title }}</b></h5>
                                        <small class="mb-2">
                                            <i class="bx bx-calendar"></i>{{ tgl_indo($web->date) }}
                                        </small> <br>
                                        <br>
                                        <p class=" text-grey">{{ substrwords($web->desc, 100) }}</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="row mt-5">{{ $webinar->links('vendor.pagination.bootstrap-5') }}</div>

            </div>

        </section>
        <!-- End Courses Section -->

    </main>
@endsection
