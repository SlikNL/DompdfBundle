What is DomPDFBundle?
=============================

This bundle provides a wrapper for using [DomPDF](https://github.com/dompdf/dompdf) inside Symfony2.

### Installation
When using composer add the following to your composer.json

```js
// composer.json
{
    //...

    "require": {
        //...
        "slik/dompdf-bundle" : "dev-master"
    }

    //...
}
```

and run `php composer.phar update slik/dompdf-bundle`.

Next add the following to your appkernel:

```php
    // in AppKernel::registerBundles()
    $bundles = array(
        // Dependencies
        new Slik\DompdfBundle\SlikDompdfBundle();
    );
```

### Usage

Whenever you need to turn something into a pdf just use this anywhere in your controller:

```php
    $html = '<h1>Sample html</h1>';
    $dompdf = $this->get('slik_dompdf');
    $dompdf->getpdf($html, "mydoc.pdf");
```

This will send the pdf as a download to the user.
