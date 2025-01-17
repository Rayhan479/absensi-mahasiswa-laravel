@extends('admin.layouts.app')

@section('content')
<div class="p-4 sm:ml-64 mt-14">
    <div class="p-4 border-2 border-gray-200 rounded-lg">
        <div class="max-w-2xl mx-auto">
            <div class="mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Laporan Kehadiran</h1>
                <p class="text-gray-600 mt-2">Pilih rentang tanggal untuk menghasilkan laporan kehadiran</p>
            </div>

            <div class="bg-white rounded-lg shadow-md p-6">
                <form action="{{ route('admin.laporan.generate') }}" method="GET" class="space-y-6">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">
                                Tanggal Mulai
                            </label>
                            <div class="relative">
                                <input
                                    type="date"
                                    id="start_date"
                                    name="start_date"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    required
                                >
                            </div>
                        </div>

                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">
                                Tanggal Selesai
                            </label>
                            <div class="relative">
                                <input
                                    type="date"
                                    id="end_date"
                                    name="end_date"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                    required
                                >
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center justify-end pt-4">
                        <button
                            type="submit"
                            class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200"
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Generate Laporan
                        </button>
                    </div>
                </form>
            </div>

            @if(session('error'))
            <div class="mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-md">
                {{ session('error') }}
            </div>
            @endif

            @if(session('success'))
            <div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-md">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Set default start date to first day of current month
    const today = new Date();
    const firstDay = new Date(today.getFullYear(), today.getMonth(), 1);
    document.getElementById('start_date').valueAsDate = firstDay;

    // Set default end date to today
    document.getElementById('end_date').valueAsDate = today;

    // Validate date range
    document.querySelector('form').addEventListener('submit', function(e) {
        const startDate = new Date(document.getElementById('start_date').value);
        const endDate = new Date(document.getElementById('end_date').value);

        if (endDate < startDate) {
            e.preventDefault();
            alert('Tanggal selesai tidak boleh lebih awal dari tanggal mulai');
        }
    });
</script>
@endpush
@endsection
