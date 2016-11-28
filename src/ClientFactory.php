<?php

namespace Drupal\cal;

use GuzzleHttp\Client;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ClientFactory {

  /**
   * Return a configured Client object.
   */
  public function get() {
    $config = [
      'base_uri' => 'http://waterservices.usgs.gov',
    ];

    $client = new Client($config);

    return $client;
  }
}

/**
 * GuzzleHttp\Client definition.
 *
 * @var GuzzleHttp\Client
 */
protected $cal_client;
public function __construct(
  Client $cal_client
) {
  parent::__construct();
    $this->cal_client = $cal_client;
}

public static function create(ContainerInterface $container) {
  return new static(
    $container->get('cal.client')
  );
}
