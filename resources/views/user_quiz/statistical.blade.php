@extends('layouts.navbar')

@section('content_home')
<div class="card">
    <div class="card-header">
        <h4>My Results</h4>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <th>Quiz</th>
                <th>Date</th>
                <th>Result</th>
                <th></th>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><button class="btn-sm btn-info"><i class="fas fa-info-circle"></i> Detail</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
