{{-- @extends('Student_Web.main.master')
@section('content') --}}

{{-- <button id="rzp-button1">Pay</button> --}}

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>

var options = {
    "key": "rzp_test_dQQytHLHpJXGhq", // Enter the Key ID generated from the Dashboard
     // rzp_test_dQQytHLHpJXGhq     rzp_live_GO68goqxVy3bRX
    "amount": "{{$amount*100}}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Acme Corp",
    "description": "Test Transaction",
    "image": "https://example.com/your_logo",
    "order_id": "{{$order_id}}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    // "callback_url": "https://eneqd3r9zrjok.x.pipedream.net/",
    "handler": function (response){

        jQuery.ajax({
            type: 'post',
            url: "{{route('orderDone')}}",
            data: "id={{$data->id}}&order_id={{$order_id}}&tran_id="+response.razorpay_payment_id+"&_token={{ csrf_token() }}",
            success: function(result) {
                // alert('Payment Successfully Done');
                // $('p').append(result);
                $('#waiting').addClass('d-none');
                $('#success').removeClass('d-none');
                setTimeout(function() {
                    window.location.href="{{route('test_series_detail',$data->product_id)}}";
                }, 3000);
            }
        });

        // alert(response.razorpay_payment_id);
        // alert(response.razorpay_order_id);
        // alert(response.razorpay_signature);
    },

    "prefill": {
        "name": "Gaurav Kumar",
        "email": "gaurav.kumar@example.com",
        "contact": "9999999999"
    },
    "notes": {
        "address": "Razorpay Corporate Office"
    },
    "theme": {
        "color": "#3399cc"
    }
};
var rzp1 = new Razorpay(options);
// document.getElementById('rzp-button1').onclick = function(e){
//     rzp1.open();
//     e.preventDefault();
// }
rzp1.on('payment.failed', function (response){
            alert(response.error.code);
            alert(response.error.description);
            alert(response.error.source);
            alert(response.error.step);
            alert(response.error.reason);
            alert(response.error.metadata.order_id);
            alert(response.error.metadata.payment_id);
    });
window.onload = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>

<style>
    .d-none{
        display: none;
    }
    .d-show{
        display: block;
    }
</style>

<div class="text-center" id="waiting" style="margin: 28px;text-align: center;">
    <img src="{{asset('images/waiting.gif')}}" alt="">
</div>

<div class="d-none" id="success" style="margin: 28px;text-align: center;">
    <img src="{{asset('images/success.gif')}}" alt="">
</div>


{{-- @endsection --}}
