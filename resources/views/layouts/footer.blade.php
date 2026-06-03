<div class="text-white flex justify-between items-center">
    <div class="">
        <h3>Powered By: <span class="">Noor A Alam</span></h3>
    </div>
    <div class="">
        <h3><button onclick="openModal('terms')">Terms and Conditions</button> | <button onclick="openModal('privacy')">Privacy Policy</button></h3>
    </div>
    <div class="">
        <img src="{{asset('logo.png')}}" alt="logo" srcset="" width="80px">
    </div>
</div>


{{-- Terms Modal --}}
<div id="terms" class="hidden fixed top-0 ">
   <h2 class="text-2xl font-bold mb-4 text-white ">Terms & Conditions</h2>
</div>

<script>
    function openModal(id){
        document.getElementById(id).classList.remove('hidden')
    }
</script>


