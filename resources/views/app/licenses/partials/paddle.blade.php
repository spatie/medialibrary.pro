@section('javaScript-body')
    <script src="https://cdn.paddle.com/paddle/paddle.js"></script>
    <script type="text/javascript">
        Paddle.Setup({vendor: {{ config('services.paddle.vendor_id') }} });

        window.addEventListener('load',function() {

            document.querySelectorAll('[data-product-id]').forEach(element => {
                element.addEventListener('click', event => {

                    Paddle.Checkout.open({
                        product: event.target.getAttribute('data-product-id'),
                        passthrough: JSON.stringify({
                            'license': event.target.getAttribute('data-license')
                        }),
                        email: "{{ auth()->user()->email }}",
                        allowQuantity: false,
                        disableLogout: true,
                        title: event.target.getAttribute('data-product-label'),
                        success: "{{ action(\App\Http\App\Controllers\AfterPaddleSaleController::class) }}"
                    });
                })
            })
        });


    </script>
@endsection
