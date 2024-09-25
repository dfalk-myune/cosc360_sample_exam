@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('transaction show FALK') }}</h2>
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
                    <div>
                        <strong>ID:</strong> {{ $transaction->id }}<br>
                        <strong>Title:</strong> {{ $transaction->title }}<br>
                        <strong>Description:</strong> {{ $transaction->description }}<br>
                        <strong>Type:</strong> {{ $transaction->type }}<br>
                        <strong>User ID:</strong> {{ $transaction->user_id }}<br>
                    </div>
                
                    <a href="{{ route('transactions.index') }}" class="btn btn-primary mt-3">Back to Transactions</a>
                </p>
            </div>
        </div>
    </div>
@endsection
