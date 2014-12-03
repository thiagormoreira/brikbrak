<?php

namespace Application\Options;

interface AdvertisingListOptionsInterface
{
    public function getAdvertisingListElements();

    public function setAdvertisingListElements(array $elements);
}
