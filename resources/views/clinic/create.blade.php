
@extends('admin.dashboard')

@section('content')

<h1>Create New Inventory</h1>

<form action="{{ route('inventory.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="amount">Amount:</label>
        <input type="number" class="form-control" id="amount" name="amount" required>
    </div>
    <div class="form-group">
        <label for="condition">Condition:</label>
        <select class="form-control" id="condition" name="condition" required>
            <option value="good">Good</option>
            <option value="broken">Broken</option>
        </select>
    </div>
    <div class="form-group">
        <label for="image">Image:</label>
        <input type="file" class="form-control" id="image" name="image" required>
    </div>
    <button type="submit" class="btn btn-primary">Create</button>
</form>

@endsection