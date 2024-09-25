@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Debit Transactions finally') }}</h2>
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
                            {{-- <li>
                                <a href="{{ route('transactions.show', $transaction->id) }}">
                                    {{ $transaction->title }} - {{ $transaction->type }}
                                </a>
                            </li> --}}

                            <li>
                                {{-- <p>{{ $transaction->id }}</p> --}}
                                <p>{{ $transaction->title }}</p>
                                <p>{{ $transaction->description }}</p>
                                <p>{{ $transaction->type }}</p>
                                {{-- <p>{{ $transaction->user_id }}</p> --}}

                               

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
