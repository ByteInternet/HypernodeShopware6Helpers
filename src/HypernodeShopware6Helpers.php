<?php declare(strict_types=1);

namespace Hypernode\HypernodeShopware6Helpers;

use Shopware\Core\Framework\Plugin;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Shopware\Core\Framework\Plugin\Context\InstallContext;
use Symfony\Component\Console\Output\OutputInterface;
use Shopware\Core\Framework\Plugin\Context\ActivateContext;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Shopware\Core\Framework\Plugin\Context\DeactivateContext;
use Hypernode\HypernodeShopware6Helpers\Util\Lifecycle\InstallUninstall;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Shopware\Core\Framework\Plugin\Util\PluginIdProvider;

class HypernodeShopware6Helpers extends Plugin
{
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/DependencyInjection'));
        $loader->load('pluginexample.xml');
    }

    public function install(InstallContext $installContext): void
    {
        $systemConfigRepository = $this->container->get('system_config.repository');
        (new InstallUninstall(
            $systemConfigRepository,
            $this->container->get(SystemConfigService::class),
            \get_class($this)
        ))->install($installContext->getContext());

        parent::install($installContext);
    }
}