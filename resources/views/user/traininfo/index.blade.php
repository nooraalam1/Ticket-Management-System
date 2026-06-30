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
        <p class="text-white text-center">Select a train:</p>
        <select id="trainIdAjax" name="train_id" class="form-control select select2">
            <option value="">Select Train</option>
            @foreach ($trains as $train)
                <option value="{{ $train->id }}">{{ $train->name }} ({{$train->train_number}})</option>
            @endforeach
        </select>
    </div>
    <div class="text-white text-center ">
        <h4 id="setTrainName"></h4>
    </div>
    <div id="trainDetails">

    </div>
</x-app-layout>



<script>
    $(document).ready(function(){
        $('#trainIdAjax').change(function(){
            var id = $(this).val()

            if(id){
                $.ajax({
                    url:'/train-name/' + id,
                    type:'GET',
                    success: function(response){
                        $('#setTrainName').text(response.train.name);

                        let x = response.train.route.route_stops;
                         $("#trainDetails").html(" ");
                        x.forEach(function(data){
                            let row =
                                     `
                                    <div>
                                    <p class="text-white text-center">${data.stop_order}) ${data.station.name} ( ${data.station.code} )</p>
                                    <p class="text-white text-center">Arrival Time: ${data.arrival_time} </p>
                                    <p class="text-white text-center">Departure Time: ${data.departure_time} </p>
                                    </div>
                                    `
                            $("#trainDetails").append(row)
                        })
                    },
                    error:function(xhr){
                        alert("Something Went Wrong!");
                    }
                });
            }
            else{
                $('#setTrainName').text('')
            }


        })
    })
</script>
