@extends('layout')

@section('content')
    <div class="container">
        @if (Session::has('status') && Session::get('status') == 'saved')
            <div id="alert" class="pt-5">
                {{ RequestHelper::success_alert() }}
            </div>
        @elseif (Session::has('status') && Session::get('status') == 'error')
            <div id="alert" class="pt-5">
                {{ RequestHelper::danger_alert() }}
            </div>
        @endif

        <div class="row justify-content-md-center">
            <div class="col pt-5">
                <a class="btn btn-primary" style="float: right" href="{{ url('contact/create') }}">
                    Add New Contact
                </a>
                <table class="table table-hover">
                    <th>#</th>
                    <th>Name</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Options</th>
                    @if ($contacts->isNotEmpty())
                        @foreach ($contacts as $i => $contact)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ StringHelper::format_phone_number($contact->contact) }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>
                                    <a href="{{ url("contact/$contact->id") }}">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </a>
                                    &nbsp;
                                    <a href="{{ url("contact/$contact->id/edit") }}">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>
                                    &nbsp;
                                    <form id="deleteRowForm" name="deleteRowForm" action="{{ url("contact/$contact->id") }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#" onclick="deleteRowContact()">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function deleteRowContact() {
            Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                document.forms["deleteRowForm"].submit();
                }
            })
        }
    </script>
@endpush
