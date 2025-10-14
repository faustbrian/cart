<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Basket\Transformers;

use BaseCodeOy\Basket\Order;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer as SymfonySerialiser;

final class XMLTransformer extends AbstractTransformer
{
    #[\Override()]
    public function transform(Order $order): string
    {
        return (new SymfonySerialiser(
            [new ObjectNormalizer()],
            [new XmlEncoder()],
        ))->serialize($this->build($order), 'xml');
    }
}
