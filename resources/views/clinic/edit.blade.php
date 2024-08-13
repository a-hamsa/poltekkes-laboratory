@extends('admin.dashboard')

@section('content')

<h1>Edit Inventory</h1>

<form action="{{ route('inventory.update', $inventory->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $inventory->name }}" required>
    </div>
    <div class="form-group">
        <label for="amount">Amount:</label>
        <input type="number" class="form-control" id="amount" name="amount" value="{{ $inventory->amount }}" required>
    </div>
    <div class="form-group">
        <label for="condition">Condition:</label>
        <select class="form-control" id="condition" name="condition" required>
            <option value="good" {{ $inventory->condition == 'good' ? 'selected' : '' }}>Good</option>
            <option value="broken" {{ $inventory->condition == 'broken' ? 'selected' : '' }}>Broken</option>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" class="form-control" id="image" name="image">
        <p>Current Image: <img src="{{ asset('storage/' . $inventory->image) }}" alt="Inventory Image" width="50"
            height="50"></p>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('inventory.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection