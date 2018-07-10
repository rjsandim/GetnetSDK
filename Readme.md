### GETNET SDK PHP - API v1
E-commerce

Todos os passos e processos referentes à integração com o sistema de captura e autorização de transações financeiras da Getnet via as funcionalidades da API.

 Documentação oficial
* https://api.getnet.com.br/v1/doc/api

#### Composer
```
$ composer require brunopazz/getnet-sdk
```
#### Exemplo Autorização com cartão de crédito MasterCard R$10,00 em 2x 

```php
// Autenticação da API
$getnet = new Getnet("c076e924-a3fe-492d-a41f-1f8de48fb4b1", "bc097a2f-28e0-43ce-be92-d846253ba748", "SANDBOX");

// Inicia uma transação
$transaction = new Transaction();

// Dados do pedido - Transação
$transaction->setSellerId("1955a180-2fa5-4b65-8790-2ba4182a94cb");
$transaction->setCurrency("BRL");
$transaction->setAmount("1000");

// Gera token do cartão - Obrigatório
$card = new Token("5155901222280001", "customer_21081826", $getnet);

// Dados do método de pagamento do comprador
$transaction->Credit("")
    ->setAuthenticated(false)
    ->setDynamicMcc("1799")
    ->setSoftDescriptor("LOJA*TESTE*COMPRA-123")
    ->setDelayed(false)
    ->setPreAuthorization(true)
    ->setNumberInstallments("2")
    ->setSaveCardData(false)
    ->setTransactionType("FULL")
    ->Card($card) 
        ->setBrand("MasterCard")
        ->setExpirationMonth("12")
        ->setExpirationYear("20")
        ->setCardholderName("Bruno Paz")
        ->setSecurityCode("123");
// Dados pessoais do comprador
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
// Dados de entrega do pedido
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
// Detalhes do Pedido
$transaction->Order("123456")
    ->setProductType("service")
    ->setSalesTax("0");
$transaction->setSellerId("1955a180-2fa5-4b65-8790-2ba4182a94cb");
$transaction->setCurrency("BRL");
$transaction->setAmount("1000");

// FingerPrint - Antifraude
$transaction->Device("hash-device-id")->setIpAddress("127.0.0.1");

// Processa a Transação
$response = $getnet->Authorize($transaction);

// Resultado da transação - Consultar tabela abaixo
$response->getStatus();
```

#### CONFIRMA PAGAMENTO (CAPTURA)
```php
// Autenticação da API
$getnet = new Getnet("c076e924-a3fe-492d-a41f-1f8de48fb4b1", "bc097a2f-28e0-43ce-be92-d846253ba748", "SANDBOX");

$capture = $getnet->AuthorizeConfirm("PAYMENT_ID");
// Resultado da transação - Consultar tabela abaixo
$capture->getStatus();
```


### Status de Retorno
|Status|Descrição|
| ------- | --------- |
|PENDING|Registrada|
|CANCELED|Desfeita ou Cancelada|
|APPROVED|Aprovada|
|DENIED|Negada|
|AUTHORIZED|Autorizada pelo emissor|
|CONFIRMED|Confirmada ou Capturada|

### Cartões para testes

|  Cartão |  Resultado esperado |
| ------------ | ------------ |
|  5155901222280001 (Master)	  | Transação Autorizada  |
| 5155901222270002   (Master)|  Transação Não Autorizada |
|  5155901222260003 (Master) |  Transação Não Autorizada |
| 5155901222250004 (Master) |Transação Não Autorizada|
| 4012001037141112 (Visa) |Transação Autorizada|


### Ambientes disponíveis
|PARAMENTRO|NOME|
| ------- | --------- |
|SANDBOX|Sandbox - para desenvolvedores |
|HOMOLOG|Homologação - para lojistas e devs |
|PRODUCTION|Produção - somente lojistas |

##### TODO
Em desenvolvimento:
- Cancelamento
- Debito
