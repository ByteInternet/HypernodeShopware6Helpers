<?php declare(strict_types = 1);

namespace Hypernode\HypernodeShopware6Helpers\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Shopware\Core\Framework\Api\Context\SystemSource;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepositoryInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Shopware\Core\Framework\Store\Event\FirstRunWizardFinishedEvent;
use Shopware\Core\Framework\Store\Struct\FrwState;
use Shopware\Core\System\SystemConfig\SystemConfigService;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Shopware\Core\System\SystemConfig\Util\ConfigReader;
use Shopware\Core\Kernel;

class TestCommand extends Command
{
//    private $FirstRunWizardClient = "FirstRunWizardClient";
//    private $client = FirstRunWizardClient::SHOPWARE_TOKEN_HEADER;

    private $systemConfig;

    public function __construct(
        SystemConfigService $systemConfig
    ) {
        parent::__construct();
        $this->systemConfig = $systemConfig;
    }

    protected function configure(): void
    {
        $this->setName('plugin-commands:example');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
//        $configReader = new ConfigReader();
        $output->writeln('hallo');
//        $connection = Kernel::getConnection();
//        $context = new Context(new SystemSource());
//        $dispatcher = new EventDispatcher();
//        $currentState = FrwState::openstate();
//        $newState = FrwState::completedState();
//        $dispatcher->dispatch(new FirstRunWizardFinishedEvent($newState, $currentState, $context));
//        $FirstRunWizardClientInstance = new FirstRunWizardClient("", $this->systemConfig, "", false, "");
//        $output->writeln($FirstRunWizardClientInstance);
    }
}