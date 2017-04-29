<?php

/**
 * @copyright  Copyright (c) Flipbox Digital Limited
 * @license    https://github.com/flipbox/postmark/blob/master/LICENSE.md
 * @link       https://github.com/flipbox/postmark
 */

namespace flipbox\postmark;

use Psr\Http\Message\ResponseInterface;

/**
 * @author Flipbox Factory <hello@flipboxfactory.com>
 * @since 1.0.0
 */
class Transport extends \Postmark\Transport
{

    /**
     * {@inheritdoc}
     */
    public function send(\Swift_Mime_Message $message, &$failedRecipients = null)
    {

        /** @var ResponseInterface $response */
        $response = parent::send($message, $failedRecipients);

        return $response->getStatusCode() === 200;

    }

}
