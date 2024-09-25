@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Credit Transactions good finally') }}</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="card-content">
                <p>
                     
                    @if ($transactions->count())
                    <ul>
                        @foreach ($transactions as $transaction)
        <li style="margin-bottom: 20px; padding: 10px; border: 1px solid #ccc;">
            <p><strong>ID:</strong> {{ $transaction->id }}</p>
            <p><strong>Title:</strong> {{ $transaction->title }}</p>
            <p><strong>Description:</strong> {{ $transaction->description }}</p>
            <p><strong>Type:</strong> {{ $transaction->type }}</p>
            <p><strong>User ID:</strong> {{ $transaction->user_id }}</p>
        </li>
    @endforeach
                    </ul>
                @else
                    <p>No transactions found.</p>
                @endif






                </p>
            </div>
        </div>
    </div>
@endsection
