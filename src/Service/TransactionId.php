<?php
/*
 * This file is part of prooph/link.
 * (c) 2014-2015 prooph software GmbH <contact@prooph.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 * Date: 4/16/15 - 7:04 PM
 */
namespace Prooph\Link\Application\Service;

use Rhumsaa\Uuid\Uuid;

/**
 * Class TransactionId
 *
 * The transaction id is generated by a TransactionCommand and assigned to all TransactionEvents caused by the command.
 * This makes it easy to identify all changes caused by a single command.
 *
 * @package Prooph\Link\Application\Service
 * @author Alexander Miertsch <kontakt@codeliner.ws>
 */
final class TransactionId 
{
    /**
     * @var Uuid
     */
    private $transactionId;

    /**
     * @return TransactionId
     */
    public static function generate()
    {
        return new self(Uuid::uuid4());
    }

    /**
     * @param string $transactionId
     * @return TransactionId
     */
    public static function fromString($transactionId)
    {
        return new self(Uuid::fromString($transactionId));
    }

    /**
     * @param Uuid $transactionId
     */
    private function __construct(Uuid $transactionId)
    {
        $this->transactionId = $transactionId;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->transactionId->toString();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }

    /**
     * @param TransactionId $other
     * @return bool
     */
    public function equals(TransactionId $other)
    {
        return $this->toString() === $other->toString();
    }
} 