<?php

namespace ubl21dian\Templates\SOAP;

use ubl21dian\Templates\Template;
use ubl21dian\Templates\CreateTemplate;

/**
 * Send Event.
 */
class SendEvent extends Template implements CreateTemplate
{
    /**
     * Action.
     *
     * @var string
     */
    public $Action = 'http://wcf.dian.colombia/IWcfDianCustomerServices/SendEventUpdateStatus';

    /**
     * Required properties.
     *
     * @var array
     */
    protected $requiredProperties = ['contentFile'];

    /**
     * Construct.
     *
     * @param string $pathCertificate
     * @param string $passwors
     */
    public function __construct($pathCertificate, $passwors)
    {
        parent::__construct($pathCertificate, $passwors);
        $this->To = 'https://vpfe.dian.gov.co/WcfDianCustomerServices.svc?wsdl';
    }

    /**
     * Create template.
     *
     * @return string
     */
    public function createTemplate()
    {
        return $this->templateXMLSOAP = <<<XML
<soap:Envelope xmlns:soap="http://www.w3.org/2003/05/soap-envelope" xmlns:wcf="http://wcf.dian.colombia">
   <soap:Header/>
   <soap:Body>
      <wcf:SendEventUpdateStatus>
         <!--Optional:-->
         <wcf:contentFile>{$this->contentFile}</wcf:contentFile>
      </wcf:SendEventUpdateStatus>
   </soap:Body>
</soap:Envelope>
XML;
    }
}
