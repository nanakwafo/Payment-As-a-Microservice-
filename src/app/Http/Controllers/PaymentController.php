<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 01/03/2020
 * Time: 14:59
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use PayPal\Api\Amount;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Exception\PayPalConnectionException;

class PaymentController
{
    private $apiContext;

    /**
     * PaymentController constructor.
     * @param $apiContext
     */
    public function __construct ()
    {
        $this->apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(env('CLIENT_ID',null),env('CLIENTID_SECRET',null)
            )
        );
    }

    public function createPayment ()
    {

        // Create new payer and method
        $payer = new Payer();
        $payer->setPaymentMethod ("paypal");

        // Set redirect URLs
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl ('http://localhost:80/paypal/public/execute-payment')
            ->setCancelUrl ('http://localhost:80/paypal/public/cancel-payment');

        // Set payment amount
        $amount = new Amount();
        $amount->setCurrency ("USD")
            ->setTotal (400);

        // Set transaction object
        $transaction = new Transaction();
        $transaction->setAmount ($amount)
            ->setDescription ("Payment description");

        // Create the full payment object
        $payment = new Payment();
        $payment->setIntent ('sale')
            ->setPayer ($payer)
            ->setRedirectUrls ($redirectUrls)
            ->setTransactions (array ($transaction));

        // Create payment with valid API context
        try {
            $payment->create ($this->apiContext);

            // Get PayPal redirect URL and redirect the customer
            $approvalUrl = $payment->getApprovalLink ();

            // Redirect the customer to $approvalUrl
            return redirect ($approvalUrl);
        } catch (PayPalConnectionException $ex) {
            echo $ex->getCode ();
            echo $ex->getData ();
            die($ex);
        } catch (\Exception $ex) {
            die($ex);
        }
    }

    public function executePayment (Request $request)
    {

        $paymentId = $request['paymentId'];
        $payment = Payment::get ($paymentId, $this->apiContext);
        $payerId = $request['PayerID'];

        // Execute payment with payer ID
        $execution = new PaymentExecution();
        $execution->setPayerId ($payerId);

        try {
            // Execute payment
            $result = $payment->execute ($execution, $this->apiContext);
            return  $result;
        } catch (PayPalConnectionException $ex) {
            echo $ex->getCode ();
            echo $ex->getData ();
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }
    }
}