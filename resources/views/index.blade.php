@extends('layout')

@section('content')
    <div class="container text-center">
        <div class="row justify-content-md-center">
            <div class="col pt-5">
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
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
