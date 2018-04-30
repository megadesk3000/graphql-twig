<?php

namespace Drupal\graphql_twig;

use Drupal\Core\DependencyInjection\ContainerBuilder;
use Drupal\Core\DependencyInjection\ServiceProviderBase;
use Symfony\Component\DependencyInjection\Parameter;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Service provider to inject a custom derivation of `TwigEnvironment`.
 */
class GraphqlTwigServiceProvider extends ServiceProviderBase {

  /**
   * {@inheritdoc}
   */
  public function alter(ContainerBuilder $container) {
    // Replace the twig environment with the GraphQL enhanced one.
    $container->getDefinition('twig')
      ->setClass(GraphQLTwigEnvironment::class)
      ->addArgument(new Reference('graphql.query_processor'))
      ->addArgument(new Reference('renderer'));
  }

}
