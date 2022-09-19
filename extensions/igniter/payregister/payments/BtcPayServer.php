<?php

namespace Igniter\PayRegister\Payments;

use Admin\Classes\BasePaymentGateway;
use Admin\Models\Orders_model;
use Exception;
use Igniter\Flame\Exception\ApplicationException;
use Igniter\Flame\Traits\EventEmitter;
use Igniter\PayRegister\Traits\PaymentHelpers;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Omnipay\Omnipay;

class BtcPayServer extends BasePaymentGateway
{
    use EventEmitter;
    use PaymentHelpers;

    public function registerEntryPoints()
    {
        return [
            'btcpayserver_return_url' => 'processReturnUrl',
        ];
    }

    public function getServerUrl()
    {
        return $this->model->btcpayserver_url;
    }

    public function getApiKey()
    {
        return $this->model->btcpayserver_api_key;
    }

    public function getStoreId()
    {
        return $this->model->btcpayserver_store_id;
    }

    public function isApplicable($total, $host)
    {
        return $host->order_total <= $total;
    }

    /**
     * @param self $host
     * @param \Main\Classes\MainController $controller
     */
    public function beforeRenderPaymentForm($host, $controller)
    {
        return;
    }

    public function createInvoice($fields)
    {
        // get cURL resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $this->getServerUrl() . '/api/v1/stores/' . $this->getStoreId() . '/invoices');

        // set method
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');

        // return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // set headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
          'Authorization: token ' . $this->getApiKey(),
          'Content-Type: application/json; charset=utf-8',
        ]);
        
        $body = json_encode($fields);

        // set body
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $body);

        // send the request and save response to $response
        $response = curl_exec($ch);

        // stop if fails
        if (!$response) {
          throw new Exception('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
        }

        // close curl resource to free up system resources 
        curl_close($ch);

        return json_decode($response);
    }

    public function getInvoice($invoice_id)
    {
        // get cURL resource
        $ch = curl_init();

        // set url
        curl_setopt($ch, CURLOPT_URL, $this->getServerUrl() . '/api/v1/stores/' . $this->getStoreId() . '/invoices/' . $invoice_id);

        // set method
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        // return the transfer as a string
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // set headers
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
          'Authorization: token ' . $this->getApiKey(),
          'Content-Type: application/json; charset=utf-8',
        ]);

        // send the request and save response to $response
        $response = curl_exec($ch);

        // stop if fails
        if (!$response) {
          throw new Exception('Error: "' . curl_error($ch) . '" - Code: ' . curl_errno($ch));
        }

        // close curl resource to free up system resources 
        curl_close($ch);

        return json_decode($response);
    }

    public function processReturnUrl($params) {
        $hash = $params[0] ?? null;
        $invoice_id = $params[1] ?? null;

        $order = $this->createOrderModel()->whereHash($hash)->first();
        if (!$hash || !$order instanceof Orders_model)
            return false;

        if(!$invoice_id)
            return Response::json(['error' => 'No invoice found']);

        $paymentMethod = $order->payment_method;
        if (!$paymentMethod || $paymentMethod->getGatewayClass() != static::class)
            return Response::json(['error' => 'No valid payment method found']);

        $invoice = $this->getInvoice($invoice_id);
        $fields = $this->getPaymentFormFields($order);

        // if($invoice->metadata->orderHash != $hash)
        //     return Response::json(['error' => 'Order ID Mis-Match']);

        if ($invoice->status === 'Settled') {
            $order->logPaymentAttempt('Payment successful', 1, $fields, $invoice);
            $order->updateOrderStatus($paymentMethod->order_status, ['notify' => false]);
            $order->markAsPaymentProcessed();
        }
        else {
            $order->logPaymentAttempt('Payment unsuccessful', 0, $fields, $invoice);
            $order->updateOrderStatus(setting('canceled_order_status'), ['notify' => false]);
        }

        return Redirect::to('/checkout/success/' . $order->hash);
    }
    
    /**
     * @param array $data
     * @param \Admin\Models\Payments_model $host
     * @param \Admin\Models\Orders_model $order
     *
     * @return mixed
     */
    public function processPaymentForm($data, $host, $order)
    {
        $this->validatePaymentMethod($order, $host);

        $fields = $this->getPaymentFormFields($order, $data);

        $invoice = $this->createInvoice($fields);

        return Redirect::to($this->getServerUrl() . '/i/' . $invoice->id);

        return true;
    }

    protected function getPaymentFormFields($order, $data = [])
    {
        $fields = [
            'amount' => number_format($order->order_total, 2, '.', ''),
            'currency' => currency()->getUserCurrency(),
            'metadata' => [
                'orderId' => $order->order_id,
                'orderHash' => $order->hash,
            ],
            'checkout' => [
                'redirectUrl' => $this->makeEntryPointUrl('btcpayserver_return_url').'/'.$order->hash.'/{InvoiceId}',
                'redirectAutomatically' => true,
            ]
        ];

        $this->fireSystemEvent('payregister.btcpayserver.extendFields', [&$fields, $order, $data]);

        return $fields;
    }
}
