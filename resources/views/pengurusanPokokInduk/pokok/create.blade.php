@extends('layouts.base')
@section('content')
    <x-header main="Pengurusan Pokok Induk" sub="Pokok" sub2="Daftar Pokok" />

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-10 px-0">
                <h3 class="fw-bold text-uppercase text-main">Maklumat Pokok</h3>
                <h5 class="text-main">Sila isikan maklumat pekerja berikut dengan betul.</h5>

                <div class="row align-items-center mt-5">

                    <div class="col-xl-6 mb-3">
                        <div class="row align-items-center">
                            <div class="col-xl-3">
                                <label class="col-form-label text-main">Blok</label>
                            </div>
                            <div class="col-xl-8">
                                <input type="text" name="blok" class="form-control border-danger"
                                    placeholder="SILA TAIP DISINI">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 mb-3">
                        <div class="row align-items-center">
                            <div class="col-1"></div>
                            <div class="col-xl-3">
                                <label class="col-form-label text-main">No. Pokok</label>
                            </div>
                            <div class="col-xl-8">
                                <input type="text" name="no_pokok" class="form-control border-danger"
                                    placeholder="SILA TAIP DISINI">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 mb-3">
                        <div class="row align-items-center">
                            <div class="col-xl-3">
                                <label class="col-form-label text-main">Baka</label>
                            </div>
                            <div class="col-xl-8">
                                <input type="text" name="baka" class="form-control border-danger"
                                    placeholder="SILA TAIP DISINI">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 mb-3">
                        <div class="row align-items-center">
                            <div class="col-1"></div>
                            <div class="col-xl-3">
                                <label class="col-form-label text-main">Induk</label>
                            </div>
                            <div class="col-xl-8">
                                <select name="induk" class="form-select border-danger" id="email">
                                    <option selected disabled hidden> SILA PILIH </option>
                                    <option value="Motherpalm">Motherpalm</option>
                                    <option value="Fatherpalm">Fatherpalm</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 mb-3">
                        <div class="row align-items-center">
                            <div class="col-xl-3">
                                <label class="col-form-label text-main">Progeny</label>
                            </div>
                            <div class="col-xl-8">
                                <input type="text" name="progeny" class="form-control border-danger"
                                    placeholder="SILA TAIP DISINI">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6 mb-3">
                        <div class="row align-items-center">
                            <div class="col-1"></div>
                            <div class="col-xl-3">
                                <label class="col-form-label text-main">Trial</label>
                            </div>
                            <div class="col-xl-8">
                                <input type="text" name="trial" class="form-control border-danger"
                                    placeholder="SILA TAIP DISINI">
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="text-center">
                <button id="custom-btn-white" class="btn btn-white me-3 border-danger text-danger">Set Semula
                    <span data-feather="refresh-ccw" style="width: 15px;"></span>
                </button>
                <button class="btn btn-danger">Daftar
                    <span data-feather="plus-circle"></span>
                </button>
            </div>
        </div>
    </div>

    <script>
        $("#custom-btn-white").mouseenter(function() {
            $(this).removeClass('btn-white');
            $(this).removeClass('text-danger');
            $(this).addClass('btn-danger');
            $(this).addClass('text-white');

        });
        $("#custom-btn-white").mouseleave(function() {
            $(this).addClass('btn-white');
            $(this).addClass('text-danger');
            $(this).removeClass('btn-danger');
            $(this).removeClass('text-white');
        });
    </script>
@endsection
