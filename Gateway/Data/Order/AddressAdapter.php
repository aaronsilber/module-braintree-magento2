<?php

namespace Magento\Braintree\Gateway\Data\Order;

use Magento\Braintree\Gateway\Data\AddressAdapterInterface as BraintreeAddressAdapterInterface;
use Magento\Payment\Gateway\Data\Order\AddressAdapter as MagentoAddressAdapter;
use Magento\Sales\Api\Data\OrderAddressInterface;

/**
 * Class AddressAdapter
 */
class AddressAdapter extends MagentoAddressAdapter implements BraintreeAddressAdapterInterface
{
    /**
     * @var OrderAddressInterface
     */
    private $address;

    /**
     * @param OrderAddressInterface $address
     */
    public function __construct(OrderAddressInterface $address)
    {
        $this->address = $address;
        parent::__construct($address);
    }

    /**
     * @inheritdoc
     */
    public function getStreet()
    {
        $street = $this->address->getStreet();

        return empty($street) ? [] : $street;
    }

}