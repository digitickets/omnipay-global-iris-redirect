<?php
namespace Omnipay\GlobalIris\Message;

use Omnipay\Common\Message\AbstractRequest;
use Omnipay\GlobalIris\Traits\GatewayParamsTrait;

abstract class AbstractPurchaseRequest extends AbstractRequest
{
    use GatewayParamsTrait;
}
