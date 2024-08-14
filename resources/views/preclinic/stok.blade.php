@extends('admin.dashboard')

@section('content')

<div class="container mx-auto px-6 pb-4">
    <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
        <thead class="bg-primary text-white uppercase text-sm leading-normal">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">No</th>
                <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Name</th>
                <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Amount</th>
                <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Keterangan</th>
                <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($stok as $stoks)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium text-gray-900">{{ $stoks->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{ $stoks->amount }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-center text-sm text-gray-500">{{ $stoks->description }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-center">
                    <a href="{{ route('prestok.edit', $stoks->id) }}" class="inline-flex items-center px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded hover:bg-yellow-200">
                        Edit
                    </a>
                    <form action="{{ route('prestok.destroy', $stoks->id) }}" method="post" class="inline">
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

    <a href="{{ route('prestok.create') }}" class="btn bg-primary hover:bg-primary-dark transition duration-300 ease-in-out text-white px-6 py-3 rounded mt-6 inline-block">
        Create New Inventory
    </a>
</div>
@endsection