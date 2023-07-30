@extends('layout')

@section('content')

<div class="container text-center">
    <div class="row justify-content-md-center">
        <div class="col pt-5">
            <table>
                <th>Contact</th>
                <tr>
                    <th>Name</th>
                    <td>{{ $contact->name }}</td>
                </tr>
                <tr>
                    <th>Contact</th>
                    <td>{{ StringHelper::format_phone_number($contact->contact) }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $contact->email }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

@endsection