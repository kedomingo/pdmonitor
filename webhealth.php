<?php

declare(strict_types=1);

use App\Services\WebMonitor;
use PagerDuty\Exceptions\PagerDutyException;
use PagerDuty\TriggerEvent;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/vendor/autoload.php';

$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

$container = new DI\Container();

/**
 * @var WebMonitor $webmon
 */
$webmon = $container->get(WebMonitor::class);

$result = $webmon->ping("https://ips-cambodia.com/testerror.php");
if ($result >= 400) {
    pagerDutyAlert();
}

function pagerDutyAlert(): void
{
    $routingKey = $_ENV['EVENTS_V2_INTEGRATION_KEY'];

    try {
        $event = new TriggerEvent(
            $routingKey,
            "Website is down",
            "ips-cambodia.com",
            TriggerEvent::ERROR,
            true // Generate the dedup_key from the driver. If false, the dedup_key will be generated on PD
        );
        $responseCode = $event->send();
        if ($responseCode >= 200 && $responseCode < 300) {
            echo "PagerDuty alert sent\n";
        } elseif ($responseCode == 429) {
            echo "PagerDuty alert not sent: Rate Limited\n";
        } else {
            echo "Could not send alert to PagerDuty. Response code " . $responseCode . "\n";
        }
    } catch (PagerDutyException $exception) {
        var_dump($exception->getErrors());
    }
}
