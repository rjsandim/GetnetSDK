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
$transaction->setAmount("1000");

$transaction->Boleto("000001946598")
    ->setDocumentNumber("170500000019763")
    ->setExpirationDate("21/11/2018")
    ->setProvider("santander")
    ->setInstructions("Não receber após o vencimento");

$transaction->Customer()
    ->setDocumentType("CPF")
    ->setFirstName("Bruno")
    ->setName("Bruno Paz")
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

$transaction->Order("123456")
    ->setProductType("service")
    ->setSalesTax("0");

$response = $getnet->Boleto($transaction);

print_r($response->getStatus() . "\n");

