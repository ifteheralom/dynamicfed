<?php
/**
 * SAML 2.0 remote IdP metadata for SimpleSAMLphp.
 *
 * Remember to remove the IdPs you don't use from this file.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-remote
 */
$metadata['https://idp.sust.com/simplesaml/saml2/idp/metadata.php'] = array (
  'metadata-set' => 'saml20-idp-remote',
  'entityid' => 'https://idp.sust.com/simplesaml/saml2/idp/metadata.php',
  'SingleSignOnService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://idp.sust.com/simplesaml/saml2/idp/SSOService.php',
    ),
  ),
  'SingleLogoutService' => 
  array (
    0 => 
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://idp.sust.com/simplesaml/saml2/idp/SingleLogoutService.php',
    ),
  ),
  'certData' => 'MIIEejCCAuKgAwIBAgIJAJvSLSuds3NCMA0GCSqGSIb3DQEBCwUAMFIxCzAJBgNVBAYTAkJEMQ8wDQYDVQQIDAZTeWxoZXQxDTALBgNVBAoMBFNVU1QxDDAKBgNVBAsMA0NTRTEVMBMGA1UEAwwMaWRwLnN1c3QuY29tMB4XDTE5MTAxOTE1MjgxMVoXDTI5MTAxODE1MjgxMVowUjELMAkGA1UEBhMCQkQxDzANBgNVBAgMBlN5bGhldDENMAsGA1UECgwEU1VTVDEMMAoGA1UECwwDQ1NFMRUwEwYDVQQDDAxpZHAuc3VzdC5jb20wggGiMA0GCSqGSIb3DQEBAQUAA4IBjwAwggGKAoIBgQCzEH3tmiacIK6qXVXVnC65OMOF/4I5gQ6/y3ErOABlK5B2tM7KbUKd/bSeHxHVgqUmuH1EgvlLHHRQfz6QGfiQ5460qglKNuYoxIlIFrPDox7UchlD54nt+SFeFWz4NIVEwICi93uf9p6jrtT9kmxpJ6cSDcwZ+qtV3NjYrm+92++4BahdRaSG97HXYeaDWKv3GNZ9wn3e8e9NoVVGn5UA8Th3pLu9nbDI5nGWg5/Y1SwwKQ3WABSK9/SPuTLAwFCdpWNtRWHqmntl5kcQsrvFJXb/06+tXEIaLq3ySMRbgrTxih+mSwCXu/3z6bPlKTq/OirqoDW7yczZhIIWBqUaSQJ+Uc8/ZPwXZ9KeAegVfluvobdMyfSsLT3MpSl/yn/0fGCZYu7EmHzobep60b8OieBceEyzHBheyg1yid43CB5uI7u7A1Arak5Enj+GkFhxaNNhucmTa8Et1RREi+2xi/fTBTWchXXjElGX9Ol31JrDx2ZZL37fbRKFB9fycT8CAwEAAaNTMFEwHQYDVR0OBBYEFNrAQOm6037TBUxDWjfqR5chyydSMB8GA1UdIwQYMBaAFNrAQOm6037TBUxDWjfqR5chyydSMA8GA1UdEwEB/wQFMAMBAf8wDQYJKoZIhvcNAQELBQADggGBAFllv6OyruYVFO6pa1EwL5iT/CILB29chLoQkaGO2HLn1xSubVG7MHoawIvZ+gHB1lr0OQBL4wXkDm7Z7KzuymlnRaPqpVKx03dLcmpjSQhfirsxUlW76ArnS5Bo7leQGfkCW2LEGi9lJ3PK+FWPlz8PWHVJNkHXjV9jL8P2n2V6QlKTlR7eGUQEQrKWP234uX743gIiPpqoI6vyRDdeuwMXOkxwAN06lup2vxt2utgD5l4gdyT4aQm3VZNCUJkHp0UYPsrbVkJEssOoXxxsIZUBbxro9w766E+XnlzRiPQV7AkZKNtIC0Pkvm8m4FXxvuwBrV4wSYTL4VCmRENs9u/M3TT+hzUFt2Ea002f72TYc/T/SpE2vtj8ld6fwxdpdFz8rw3GXxePJtTH/xxfRj/+3zTMAeYDRIh/tbkAzM0aWUgaEfZzKl2QLEQNlPyEHdbITLiXFMY7WDMz5dk/xkYoFxjvx/Qd5+ejIMxx6i5mdjqUgC8u4rcqkM7mKkZCtw==',
  'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:transient',
  'contacts' => 
  array (
    0 => 
    array (
      'emailAddress' => 'admin@example.org',
      'contactType' => 'technical',
      'givenName' => 'Administrator',
    ),
  ),
);

