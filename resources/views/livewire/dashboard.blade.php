<div>
    @if(session()->has(''))
        <h5 class="alert alert-success">{{ session('store') }}</h5>
    @endif
    @include('livewire.createModel')
    <div class="row row-sm">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-header pb-0">
                <div class="d-flex justify-content-between">
                    <div class="col-lg-12 margin-tb">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#patientModal">
                            create
                        </button>

                <div class="card-body">
                    <table class="table mg-b-0 text-md-nowrap table-hover ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($patients as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td><img src="{{ asset('assets/images/' . $row->image) }}"</td>
                                    <td><button type="button" wire:click="deletePatient({{ $row->id }})" class="btn btn-danger">Delete</button></td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan='6' class="table-cell" align="center">
                                        <div class="alert alert-danger w-100%">No Data</div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/div-->
    </div>
</div>
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="crossorigin="anonymous"></script>
    <script>
        window.addEventListenre('close-model',event => {
            $('patientModal').model('hide')
        })
    </script>
@endsection
