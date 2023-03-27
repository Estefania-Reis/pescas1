@extends('layout.admin')
@push('css')
      <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@section('content')

<div class="wrapper">
    <!-- Content Header (Page header) -->

    <div class="container m-2 ">
        
        {{-- {{ Session::get('halaman_url') }} --}}
        <div class="row g-3 align-items-center mt-2">
            <div class="col-auto ml-3">
                
                <a href="/klientes/individual/aumentadataindividual" class="btn btn-info">Adisiona +</a>
                
            </div> 
            <div class="col-auto">
                <a href="/export-benefisiariu-individual" class="btn btn-danger">Export PDF</a>
            </div>
            <div class="col">
                <a href="/exportexcel" class="btn btn-success">Export Excel</a>
            </div>
            <div class="col-auto mr-4">
                <form action="/klientes/individual/index" method="GET">
                    <input type="search" id="inputPassword6" name="search" class="form-control"
                        aria-describedby="passwordHelpInline" placeholder="search">
                </form>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="/importexcel" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="file" name="file" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>




        </div>
        <div class="row m-2">
            {{-- @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
            @endif --}}
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Id Kliente</th>
                        <th scope="col">Naran</th>
                        <th scope="col">Jeneru</th>
                        <th scope="col">Data Moris</th>
                        <th scope="col">Naturalidade</th>
                        <th scope="col">Aldeia</th>
                        <th scope="col">Suco</th>
                        <th scope="col">Posto</th>
                        <th scope="col">Municipio</th>
                        <th scope="col">No telfone</th>
                        <th scope="col">Foto</th>
                        
                        <th scope="col">Asaun</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($data as $index => $row)
                    <tr>
                        <th scope="row">{{ $index + $data->firstItem() }}</th>
                        <td>{{ $row->id_kliente }}</td>
                        <td>{{ $row->naran }}</td>
                        <td>{{ $row->genero }}</td>
                        <td>{{ $row->data_moris }}</td>
                        <td>{{ $row->naturalidade }}</td>
                        <td>{{ $row->aldeia['naran']}}</td>
                        <td>{{ $row->suco['naran']}}</td>
                        <td>{{ $row->posto['naran']}}</td>
                        <td>{{ $row->municipio['naran']}}</td>
                        <td>{{ $row->nmr_telfone }}</td>
                        <td>
                            <img src="{{ asset('storage/fotokliente/'.$row->foto) }}" alt="" style="width: 40px;" class="brand-image img-circle elevation-3">
                        </td>
                        
                        <td>
                            <a href="/klientes/individual/edit/{{ $row->id }}" class="btn1 btn-info fa fa-edit" style="font-size:14px"></a>
                            <a href="#" class="btn1 btn-danger delete" data-id="{{ $row->id }}"
                                data-naran="{{ $row->naran }}"><i class="material-icons d-inline" style="font-size:18px">delete</i></a>
                        </td>
                        
                    </tr>
                    @endforeach


                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>

</div>

 
@endsection

@push('scripts')
    
 <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>
<script>
    $('.delete').click(function () {
        var individualid = $(this).attr('data-id');
        var naran = $(this).attr('data-naran');

        swal({
            title: "Iha Serteza ?",
            text: "Ita sei hamos dadus Kliente ho naran " + naran + " ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/deleteind/" + individualid + " ",
                    swal("Dadus konsege hamos ona", {
                        icon: "success",
                    });
                } else {
                    swal("Kansela hamos dadus");
                }
            });
    });
</script>

<script>
    @if (Session:: has('success'))
    toastr.success("{{ Session::get('success') }}")
    @endif

</script>
@endpush