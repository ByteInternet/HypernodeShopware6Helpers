<?php declare(strict_types=1);

namespace Hypernode\HypernodeShopware6Helpers\Util\Lifecycle;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Shopware\Core\Framework\Context;


class InstallUninstall
{
    private $systemConfigRepository;
    private $classname;
    private $systemConfig;

    public function __construct(
        EntityRepositoryInterface $systemConfigRepository,
        SystemConfigService $systemConfig,
        string $classname
    ) {
        $this->systemConfigRepository = $systemConfigRepository;
        $this->classname = $classname;
        $this->systemConfig = $systemConfig;
    }

    public function install(Context $context): void
    {

    }
}
