<?php

namespace Bitcoin\Transaction;

/**
 * Interface TransactionInputInterface
 * @package Bitcoin
 * @author Thomas Kerin
 */
interface TransactionInputInterface
{
    /**
     * The default sequence.
     */
    const DEFAULT_SEQUENCE = 0xffffffff;

    /**
     * Return the txid for the transaction being spent
     * @return mixed
     */
    public function getTransactionId();

    /**
     * Return the vout for the transaction being spent
     *
     * @return mixed
     */
    public function getVout();

    /**
     * Set the sequence number for this transaction.
     *
     * @return mixed
     */
    public function getSequence();

    /**
     * Get the script in this transaction
     *
     * @return mixed
     */
    public function getScript();

    /**
     * Check whether the txid is for a coinbase transaction
     *
     * @return mixed
     */
    public function isCoinBase();
}
