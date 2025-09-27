<?php

namespace PayPalCheckoutSdk\Core;

use Override;
use PayPalHttp\Injector;

class GzipInjector implements Injector {

    #[Override]
    public function inject($httpRequest): void {
        $httpRequest->headers["Accept-Encoding"] = "gzip";
    }
}
