<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    Train Information
                </div>
            </div>
        </div>
    </div>
    <div class="flex justify-center items-center gap-4">
        <label class="text-white text-center">Select a train:</label>
        <select id="trainIdAjax" name="train_id" class="form-control select select2" required>
            <option value="">Select Train</option>
            @foreach ($trains as $train)
                <option value="{{ $train->id }}">{{ $train->name }} ({{$train->train_number}})</option>
            @endforeach
        </select>
    </div>
</x-app-layout>
