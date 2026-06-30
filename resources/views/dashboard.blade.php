<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    Home
                </div>
                <form action="#">
                    <label>From</label>
                    <select name="from" class="form-control select select2">
                        <option value="">Select Station</option>
                        @foreach ($stations as $station)
                            <option>{{ $station->name }}</option>
                        @endforeach
                    </select>
                    <label>To</label>
                    <select name="to" class="form-control select select2">
                        <option value="">Select Station</option>
                        @foreach ($stations as $station)
                            <option>{{ $station->name }}</option>
                        @endforeach
                    </select>

                        <label>Date</label>
                        <input type="date" name="date" class="form-control">


                </form>
            </div>
        </div>
    </div>
</x-app-layout>
