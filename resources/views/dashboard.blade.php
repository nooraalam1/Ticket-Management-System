<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    Home
                </div>
                <form action="#" class="p-6">
                    <div class="flex justify-center items-center gap-4">
                        <div class="">
                            <label class="text-white">From :</label>
                            <select name="from" id="from_station" class="form-control select select2 from_station">
                                <option value="">Select Station</option>
                                @foreach ($stations as $station)
                                    <option>{{ $station->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="">
                            <label class="text-white">To :</label>
                            <select name="to" id="to_station" class="form-control select select2 to_station">
                                <option value="">Select Station</option>
                                @foreach ($stations as $station)
                                    <option>{{ $station->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="">
                            <label class="text-white">Date :</label>
                            <input type="date" name="date" class="form-control" min="{{ now()->format('Y-m-d') }}"
                                max={{ now()->addDays(10)->format('Y-m-d') }}>
                        </div>
                    </div>
                    <div class="flex justify-center items-center mt-4">
                        <button type="button"
                            style="background-color: #6ac324; padding:5px; color:white">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            var from_station = '';
            var to_station = '';
            $('.from_station, .to_station').on('change', function() {
                var from_station = $("#from_station").val();
                var to_station = $("#to_station").val();
                if (from_station === to_station && from_station !== '' && to_station !== '') {
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: "From and To station cannot be same",
                    });
                    $("#from_station").val('');
                    $("#to_station").val('');
                }
            });
        });
    </script>
</x-app-layout>
