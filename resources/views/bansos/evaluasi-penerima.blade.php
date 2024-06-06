@extends('layout.app')

@section('content_body')
<div class="container">
    <div class="card">
        <div class="card-header lin-gradient-light-primary text-dark">Evaluasi Penerima Bansos</div>
        <div class="card-body">
            <!-- <label for="nama" class="form-label">Tambah kriteria : </label> -->
            <!-- <div class="row"> -->
            <!--     <div class="col w-25"> -->
            <!--         <input type="text" class="form-control mb-3" id="nama_kriteria_baru" name="nama_kriteria_baru" placeholder="Nama" required> -->
            <!--     </div> -->
            <!--     <div class="col w-25"> -->
                    <!-- <input type="text" class="form-control mb-3" id="jenis_kriteria_baru" name="jenis_kriteria_baru" placeholder="benefit / cost" required> -->
                <!--     <select class="form-control" id="jenis_kriteria_baru" name="jenis_kriteria_baru" required> -->
                <!--         <option value="benefit">Benefit</option> -->
                <!--         <option value="cost">Cost</option> -->
                <!--     </select> -->
                <!-- </div> -->
                <!-- <div class="col"> -->
                <!--     <input type="text" class="form-control mb-3" id="table_untuk_kriteria_baru" name="table_untuk_kriteria_baru" placeholder="Table Name" required> -->
                <!-- </div> -->
            <!--     <div class="col"> -->
            <!--         <button class="btn btn-primary text-light" id="tambah_kriteria" onclick="addKriteria">Tambah</button> -->
            <!--     </div> -->
            <!-- </div> -->
            <div class="mt-2">
                <h5 class="text-dark d-inline">Kriteria : </h5>
                <button class="btn btn-sm btn-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#kriteriaCollapse" aria-expanded="false" aria-controls="kriteriaCollapse">
                    Show/Hide
                </button>
                <div class="collapse mt-3" id="kriteriaCollapse">
                    <div class="card card-body">
                        <div id="kriterias" class="mb-3"> </div>
                    </div>
                </div>
            </div>
            <div class="mt-3">
                <h5 class="text-dark d-inline">Perbandingan : </h5>
                <button class="btn btn-sm btn-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#perbandingenCollapse" aria-expanded="false" aria-controls="perbandingenCollapse">
                    Show/Hide
                </button>
                <div class="collapse mt-3" id="perbandingenCollapse">
                    <div class="card card-body">
                        <div class="d-inline">
                            <button class="btn btn-primary text-light mb-2" id="set-perbandingan">Set Perbandingan</button>
                            <button class="btn btn-success text-light mb-2" id="evaluasi-kriteria">Evaluasi Kriteria</button>
                        </div>
                        <form id="form-perbandingan">
                            <div id="perbandingan-kriteria"> </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- <div class="mt-5"> -->
            <!--     <h5 class="text-dark d-inline">Mapped Value : </h5> -->
            <!--     <button class="btn btn-sm btn-primary text-light" type="button" data-bs-toggle="collapse" data-bs-target="#mappedValueCollapse" aria-expanded="false" aria-controls="mappedValueCollapse"> -->
            <!--         Show/Hide -->
            <!--     </button> -->
            <!--     <div class="collapse mt-3" id="mappedValueCollapse"> -->
            <!--         <div class="card card-body"> -->
            <!--             <table id="mapped-value"> -->
            <!--                 <thead id="mapped-value-head"> </thead> -->
            <!--                 <tbody id="mapped-value-body"> </tbody> -->
            <!--             </table> -->
            <!--         </div> -->
            <!--     </div> -->
            <!-- </div> -->
            <div class="mt-3">
                <div class="card">
                    <div class="card-header lin-gradient-light-primary text-dark">
                        Tabel Hasil Evaluasi
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary text-light mb-3" id="btn-hasil-evaluasi">Evaluasi</button>
                        <table id="hasil-evaluasi">
                            <thead id="hasil-evaluasi-head">
                                <tr>
                                    <th class="cell identifier">Ranking</th>
                                    <th class="cell identifier">Nik</th>
                                    <th class="cell identifier">Nama</th>
                                    <th class="cell identifier">Nilai Evaluasi</th>
                               </tr>
                            </thead>
                            <tbody id="hasil-evaluasi-body">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            refreshKriteria();
            refreshPerbandingan();
            refreshHasilEvaluasi();
            // refreshMappedValue();
        });

        function refreshKriteria() {
            $('#kriterias').empty();
            $.ajax({
                url: '/api/bansos/kriteria',
                method: 'GET',
                success: function(data) {
                    data = JSON.parse(data);
                    for (var kriteria of data) {
                        // console.log(kriteria);
                        $('#kriterias').append(`
                            <div class="kriteria-badge bg-primary rounded text-light" id="kriteria-${kriteria.id}">
                                ${kriteria.nama}
                                <span class="badge bg-light text-dark">${kriteria.weight}</span>
                                <i class="bi bi-x delete-kriteria-btn"></i>
                            </div>
                        `);
                    }
                    enableDeleteKriteriaBtn();
                }
            });
        }

        $('#tambah_kriteria').click(function() {
            addKriteria();
        });

        $('#evaluasi-kriteria').click(function() {
            $.ajax({
                url: '/api/bansos/kriteria/evaluasi',
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    refreshKriteria();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });

        $('#btn-hasil-evaluasi').click(function() {
            refreshHasilEvaluasi();
        });

        $('#set-perbandingan').click(function() {
            document.querySelector('#form-perbandingan').reportValidity();
            var perbandingan = [];
            $('.perbandingan').each(function() {
                var right_id = $(this).find('.kriteria').eq(1).attr('id').split('-')[2];
                var left_id = $(this).find('.kriteria').eq(0).attr('id').split('-')[2];
                var right_val = $(this).find('.value-perbandingan').eq(1).val();
                var left_val = $(this).find('.value-perbandingan').eq(0).val();
                perbandingan.push({
                    right_id: right_id,
                    left_id: left_id,
                    right_val: right_val,
                    left_val: left_val
                });
                $.ajax({
                    url: '/api/bansos/perbandingan/',
                    method: 'POST',
                    data: {
                        right_id: right_id,
                        left_id: left_id,
                        left_val: left_val,
                        right_val: right_val
                    },
                    success: function(data) {
                        console.log(data);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });
            refreshPerbandingan2();
        });

        function enableDeleteKriteriaBtn() {
            $('.delete-kriteria-btn').click(function() {
            // console.log('delete');
            var id = $(this).parent().attr('id').split('-')[1];
            deleteKriteria(id);
            });
        }

        function addKriteria() {
            var nama = $('#nama_kriteria_baru').val();
            var jenis = $('#jenis_kriteria_baru').val();
            $.ajax({
                url: '/api/bansos/kriteria',
                method: 'POST',
                data: {
                    nama: nama,
                    jenis: jenis
                },
                success: function(data) {
                    console.log(data);
                    refreshKriteria();
                    refreshPerbandingan();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function deleteKriteria(id) {
            $.ajax({
                url: '/api/bansos/kriteria/' + id,
                method: 'DELETE',
                success: function(data) {
                    console.log(data);
                    refreshKriteria();
                    refreshPerbandingan();
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function refreshPerbandingan() {
            $('#perbandingan-kriteria').empty();
            $.ajax({
                url: '/api/bansos/perbandingan',
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    // data = JSON.parse(data);
                    for (var perbandingan of data) {
                        // console.log(perbandingan);
                        $('#perbandingan-kriteria').append(`
                            <div class="perbandingan bg-secondary rounded  text-light">
                                <span id="perbandingan-kriteria-${perbandingan.left_id}" class="kriteria">
                                    ${perbandingan.left_nama}
                                </span>
                                <select id="value-perbandingan-left-${perbandingan.left_id}" class="form-control value-perbandingan" style="width: 50px;" pattern="/^(1|2|3|4|5|6|7|8|9)$" value="${perbandingan.left_val}" required >
                                    <option disabled ${ perbandingan.left_val == null ? "selected" : "" } value></option>
                                    <option value="1" ${ perbandingan.left_val == 1 ? "selected" : "" }>1</option>
                                    <option value="2" ${ perbandingan.left_val == 2 ? "selected" : "" }>2</option>
                                    <option value="3" ${ perbandingan.left_val == 3 ? "selected" : "" }>3</option>
                                    <option value="4" ${ perbandingan.left_val == 4 ? "selected" : "" }>4</option>
                                    <option value="5" ${ perbandingan.left_val == 5 ? "selected" : "" }>5</option>
                                    <option value="6" ${ perbandingan.left_val == 6 ? "selected" : "" }>6</option>
                                    <option value="7" ${ perbandingan.left_val == 7 ? "selected" : "" }>7</option>
                                    <option value="8" ${ perbandingan.left_val == 8 ? "selected" : "" }>8</option>
                                    <option value="9" ${ perbandingan.left_val == 9 ? "selected" : "" }>9</option>
                                </select>
                                :
                                <select id="value-perbandingan-right-${perbandingan.right_id}" class="form-control value-perbandingan" style="width: 50px;" pattern="/^(1|2|3|4|5|6|7|8|9)$" value="${perbandingan.right_val}" required >
                                    <option disabled ${ perbandingan.right_val == null ? "selected" : "" } value></option>
                                    <option value="1" ${ perbandingan.right_val == 1 ? "selected" : "" }>1</option>
                                    <option value="2" ${ perbandingan.right_val == 2 ? "selected" : "" }>2</option>
                                    <option value="3" ${ perbandingan.right_val == 3 ? "selected" : "" }>3</option>
                                    <option value="4" ${ perbandingan.right_val == 4 ? "selected" : "" }>4</option>
                                    <option value="5" ${ perbandingan.right_val == 5 ? "selected" : "" }>5</option>
                                    <option value="6" ${ perbandingan.right_val == 6 ? "selected" : "" }>6</option>
                                    <option value="7" ${ perbandingan.right_val == 7 ? "selected" : "" }>7</option>
                                    <option value="8" ${ perbandingan.right_val == 8 ? "selected" : "" }>8</option>
                                    <option value="9" ${ perbandingan.right_val == 9 ? "selected" : "" }>9</option>
                                </select>
                                <span id="perbandingan-kriteria-${perbandingan.right_id}" class="kriteria text-light">
                                    ${perbandingan.right_nama}
                                </span>
                            </div>
                        `);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function refreshPerbandingan2() {
            $.ajax({
                url: '/api/bansos/perbandingan',
                method: 'GET',
                success: function(data) {
                    // console.log(data);
                    // data = JSON.parse(data);
                    for (var perbandingan of data) {
                        // console.log(perbandingan);
                        $('#value-perbandingan-right-' + perbandingan.right_id).val(perbandingan.right_val);
                        $('#value-perbandingan-left-' + perbandingan.left_id).val(perbandingan.left_val);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function refreshMappedValue() {
            $.ajax({
                url: '/api/bansos/mapped-value',
                method: 'GET',
                success: function(data) {
                    console.log(data);
                    $('#mapped-value-head').empty();
                    $('#mapped-value-body').empty();
                    // data = JSON.parse(data)
                    let inner_thead = '<tr>';
                    inner_thead += `<td></td>`;
                    for (var value of data.kriteria) {
                        inner_thead += `<td class="cell identifier top">${value}</td>`;
                    }
                    inner_thead += '</tr>';
                    // console.log(inner_thead)
                    $('#mapped-value-head').append(inner_thead);
                    for (var i = 0; i <= data.data.length; i++) {
                        let inner = '<tr>'
                        inner += `<td class="cell identifier left">${data.data[i]}</td>`
                        // var values = JSON.parse(data.values[i])
                        for (var value of data.values[i]) {
                            inner += `<td class="cell">${value}</td>`
                        }
                        inner += '</tr>'
                        // console.log(inner)
                        $('#mapped-value-body').append(inner);
                    }
                },
                error: function(data) {
                    console.log(data);
                }
            });
        }

        function refreshHasilEvaluasi() {
            $.ajax({
            url: '/api/bansos/evaluasi',
            method: 'GET',
            success: function(data) {
                console.log(data);
                // the data will look like
                // [
                //      {
                //          "ranking": 2,
                //          "nik": "1234567890",
                //          "nama": "Seseorang",
                //          "nilai": 123,
                //      },
                //      {
                //          "ranking": 1,
                //          "nik": "2458637901",
                //          "nama": "Manusia",
                //          "nilai": 223,
                //      },
                // ]
                $('#hasil-evaluasi-body').empty();
                for (var i = 0; i < data.length; i++) {
                    let singeData = data.find((el) => el.ranking == i + 1);
                    $('#hasil-evaluasi-body').append(`
                        <tr>
                            <td class="cell">${singeData.ranking}</td>
                            <td class="cell">${singeData.nik}</td>
                            <td class="cell">${singeData.nama}</td>
                            <td class="cell">${singeData.nilai}</td>
                        </tr>
                    `);
                }
            },
            error: function(data) {
                console.log(data);
            }
            });
        }


    </script>
@endpush

@push('css')
    <style>
        #kritetias {
            display: flex;
            justify-content: flex-start;
            width: 50%;
        }

        .kriteria-badge {
            /* display: inline-block; */
            width: max-content;
            min-width: 50%;
            height: 40px;
            /* height: 33px; */
            padding: 7px;
            margin: 5px 5px 5px 0;
        }

        .kriteria-badge badge {
            float: right;
        }

        .kriteria-badge i {
            width: 25px;
            height: 25px;
            cursor: pointer;
            border: 1px solid;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 20%;
            margin-left: 3px;
            user-select: none;
            float: right;
        }

        #perbandingan-kriteria .value-perbandingan {
            margin: 5px;
        }

        #perbandingan-kriteria .perbandingan {
            display: flex;
            align-items: center;
            width: max-content;
            padding: 10px;
            margin-bottom: 5px;
        }

        table#mapped-value {
            width: 100%;
            border-collapse: collapse;
            overflow-y: scroll;
        }

        .cell {
            border: 1px solid black;
            padding: 5px;
        }
        .cell.identifier {
            background-color: #f0f0f0;
        }
    </style>
@endpush
