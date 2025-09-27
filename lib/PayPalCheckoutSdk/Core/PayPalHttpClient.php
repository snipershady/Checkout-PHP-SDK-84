<?php

namespace PayPalCheckoutSdk\Core;

use Override;
use PayPalHttp\HttpClient;

class PayPalHttpClient extends HttpClient {

    /**
     * @var AuthorizationInjector
     */
    public $authInjector;

    public function __construct(PayPalEnvironment $environment, private $refreshToken = NULL) {
        parent::__construct($environment);
        $this->authInjector = new AuthorizationInjector($this, $environment, $this->refreshToken);
        $this->addInjector($this->authInjector);
        $this->addInjector(new GzipInjector());
        $this->addInjector(new FPTIInstrumentationInjector());
    }

    #[Override]
    public function userAgent() {
        return UserAgent::getValue();
    }
}
