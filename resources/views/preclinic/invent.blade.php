@extends('admin.dashboard')

@section('content')

<div class="container mx-auto px-6 pb-4">
    <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
        <thead class="bg-primary text-white uppercase text-sm leading-normal">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Amount</th>
                <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Condition</th>
                <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Image</th>
                <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($inventories as $inventory)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium text-gray-900">{{ $inventory->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{ $inventory->amount }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{ $inventory->condition }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-center flex justify-center items-center">
                    <img src="{{ asset('storage/' . $inventory->image) }}" alt="Inventory Image" class="w-12 h-12 object-cover rounded">
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-center">
                    <a href="{{ route('preinventory.edit', $inventory->id) }}" class="inline-flex items-center px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded hover:bg-yellow-200">
                        Edit
                    </a>
                    <form action="{{ route('preinventory.destroy', $inventory->id) }}" method="post" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded hover:bg-red-200">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('preinventory.create') }}" class="btn bg-primary hover:bg-primary-dark transition duration-300 ease-in-out text-white px-6 py-3 rounded mt-6 inline-block">
        Create New Inventory
    </a>
</div>
@endsection