<?php declare(strict_types = 1);

namespace Hypernode\HypernodeShopware6Helpers\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Shopware\Core\Framework\Context;
use Symfony\Component\Console\Output\OutputInterface;
use Shopware\Core\Framework\Store\Api\FirstRunWizardController;
use Shopware\Core\Framework\Validation\DataBag\QueryDataBag;

class SkipWizard extends Command
{
    private $firstRunWizardController;

    public function __construct(
        FirstRunWizardController $firstRunWizardController
    ) {
        parent::__construct();
        $this->firstRunWizardController = $firstRunWizardController;
    }

    protected function configure(): void
    {
        $this->setName('hypernode:skipwizard');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $context = Context::createDefaultContext();
        $this->firstRunWizardController->frwStart($context);
        $databagVariables = [
            'language' => 'en-GB',
            'failed' => false
        ];
        $databag = new QueryDataBag($databagVariables);
        $this->firstRunWizardController->frwFinish($databag, $context);
    }
}