@extends('layouts.base')
@section('content')
    <x-header main="Pengurusan Pengguna" sub="Petugas" sub2="" />


    <h4 class="text-center">JUMLAH PETUGAS</h4>
    <h1 class="text-center text-danger fw-bold">{{ $jum_petugas }}</h1>


    <div class="row justify-content-center">
        <div class="col-7">
            <form id="form1">
                <div class="row align-items-center">
                    <div class="col-3 align-self-end">
                        <p class="fw-bold mb-0">No. <br>Kakitangan</p>
                    </div>
                    <div class="col-6 mt-1">
                        <input type="text" name="search" class="form-control" id="no_kakitangan">
                    </div>
                    <div class="col-3 px-0 mt-1">
                        <a class="btn btn-sm btn-danger mx-0" onclick="filter()">Cari
                            <span data-feather="search"></span>
                        </a>
                        <a class="btn btn-sm btn-link mx-0" id="reset">
                            <span class="refreshbtn" style="color:grey" data-feather="refresh-ccw"></span>
                        </a>
                    </div>
                </div>
            </form>
        </div>



        <div class="col-10 mt-5">
            <div class="text-end mb-3">
                <a href="{{ route('pp.daftar') }}" class="btn btn-danger">Daftar
                    <span class="text-white" data-feather="plus-circle"></span>
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <div id="tableExample2"
                        data-list='{"valueNames":["bil","kakitangan","pekerja"],"page":5,"pagination":true}'>
                        <div class="table-responsive datatable scrollbar table-striped">
                            <table class="table fs--1 mb-0 text-center">
                                <thead class=" text-900">
                                    <tr style="border-bottom-color: #F89521">
                                        <th class="sort" data-sort="bil">Bil</th>
                                        <th class="sort" data-sort="kakitangan">No. Kakitangan</th>
                                        <th class="sort" data-sort="pekerja">Nama Pekerja</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody class="list" id="t_normal">
                                    @foreach ($petugas as $p)
                                        <tr style="border-bottom:#fff">
                                            <td class="bil">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="kakitangan">
                                                {{$p->no_kakitangan}}
                                            </td>
                                            <td class="pekerja">
                                                {{$p->name}}
                                            </td>
                                            <td>
                                                <div class="row justify-content-center">
                                                    <div class="col-auto px-0">
                                                        <form action="/pengurusan_pengguna/hapus/{{$p->id}}" method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button class=" btn btn-sm btn-danger" type="submit">
                                                                <span data-feather="trash-2" style="width:15px;"></span>
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="col-auto px-0">
                                                        <a href="/pengurusan_pengguna/edit/{{$p->id}}" class="ms-2 btn btn-sm btn-danger">
                                                            <span data-feather="edit" style="width:15px;"></span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex justify-content-center mt-3">
                            <button class="btn btn-sm btn-falcon-default me-1" type="button" title="Previous"
                                data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                            <ul class="pagination mb-0"></ul>
                            <button class="btn btn-sm btn-falcon-default ms-1" type="button" title="Next"
                                data-list-pagination="next"><span class="fas fa-chevron-right"> </span></button>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    
    <script>
        $("#reset").click(function() {
            $('#form1').trigger("reset");
        });

        function filter() {
            var no_kakitangan = $('#no_kakitangan').val();

            // console.log('A = '+id_negeri+', B = '+id_daerah+', C = '+id_mukim);

            $.ajax({
                type: 'get',
                url: '/pengurusan_pengguna/filter',
                data: {
                    'no_kakitangan': no_kakitangan,
                },
                success: function(result) {
                    console.log(result);
                    $("#t_normal").html("");
                    let iteration = 1;
                    result.forEach(e => {
                        $("#t_normal").append(`
                        <tr>
                            <td class="bil">` + iteration + `.</td>
                            <td class="kakitangan">${ e.no_kakitangan }</td>
                            <td class="pekerja">${ e.name }</td>
                            
                            <td>
                                <div class="row justify-content-center">
                                    <div class="col-auto px-0">
                                        <form action="/pengurusan_pengguna/hapus/${ e.id }" method="post">
                                            @method('DELETE')
                                            @csrf
                                            <button class=" btn btn-sm btn-danger" type="submit">
                                                <span class="far fa-trash-alt" style="width:15px;"></span>
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-auto px-0">
                                        <a href="/pengurusan_pengguna/edit/${ e.id }" class="ms-2 btn btn-sm btn-danger">
                                            <span class="far fa-edit" style="width:15px;"></span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        `);

                        iteration++;
                    });
                    // console.log(result);
                },
                error: function() {
                    console.log('error');
                },
            });
        }
    </script>
@endsection
