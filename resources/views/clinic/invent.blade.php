@extends('admin.dashboard')

@section('content')
<h1>Inventory</h1>

<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Amount</th>
            <th>Condition</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($inventories as $inventory)
        <tr>
            <td>{{ $inventory->name }}</td>
            <td>{{ $inventory->amount }}</td>
            <td>{{ $inventory->condition }}</td>
            <td><img src="{{ asset('storage/' . $inventory->image) }}" alt="Inventory Image" width="50" height="50"></td>
            <td>
                <a href="{{ route('inventory.edit', $inventory->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('inventory.destroy', $inventory->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('inventory.create') }}" class="btn btn-success">Create New Inventory</a>

@endsection