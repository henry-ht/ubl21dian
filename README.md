# UBL 2.1 DIAN

Core for electronic invoicing pre-validation - DIAN UBL 2.1.

Fork of the <a href="https://gitlab.com/torresoftware/ubl21dian" target="_blank" rel="noopener noreferrer">ubl21dian</a> package by Torresoftware, designed to generate electronic documents in UBL 2.1 format in compliance with DIAN regulations in Colombia. This version includes customizations and specific enhancements to integrate with other Laravel solutions or adapt to particular use cases.

# UBL 2.1 DIAN DETAILS

Package for electronic invoicing in Colombia

# Tags
* 1: ✅ Contains valid tests with the binary security token (SOAP) and XAdES (XML) signature using sha1, sha256, and sha512 algorithms.
* 2: ✅ Includes the main templates for consuming the web service; requires curl as a dependency.
* 3: ✅ Fixes the canonicalization error.
* 4: ✅ Provides valid tests for sending credit notes and calculating the CUDE.
* 5: ✅ Licensed under LGPL.
* 6: ✅ Includes valid tests for sending debit notes and the standard document name.

# Functions
* Document signing  
* Asynchronous sending  
* Status query by zipkey  
* Status query by CUFE  
* Numbering range query  
* Asynchronous test set sending  

### Example of electronic invoice signing and validation using UBL 2.1 (Laravel)

This snippet demonstrates how to generate the XML of an invoice, digitally sign it, and validate it against the XSD schema using the `SignInvoice` package.

<!-- ...existing code... -->

```php
    use ubl21dian\XAdES\SignInvoice;

    $view = view('dian-xml.Invoice')->with([
        'sale'      => $this->sale
    ]);

    $xml = $view->render();

    $sign = new SignInvoice(storage_path(env('DIAN_PFXPATH')), env('DIAN_PFXPASSWORD'));

    $sign->softwareID = $this->sale->dian_resolution->software_id;
    $sign->pin = env('DIAN_PIN');
    $sign->technicalKey = env('DIAN_TECHNICAL_KEY');
    $sign->sign($xml);

    $xmlSign = $sign->getDocument()->saveXML();

    $validate = $this->validateXmlWithXsd($xmlSign, storage_path('XSD/maindoc/UBL-Invoice-2.1.xsd'));
```

```php
    /**
     * Validates an XML file against one or multiple XSD schemas.
     *
     * @param string $xmlContent Content of the XML to be validated.
     * @param string|array $xsdPaths Path(s) to the XSD file or XSD files.
     * @return bool Validation result.
     */
    public function validateXmlWithXsd(string $xmlContent, $xsdPath): bool
    {
        $dom = new \DOMDocument();
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = false;
        $dom->loadXML($xmlContent);

        $valid = false;

        $valid = $dom->schemaValidate($xsdPath);

        return $valid;
    }
```
<!-- ...existing code... -->
