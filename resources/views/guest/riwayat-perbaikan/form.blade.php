@extends('guest.layout.app')

@push('css')
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .footer {
            flex-shrink: 0;
            background-color: #343a40;
            color: #fff;
        }

        .card {
            margin: 20px;
        }

        .item-label {
            display: inline-block;
            width: 150px;
            font-weight: bold;
        }
    </style>
@endpush

@section('kontenUser')
    <div class="content my-5">
        <!-- card -->
        <div class="card" style="width: 25em;">
            <div class="card-header">
                <h3>Scan disini</h3>
            </div>
            <div class="card-body">
                <div id="reader" style="width: 100%;"></div>
            </div>
        </div>
        <!-- card end -->
    </div>
@endsection

@push('js')
@endpush
