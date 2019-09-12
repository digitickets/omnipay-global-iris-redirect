<?php

namespace Omnipay\GlobalIris;

use function array_merge;
use Omnipay\Common\AbstractGateway;
use Omnipay\Common\Message\RequestInterface;
use Omnipay\GlobalIris\Message\CompleteRedirectPurchaseRequest;
use Omnipay\GlobalIris\Message\AuthorizeRequest;
use Omnipay\GlobalIris\Message\RedirectPurchaseRequest;
use Omnipay\GlobalIris\Traits\GatewayParamsTrait;

/**
 * @method \Omnipay\Common\Message\RequestInterface completeAuthorize(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface capture(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface refund(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface void(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface createCard(array $options= [])
 * @method \Omnipay\Common\Message\RequestInterface updateCard(array $options =[])
 * @method \Omnipay\Common\Message\RequestInterface deleteCard(array $options = [])
 * @method \Omnipay\Common\Message\RequestInterface authorize(array $options =[])
 */
class Gateway extends AbstractGateway
{
    use GatewayParamsTrait;

    /**
     * Get gateway name
     *
     * @return string
     */
    public function getName() : string
    {
        return 'Global Iris';
    }

    /**
     * Get gateway default parameters
     *
     * @return array
     */
    public function getDefaultParameters(): array
    {
        return [
            'testMode' => true,
            'merchantId' => null,
            'account' => null,
            'sharedSecret' => null,
        ];
    }

    /**
     * completePuchase function to be called on provider's callback
     *
     * @param array $options
     * @return \Omnipay\Common\Message\RequestInterface
     */
    public function completePurchase(array $options = []): RequestInterface
    {
        return $this->createRequest(
            CompleteRedirectPurchaseRequest::class,
            $options
        );
    }

    /**
     * puchase function to be called to initiate a purchase
     *
     * @param  array $parameters
     * @return RequestInterface
     */
    public function purchase(array $parameters = []): RequestInterface
    {
        $parameters = array_merge($this->getParameters(), $parameters);

        return $this->createRequest(
            RedirectPurchaseRequest::class,
            $parameters
        );
    }
}
