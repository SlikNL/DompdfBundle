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
### Custom configuration
Copy the dompdf_config.*.inc.php.dist files to dompdf_config.*.inc.php to your /app directory and follow the dompdf usage docs.

### Usage

Whenever you need to turn something into a pdf just use this anywhere in your controller:

```php
    // Set some html and get the service
    $html = '<h1>Sample html</h1>';
    $dompdf = $this->get('slik_dompdf');

    // Generate the pdf
    $dompdf->getpdf($html);

    // Either stream the pdf to the browser
    $dompdf->stream("myfile.pdf");

    // Or get the output to handle it yourself
    $pdfoutput = $dompdf->output();
```
