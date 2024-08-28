@extends('admin.dashboard')

@section('content')
<div class="container mx-auto px-6 pb-4">
    <table class="min-w-full bg-white shadow-lg rounded-lg overflow-hidden">
        <thead class="bg-primary text-white uppercase text-sm leading-normal">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">No</th>
                <th class="px-6 py-3 text-left text-xs font-bold text-white uppercase tracking-wider">Nama</th>
                <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">File</th>
                <th class="px-6 py-3 text-center text-xs font-bold text-white uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($sop as $sops)
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium text-gray-900">{{ $loop->iteration }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium text-gray-900">{{ $sops->name }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-center flex justify-center items-center">
                    <a href="#" class="open-modal" data-id="{{ $sops->id }}" data-name="{{ $sops->name }}" data-file="{{ asset('storage/' . $sops->pdf_file) }}">
                        <i class="fas fa-file-pdf text-4xl"></i>
                    </a>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-center">
                    <a href="{{ route('sop.edit', $sops->id) }}" class="inline-flex items-center px-2 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded hover:bg-yellow-200">
                        Edit
                    </a>
                    <form action="{{ route('sop.destroy', $sops->id) }}" method="post" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-flex items-center px-2 py-1 text-xs font-medium text-red-800 bg-red-100 rounded hover:bg-red-200">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('sop.create') }}" class="btn bg-primary hover:bg-primary-dark transition duration-300 ease-in-out text-white px-6 py-3 rounded mt-6 inline-block">
        Tambah Data Baru
    </a>
</div>

<!-- Modal Structure -->
<div id="pdfModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg w-11/12 lg:w-1/2">
        <div class="modal-header flex justify-between items-center p-4 border-b border-gray-200">
            <h5 id="pdfModalTitle" class="text-lg font-bold"></h5>
            <button id="closeModal" class="text-gray-500 hover:text-black">&times;</button>
        </div>
        <div class="modal-body p-4">
            <iframe id="pdfIframe" src="" frameborder="0" width="100%" height="500"></iframe>
        </div>
        <div class="modal-footer flex justify-end p-4 border-t border-gray-200">
            <a id="downloadLink" href="#" download class="btn bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded">Download</a>
            <button id="closeFooterModal" class="ml-2 btn bg-secondary hover:bg-secondary-dark text-white px-4 py-2 rounded">Close</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('pdfModal');
        const modalTitle = document.getElementById('pdfModalTitle');
        const modalIframe = document.getElementById('pdfIframe');
        const downloadLink = document.getElementById('downloadLink');
        const closeModalButtons = [document.getElementById('closeModal'), document.getElementById('closeFooterModal')];

        // Open modal on click
        document.querySelectorAll('.open-modal').forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();

                const name = this.getAttribute('data-name');
                const file = this.getAttribute('data-file');

                modalTitle.textContent = name;
                modalIframe.src = file;
                downloadLink.href = file;

                modal.classList.remove('hidden');
            });
        });

        // Close modal when clicking on any of the close buttons
        closeModalButtons.forEach(button => {
            button.addEventListener('click', function () {
                modal.classList.add('hidden');
                modalIframe.src = ''; // Clear iframe to stop loading the document when hidden
            });
        });

        // Close modal when clicking outside the modal
        modal.addEventListener('click', function (event) {
            if (event.target === modal) {
                modal.classList.add('hidden');
                modalIframe.src = ''; // Clear iframe to stop loading the document when hidden
            }
        });
    });
</script>

@endsection
