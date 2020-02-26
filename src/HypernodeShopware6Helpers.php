<?php declare(strict_types=1);

namespace Hypernode\HypernodeShopware6Helpers;

use Shopware\Core\Framework\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;

class HypernodeShopware6Helpers extends Plugin
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/DependencyInjection'));
        $loader->load('injectwizard.xml');
    }

    public function install(InstallContext $installContext): void
    {
        parent::install($installContext);
    }
}