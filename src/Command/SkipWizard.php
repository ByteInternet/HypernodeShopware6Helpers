<?php

declare(strict_types = 1);

namespace Hypernode\HypernodeShopware6Helpers\Command;

use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\Store\Api\FirstRunWizardController;
use Shopware\Core\Framework\Validation\DataBag\QueryDataBag;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SkipWizard extends Command
{
    public function __construct(
        private FirstRunWizardController $firstRunWizardController
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setName('hypernode:skipwizard');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $context = Context::createDefaultContext();
        $this->firstRunWizardController->frwStart($context);
        $databagVariables = [
            'language' => 'en-GB',
            'failed' => false
        ];
        $databag = new QueryDataBag($databagVariables);
        $this->firstRunWizardController->frwFinish($databag, $context);
        return 0;
    }
}
