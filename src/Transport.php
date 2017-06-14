<?php

/**
 * @copyright  Copyright (c) Flipbox Digital Limited
 * @license    https://github.com/flipbox/postmark/blob/master/LICENSE.md
 * @link       https://github.com/flipbox/postmark
 */

namespace flipbox\postmark;

use craft\helpers\Json;
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

        // Check for errors
        if ($response->getStatusCode() !== 200) {
            Postmark::error(
                $this->assembleErrorMessageFromResponse($response)
            );

            return 0;
        }

        Postmark::info("Email sent successfully via Postmark Adapter.");

        return $this->getRecipientCount($message);
    }

    /**
     * @param \Swift_Mime_Message $message
     * @return int
     */
    protected function getRecipientCount(\Swift_Mime_Message $message): int
    {
        return (
            count((array)$message->getTo())
            + count((array)$message->getCc())
            + count((array)$message->getBcc())
        );
    }

    /**
     * @param ResponseInterface $response
     * @return array|mixed
     */
    protected function assembleErrorMessageFromResponse(ResponseInterface $response)
    {
        $error = Json::decodeIfJson(
            $response->getBody()->getContents()
        );

        if (is_array($error)) {
            $error['StatusCode'] = $response->getStatusCode();
        }

        return $error;
    }
}
