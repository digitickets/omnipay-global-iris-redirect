<?php

namespace Omnipay\GlobalIris\Test\Message;

use Omnipay\GlobalIris\Message\CompleteRedirectPurchaseRequest;
use Omnipay\GlobalIris\Message\CompleteRedirectPurchaseResponse;
use function Omnipay\GlobalIris\Test\Gateway\getMockHttpRequest;
use Omnipay\Tests\TestCase;
use Symfony\Component\HttpFoundation\Request;

class CompleteRedirectPurchaseRequestSuccessTest extends TestCase
{

    /** @var  \Omnipay\GlobalPayments\Message\CompleteRedirectPurchaseRequest */
    private $request;

    /**
     * Setup
     */
    protected function setUp()
    {
        $client = $this->getHttpClient();
        $request = $this->getHttpRequest();

        $this->request = new CompleteRedirectPurchaseRequest($client, $request);
        $this->request->setSharedSecret('secret');
    }

    /**
     *
     */
    public function testGetData()
    {
        $this->assertNotNull($this->request->getData());
    }

    /**
     *
     */
    public function testCompletePurchaseSuccess()
    {
        $data = $this->request->getData();

        $this->assertEquals(
            CompleteRedirectPurchaseResponse::RESULT_SUCCESS,
            $data['RESULT']
        );
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Request
     */
    public function getHttpRequest()
    {
        $requestMock = getMockHttpRequest('CompletePurchaseSuccess.txt');
        parse_str($requestMock['body'], $data);

        return new Request([], $data, [], [], [], [],
            $requestMock['body']);
    }
}