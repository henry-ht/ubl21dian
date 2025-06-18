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
