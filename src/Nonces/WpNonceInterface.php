<?php

namespace Nonces;

/**
 * Interface for all nonce implementations.
 * @author  Srinivas Vullamgunta
 */
interface WpNonceInterface
{
    /**
     * Returns the nonce action as string.
     * @return string
     */
    public function setAction();
}