<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'KoHo', sans-serif;
        }
    </style>
</head>

<body>
    {{-- Navbar --}}
    <div class="flex m-4 w-24 lg:w-32">
        <a id="goBackLink" href="#">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="max-w-full h-auto">
        </a>
    </div>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Jadwal Penggunaan Lab</h1>

        @foreach ($schedulesBySemester as $schedule)

            <div class="mb-6">
                {{-- <h2 class="text-xl font-semibold mb-4">{{ $semester ? $semester->semester : 'Unknown Semester' }}</h2> --}}
                <div class="space-y-4">
                        <div class="card bg-white text-gray-800 shadow-lg rounded-lg overflow-hidden p-4">
                            <div class="flex items-center justify-between mb-4">
                                <h3 class="text-lg font-semibold">{{ $schedule->title }}</h3>
                                @if ($schedule->pdf_file)
                                    <a href="#" class="text-blue-500 hover:underline open-modal"
                                        data-name="{{ $schedule->title }}"
                                        data-file="{{ asset('storage/uploads/' . $schedule->pdf_file) }}">
                                        View
                                    </a>
                                @else
                                    <p class="text-gray-600">No PDF available</p>
                                @endif
                            </div>
                        </div>
                </div>
            </div>
        @endforeach
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
                <a id="downloadLink" href="#" download
                    class="btn bg-primary hover:bg-primary-dark text-white px-4 py-2 rounded">Download</a>
                <button id="closeFooterModal"
                    class="ml-2 btn bg-secondary hover:bg-secondary-dark text-white px-4 py-2 rounded">Close</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('pdfModal');
            const modalTitle = document.getElementById('pdfModalTitle');
            const modalIframe = document.getElementById('pdfIframe');
            const downloadLink = document.getElementById('downloadLink');
            const closeModalButtons = [document.getElementById('closeModal'), document.getElementById(
                'closeFooterModal')];

            // Open modal on click
            document.querySelectorAll('.open-modal').forEach(button => {
                button.addEventListener('click', function(event) {
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
                button.addEventListener('click', function() {
                    modal.classList.add('hidden');
                    modalIframe.src = ''; // Clear iframe to stop loading the document when hidden
                });
            });

            // Close modal when clicking outside the modal
            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.classList.add('hidden');
                    modalIframe.src = ''; // Clear iframe to stop loading the document when hidden
                }
            });
        });
    </script>
    <script>
        document.getElementById('goBackLink').addEventListener('click', function (event) {
            event.preventDefault();
            window.history.back();
        });
    </script>
</body>

</html>
