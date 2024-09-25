@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('transaction index FALK') }}</h2>
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
                    <a href="{{ route('transactions.create') }}" class="btn btn-primary">Create New Transaction</a>
                    {{-- {{ __('Sample transaction index page FALK') }} --}}
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

                                <a href="{{ route('transactions.show', $transaction->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('transactions.edit', $transaction->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>

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
