<?php

/**
 * @copyright  Copyright (c) Flipbox Digital Limited
 * @license    https://github.com/flipboxfactory/craft-postmark/blob/master/LICENSE.md
 * @link       https://github.com/flipboxfactory/craft-postmark
 */

namespace flipbox\postmark;

use Psr\Http\Message\ResponseInterface;
use Swift_Mime_SimpleMessage;

/**
 * @author Flipbox Factory <hello@flipboxfactory.com>
 * @since 1.0.0
 */
class Transport extends \Postmark\Transport
{
    /**
     * {@inheritdoc}
     */
    public function send(Swift_Mime_SimpleMessage $message, &$failedRecipients = null)
    {
        /** @var ResponseInterface $response */
        $response = parent::send($message, $failedRecipients);

        // Check for errors
        if ($response == 0) {
            Postmark::error("Failed to send email via Postmark Adapter.");

            return $response;
        }

        Postmark::info("Email sent successfully via Postmark Adapter.");

        return $response;
    }
}
