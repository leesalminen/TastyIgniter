<div
    id="btcPayServerPaymentForm"
    class="payment-form w-100"
    data-button-selector=".AcceptUI"
    data-error-selector="#btcpayserver-errors"
>
    <a href="#" id="payWithBtc" style="padding: 10px;">
        <img src="{{ $paymentMethod->getServerUrl() }}/img/paybutton/pay.svg">
    </a>
</div>