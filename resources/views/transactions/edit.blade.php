@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('transaction edit FALK') }}</h2>
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
                    <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control" value="{{ $transaction->title }}" required>
                        </div>
                
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control">{{ $transaction->description }}</textarea>
                        </div>
                
                        <div class="mb-3">
                            <label for="type" class="form-label">Type</label>
                            <select name="type" id="type" class="form-select" required>
                                <option value="Credit" {{ $transaction->type == 'Credit' ? 'selected' : '' }}>Credit</option>
                                <option value="Debit" {{ $transaction->type == 'Debit' ? 'selected' : '' }}>Debit</option>
                            </select>
                        </div>
                
                        
                
                        <button type="submit" class="btn btn-warning">Update Transaction</button>
                    </form>
                </p>
            </div>
        </div>
    </div>
@endsection
