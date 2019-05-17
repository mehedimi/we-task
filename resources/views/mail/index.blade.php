@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>Email</th>
                    <th>Body</th>
                </tr>
            </thead>
            <tbody>
                @foreach($emails as $email)
                    <tr>
                        <td>{{ ($loop->index + 1) }}</td>
                        <td>{{ $email->email }}</td>
                        <td>{{ $email->body }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('mails.send') }}" method="post">
            @csrf
            <button class="btn btn-success">Send Emails</button>
        </form>
    </div>
@endsection
