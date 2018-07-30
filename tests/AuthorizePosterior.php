<?php
namespace Getnet\API;
/**
 * Created by PhpStorm.
 * User: brunopaz
 * Date: 09/07/2018
 * Time: 02:41
 */
include "../vendor/autoload.php";

$getnet = new Getnet("c076e924-a3fe-492d-a41f-1f8de48fb4b1", "bc097a2f-28e0-43ce-be92-d846253ba748", "SANDBOX");
$transaction = new Transaction();
$transaction->setSellerId("1955a180-2fa5-4b65-8790-2ba4182a94cb");
$transaction->setCurrency("BRL");
$transaction->setAmount("10000");

$card = new Token("5155901222280002", "customer_21081826", $getnet);
$transaction->Credit("")
    ->setAuthenticated(false)
    ->setDynamicMcc(1799)
    ->setSoftDescriptor("LOJA*TESTE*COMPRA-123")
    ->setDelayed(false)
    ->setPreAuthorization(true)
    ->setNumberInstallments("2")
    ->setSaveCardData(true)
    ->setTransactionType("FULL")
    ->Card($card)
    ->setBrand("MasterCard")
    ->setExpirationMonth("12")
    ->setExpirationYear("20")
    ->setCardholderName("Bruno Paz")
    ->setSecurityCode("123");

$transaction->Customer("customer_21081826")
    ->setDocumentType("CPF")
    ->setEmail("customer@email.com.br")
    ->setFirstName("Bruno")
    ->setLastName("Paz")
    ->setName("Bruno Paz")
    ->setPhoneNumber("5551999887766")
    ->setDocumentNumber("12345678912")
    ->BillingAddress("90230060")
    ->setCity("São Paulo")
    ->setComplement("Sala 1")
    ->setCountry("Brasil")
    ->setDistrict("Centro")
    ->setNumber("1000")
    ->setPostalCode("90230060")
    ->setState("SP")
    ->setStreet("Av. Brasil");

$transaction->Shippings("")
    ->setEmail("customer@email.com.br")
    ->setFirstName("João")
    ->setName("João da Silva")
    ->setPhoneNumber("5551999887766")
    ->ShippingAddress("90230060")
    ->setCity("Porto Alegre")
    ->setComplement("Sala 1")
    ->setCountry("Brasil")
    ->setDistrict("São Geraldo")
    ->setNumber("1000")
    ->setPostalCode("90230060")
    ->setState("RS")
    ->setStreet("Av. Brasil");

$transaction->Order("123456")
    ->setProductType("service")
    ->setSalesTax("0");

$transaction->Device("hash-device-id")->setIpAddress("127.0.0.1");

$response = $getnet->Authorize($transaction);
print_r($response->getStatus() . "\n");

### CONFIRMA PAGAMENTO (CAPTURA)
$capture = $getnet->AuthorizeConfirm($response->getPaymentId());
print_r($capture->getStatus() . "\n");

### CANCELA PAGAMENTO (CANCEL)
$cancel = $getnet->AuthorizeCancel($response->getPaymentId(), $response->getAmount());
print_r($cancel->getStatus() . "\n");
