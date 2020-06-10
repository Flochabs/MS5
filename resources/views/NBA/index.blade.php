@extends('layouts.master')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="container">
        <div class="uper">
{{--            @if(session()->get('success'))--}}
{{--                <div class="alert alert-success">--}}
{{--                    {{ session()->get('success') }}--}}
{{--                </div><br/>--}}
{{--            @endif--}}

            <h1>Liste des joueurs NBA en activité</h1>
            <div class="row">
                <div class="col-12">
                    <table class="table text-white">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

{{--            {{ $employees->links() }}--}}
        </div>
    </div>
@endsection

