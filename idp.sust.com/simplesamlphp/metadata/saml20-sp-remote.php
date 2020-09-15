
<?php
$metadata = [];

// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, [
  CURLOPT_RETURNTRANSFER => 1,
  CURLOPT_URL => 'http://18.191.122.156:3000/idp',
  CURLOPT_USERAGENT => 'Sample cURL Request'
]);
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);
$meta_list = json_decode($resp, true);

foreach ($meta_list as $value) {
  // Get cURL resource
  $curl = curl_init();
  // Set some options - we are passing in a useragent too here
  curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $value,
    CURLOPT_USERAGENT => 'Sample cURL Request'
  ]);
  $resp = curl_exec($curl);
  if ($value == 'http://18.191.122.156:3000/mailmetadata') {
    $value = "https://mail.sust.com/service/extension/samlreceiver";
  }
  $metadata[$value] = json_decode($resp, true);
}

// $metadata['https://mail.sust.com/service/extension/samlreceiver'] = array(
//   'entityid' => 'https://mail.sust.com/service/extension/samlreceiver',
//   'contacts' =>
//   array(),
//   'metadata-set' => 'saml20-sp-remote',
//   'AssertionConsumerService' =>
//   array(
//     0 =>
//     array(
//       'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
//       'Location' => 'https://mail.sust.com/service/extension/samlreceiver',
//       'index' => 0,
//     ),
//   ),
//   'SingleLogoutService' =>
//   array(),
//   'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress',
//   'simplesaml.nameidattribute' => 'uid',
//   'validate.authnrequest' => false,
//   'certificate' => 'example.org.crt',
// );



// $metadata['https://saml2sp.example.org'] = [
//   'AssertionConsumerService' => 'https://saml2sp.example.org/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
//   'SingleLogoutService' => 'https://saml2sp.example.org/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
// ];

// /*
//  * This example shows an example config that works with G Suite (Google Apps) for education.
//  * What is important is that you have an attribute in your IdP that maps to the local part of the email address at
//  * G Suite. In example, if your Google account is foo.com, and you have a user that has an email john@foo.com, then you
//  * must set the simplesaml.nameidattribute to be the name of an attribute that for this user has the value of 'john'.
//  */
// $metadata['google.com'] = [
//   'AssertionConsumerService' => 'https://www.google.com/a/g.feide.no/acs',
//   'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress',
//   'simplesaml.nameidattribute' => 'uid',
//   'simplesaml.attributes' => false,
// ];

// $metadata['https://legacy.example.edu'] = [
//   'AssertionConsumerService' => 'https://legacy.example.edu/saml/acs',
//   /*
//      * Currently, SimpleSAMLphp defaults to the SHA-256 hashing algorithm.
//      * Uncomment the following option to use SHA-1 for signatures directed
//      * at this specific service provider if it does not support SHA-256 yet.
//      *
//      * WARNING: SHA-1 is disallowed starting January the 1st, 2014.
//      * Please refer to the following document for more information:
//      * http://csrc.nist.gov/publications/nistpubs/800-131A/sp800-131A.pdf
//      */
//   //'signature.algorithm' => 'http://www.w3.org/2000/09/xmldsig#rsa-sha1',
// ];


// $metadata['http://sp1.sust.com/simplesaml/module.php/saml/sp/metadata.php/default-sp'] = array(
//   'SingleLogoutService' =>
//   array(
//     0 =>
//     array(
//       'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
//       'Location' => 'http://sp1.sust.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
//     ),
//   ),
//   'AssertionConsumerService' =>
//   array(
//     0 =>
//     array(
//       'index' => 0,
//       'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
//       'Location' => 'http://sp1.sust.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
//     ),
//     1 =>
//     array(
//       'index' => 1,
//       'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
//       'Location' => 'http://sp1.sust.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp',
//     ),
//     2 =>
//     array(
//       'index' => 2,
//       'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
//       'Location' => 'http://sp1.sust.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
//     ),
//     3 =>
//     array(
//       'index' => 3,
//       'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
//       'Location' => 'http://sp1.sust.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp/artifact',
//     ),
//   ),
//   'contacts' =>
//   array(
//     0 =>
//     array(
//       'emailAddress' => 'admin@example.org',
//       'contactType' => 'technical',
//       'givenName' => 'Administrator',
//     ),
//   ),
//   'certData' => 'MIIEejCCAuKgAwIBAgIJAJw1O6C4pmyoMA0GCSqGSIb3DQEBCwUAMFIxCzAJBgNVBAYTAkJEMQ8wDQYDVQQIDAZTeWxoZXQxDTALBgNVBAoMBFNVU1QxDDAKBgNVBAsMA0NTRTEVMBMGA1UEAwwMc3AxLnN1c3QuY29tMB4XDTE5MTAxOTE1MzUzMloXDTI5MTAxODE1MzUzMlowUjELMAkGA1UEBhMCQkQxDzANBgNVBAgMBlN5bGhldDENMAsGA1UECgwEU1VTVDEMMAoGA1UECwwDQ1NFMRUwEwYDVQQDDAxzcDEuc3VzdC5jb20wggGiMA0GCSqGSIb3DQEBAQUAA4IBjwAwggGKAoIBgQDB1IhB4E61n/M6fcARo8y49ac/y2XC/o9vz0hU0ylHls0mr8RcSE/hB2fPWuL6PbdIHwQJr9JTJ3c8dl9YJ9koPZpv0hRQzFIwhpuqabLb6ad8shlNoOQgxCCQ9iXb3iWCNw6oWtoE2jCzxPv5su3nrLFmBawmynN9i+yXAvyY8+9EeaBYClIN/Ke2H1ikgBt7MbEnLqmmQ4buCSm/KOb7s2/cOWE7ID3/mE4FHxVGsG/QE5VjdcfGPxpjlQQdbHhuaHIvbljp6cbixGY/0k+X1+/U9UdQuReptLz6YS2cEv0X3jilOLknlvEeGqXpSzM/ffBTvzthuzylh5f1bKbMKG5iFQ01uZnwnBfOpwyuQ+LH6LjvEtshMIDY1W+FLkSv6e5f4wO16lsSTly4yLz/I65Xxoe3rhrCgR0Fv71Zc+vBFpcmxB7Ce/ExOkKuKKBYRKxd9+RZ7Ic1Vf5ovRwE66zYYVrjO2b0B404mwWJG9oR6SkRYG/FAIxZ1DQVhv8CAwEAAaNTMFEwHQYDVR0OBBYEFIzkFDA7M+jmNXFHH2iI8S2mC7ySMB8GA1UdIwQYMBaAFIzkFDA7M+jmNXFHH2iI8S2mC7ySMA8GA1UdEwEB/wQFMAMBAf8wDQYJKoZIhvcNAQELBQADggGBAJHkwigtI1+Yrc/EoNBjI9LNhFnAO2VMjOCnZMfgMTnPn2PnPXfZPx0UB7vSB9AYxgmtXfrhuvcTwWHt2KNxXoaBv0HbD9ReslGdXzllVKof8/bmf/dbH7RTqIJ4tO8pVEv0SVPwJDDKLsujPli7l0Ej0tC+9CoTHyqBmCHEVFIVxQettQypJRgzpRFXQpXgNpo83iUeMaubte2IYfBDfIW8nrdb696Gak/5q10qCd/WwULN2ME35tRC56FqNMERAuNUjX17mMrHgdW9mNX4vjlvixcpCjNvaU5C74m27zRUcpx5VTEHGHnemzHSsBD5ZV6vu64YWoco0lCefcP1imE3FfocOSYB3waE9W5+LJeM/sFrNY2xX51TMDgY9w1ia+wFpaTVOau3W/pboEFchNK8U/v8TXTbVNztyHJ0i+mH2oUmj6D3AdCAkJ/aPfbUZkU+2i0/0QE9VenEupennRFx3u9q5J0T5KXv8DVYba0mVzgTalsV+B40pdmdxSX8hQ==',
// );


// $metadata['http://sp2.sust.com/simplesaml/module.php/saml/sp/metadata.php/default-sp'] = array(
//   'SingleLogoutService' =>
//   array(
//     0 =>
//     array(
//       'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
//       'Location' => 'http://sp2.sust.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
//     ),
//   ),
//   'AssertionConsumerService' =>
//   array(
//     0 =>
//     array(
//       'index' => 0,
//       'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
//       'Location' => 'http://sp2.sust.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
//     ),
//     1 =>
//     array(
//       'index' => 1,
//       'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
//       'Location' => 'http://sp2.sust.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp',
//     ),
//     2 =>
//     array(
//       'index' => 2,
//       'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
//       'Location' => 'http://sp2.sust.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
//     ),
//     3 =>
//     array(
//       'index' => 3,
//       'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
//       'Location' => 'http://sp2.sust.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp/artifact',
//     ),
//   ),
//   'contacts' =>
//   array(
//     0 =>
//     array(
//       'emailAddress' => 'admin@example.org',
//       'contactType' => 'technical',
//       'givenName' => 'Administrator',
//     ),
//   ),
//   'certData' => 'MIIEejCCAuKgAwIBAgIJALZTz8FmsBn1MA0GCSqGSIb3DQEBCwUAMFIxCzAJBgNVBAYTAkJEMQ8wDQYDVQQIDAZTeWxoZXQxDTALBgNVBAoMBFNVU1QxDDAKBgNVBAsMA0NTRTEVMBMGA1UEAwwMc3AyLnN1c3QuY29tMB4XDTE5MTAxOTE1Mzg1OFoXDTI5MTAxODE1Mzg1OFowUjELMAkGA1UEBhMCQkQxDzANBgNVBAgMBlN5bGhldDENMAsGA1UECgwEU1VTVDEMMAoGA1UECwwDQ1NFMRUwEwYDVQQDDAxzcDIuc3VzdC5jb20wggGiMA0GCSqGSIb3DQEBAQUAA4IBjwAwggGKAoIBgQCoT9ihzw/WoAEL6l5Vvy3ceFW9yx5qUysOT+CkMqTGuRh1vjvw+Q+IFX3aLocdNV3uHOLyZlwHVSEaztAEEJHAJeaNSytGTnI/fLmza2URbOv8SdZbxeYuvLPe6KwiE4W+el/HcyJOdHMU/5m3+K2TaW6NT5llvzgD+LJWgaYdJhJT51RmqECG9+Dt5CYZyvy0HJgEk/n2tJJsiNucdoHWg1mwQVOm6AXcyIpoSYxcA7bjqLmKlzcBMLkLYHGt4gCckUJgas+9YLWIcXjyF3V3CERDUtfnqYp5c2iwIDuLCCOntQ9VobpgBrC9o5oMFRz1K4vOb5rfHfWejMZ+3gXttpesWqQKTxMvSL+cSU1EU1nHOCMlu4Vjl41SKMDFVRynBaXCccwpq6odrc/0ptiY8G0tCSvclxwUL3WmXRKlHZn6mX46gCsnVXqtsGGKImSzsxlR7vx4J/pTDDPjCtzPe9tnOek2OlFvpwSN6Utf7OufcCOKzd2bjpKZyKl1MK0CAwEAAaNTMFEwHQYDVR0OBBYEFPa41Qm2SFxakY9veWdGAfsPpbAkMB8GA1UdIwQYMBaAFPa41Qm2SFxakY9veWdGAfsPpbAkMA8GA1UdEwEB/wQFMAMBAf8wDQYJKoZIhvcNAQELBQADggGBAGybRFHZgTVHgqsty23OuGdjc9lY7vqWkuPXbB32dyvTzGUuhH8OQFuoxufbZ+4z0rzX4MqfPVaNipcq6cUNTvsjo3nN5lISjQOOxHtFuumr846bipCKoCzuWWbUNKxHqLiQz0sJ3NnuIbz10F+iRFYdxQ+1Hn8AWhYFO12/zTzB+JSLKxdrSizcupmYzaTfPR/0B+FN78WEp46yrBB7WIHSkBAl+EfHUJzBJcN6QKjhYkPg6D0k1/UoOnzO1PsH8YhSNJ/5YhSDTcjPH/PRpjxsNFZia4Hq0afb0+xHSTLrRlgE29sVw6dcjp13I78dLcXs9UQARnrwZNunbOZVM20POefXzszSr0NnR2i+/uZASDd+R6Kr213Qpn3Z4d+GGaZMqpekk7yDDumMoBp+Sy39hFbMimlx5YFiSXUV4iX3F8yVaPkpFDTjGnbyY1lq/AUARoL+E2onk4+YflE3lBnuoSlUlbk2qzACqabH4gcXNnKxzlwpC8KWg6WAQMgFPQ==',
// );



// $metadata['http://code.sust.com/simplesaml/module.php/saml/sp/metadata.php/default-sp'] = array(
//   'SingleLogoutService' =>
//   array(
//     0 =>
//     array(
//       'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
//       'Location' => 'http://code.sust.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
//     ),
//   ),
//   'AssertionConsumerService' =>
//   array(
//     0 =>
//     array(
//       'index' => 0,
//       'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
//       'Location' => 'http://code.sust.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
//     ),
//     1 =>
//     array(
//       'index' => 1,
//       'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
//       'Location' => 'http://code.sust.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp',
//     ),
//     2 =>
//     array(
//       'index' => 2,
//       'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
//       'Location' => 'http://code.sust.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
//     ),
//     3 =>
//     array(
//       'index' => 3,
//       'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
//       'Location' => 'http://code.sust.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp/artifact',
//     ),
//   ),
//   'contacts' =>
//   array(
//     0 =>
//     array(
//       'emailAddress' => 'admin@example.org',
//       'contactType' => 'technical',
//       'givenName' => 'Administrator',
//     ),
//   ),
//   'certData' => 'MIIEejCCAuKgAwIBAgIJAJw1O6C4pmyoMA0GCSqGSIb3DQEBCwUAMFIxCzAJBgNVBAYTAkJEMQ8wDQYDVQQIDAZTeWxoZXQxDTALBgNVBAoMBFNVU1QxDDAKBgNVBAsMA0NTRTEVMBMGA1UEAwwMc3AxLnN1c3QuY29tMB4XDTE5MTAxOTE1MzUzMloXDTI5MTAxODE1MzUzMlowUjELMAkGA1UEBhMCQkQxDzANBgNVBAgMBlN5bGhldDENMAsGA1UECgwEU1VTVDEMMAoGA1UECwwDQ1NFMRUwEwYDVQQDDAxzcDEuc3VzdC5jb20wggGiMA0GCSqGSIb3DQEBAQUAA4IBjwAwggGKAoIBgQDB1IhB4E61n/M6fcARo8y49ac/y2XC/o9vz0hU0ylHls0mr8RcSE/hB2fPWuL6PbdIHwQJr9JTJ3c8dl9YJ9koPZpv0hRQzFIwhpuqabLb6ad8shlNoOQgxCCQ9iXb3iWCNw6oWtoE2jCzxPv5su3nrLFmBawmynN9i+yXAvyY8+9EeaBYClIN/Ke2H1ikgBt7MbEnLqmmQ4buCSm/KOb7s2/cOWE7ID3/mE4FHxVGsG/QE5VjdcfGPxpjlQQdbHhuaHIvbljp6cbixGY/0k+X1+/U9UdQuReptLz6YS2cEv0X3jilOLknlvEeGqXpSzM/ffBTvzthuzylh5f1bKbMKG5iFQ01uZnwnBfOpwyuQ+LH6LjvEtshMIDY1W+FLkSv6e5f4wO16lsSTly4yLz/I65Xxoe3rhrCgR0Fv71Zc+vBFpcmxB7Ce/ExOkKuKKBYRKxd9+RZ7Ic1Vf5ovRwE66zYYVrjO2b0B404mwWJG9oR6SkRYG/FAIxZ1DQVhv8CAwEAAaNTMFEwHQYDVR0OBBYEFIzkFDA7M+jmNXFHH2iI8S2mC7ySMB8GA1UdIwQYMBaAFIzkFDA7M+jmNXFHH2iI8S2mC7ySMA8GA1UdEwEB/wQFMAMBAf8wDQYJKoZIhvcNAQELBQADggGBAJHkwigtI1+Yrc/EoNBjI9LNhFnAO2VMjOCnZMfgMTnPn2PnPXfZPx0UB7vSB9AYxgmtXfrhuvcTwWHt2KNxXoaBv0HbD9ReslGdXzllVKof8/bmf/dbH7RTqIJ4tO8pVEv0SVPwJDDKLsujPli7l0Ej0tC+9CoTHyqBmCHEVFIVxQettQypJRgzpRFXQpXgNpo83iUeMaubte2IYfBDfIW8nrdb696Gak/5q10qCd/WwULN2ME35tRC56FqNMERAuNUjX17mMrHgdW9mNX4vjlvixcpCjNvaU5C74m27zRUcpx5VTEHGHnemzHSsBD5ZV6vu64YWoco0lCefcP1imE3FfocOSYB3waE9W5+LJeM/sFrNY2xX51TMDgY9w1ia+wFpaTVOau3W/pboEFchNK8U/v8TXTbVNztyHJ0i+mH2oUmj6D3AdCAkJ/aPfbUZkU+2i0/0QE9VenEupennRFx3u9q5J0T5KXv8DVYba0mVzgTalsV+B40pdmdxSX8hQ==',
// );


// $metadata['http://sp3.sust.com/simplesaml/module.php/saml/sp/metadata.php/default-sp'] = array(
//   'SingleLogoutService' =>
//   array(
//     0 =>
//     array(
//       'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
//       'Location' => 'http://sp3.sust.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
//     ),
//   ),
//   'AssertionConsumerService' =>
//   array(
//     0 =>
//     array(
//       'index' => 0,
//       'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
//       'Location' => 'http://sp3.sust.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
//     ),
//     1 =>
//     array(
//       'index' => 1,
//       'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
//       'Location' => 'http://sp3.sust.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp',
//     ),
//     2 =>
//     array(
//       'index' => 2,
//       'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
//       'Location' => 'http://sp3.sust.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
//     ),
//     3 =>
//     array(
//       'index' => 3,
//       'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
//       'Location' => 'http://sp3.sust.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp/artifact',
//     ),
//   ),
//   'contacts' =>
//   array(
//     0 =>
//     array(
//       'emailAddress' => 'admin@example.org',
//       'contactType' => 'technical',
//       'givenName' => 'Administrator',
//     ),
//   ),
//   'certData' => 'MIIEejCCAuKgAwIBAgIJAJw1O6C4pmyoMA0GCSqGSIb3DQEBCwUAMFIxCzAJBgNVBAYTAkJEMQ8wDQYDVQQIDAZTeWxoZXQxDTALBgNVBAoMBFNVU1QxDDAKBgNVBAsMA0NTRTEVMBMGA1UEAwwMc3AxLnN1c3QuY29tMB4XDTE5MTAxOTE1MzUzMloXDTI5MTAxODE1MzUzMlowUjELMAkGA1UEBhMCQkQxDzANBgNVBAgMBlN5bGhldDENMAsGA1UECgwEU1VTVDEMMAoGA1UECwwDQ1NFMRUwEwYDVQQDDAxzcDEuc3VzdC5jb20wggGiMA0GCSqGSIb3DQEBAQUAA4IBjwAwggGKAoIBgQDB1IhB4E61n/M6fcARo8y49ac/y2XC/o9vz0hU0ylHls0mr8RcSE/hB2fPWuL6PbdIHwQJr9JTJ3c8dl9YJ9koPZpv0hRQzFIwhpuqabLb6ad8shlNoOQgxCCQ9iXb3iWCNw6oWtoE2jCzxPv5su3nrLFmBawmynN9i+yXAvyY8+9EeaBYClIN/Ke2H1ikgBt7MbEnLqmmQ4buCSm/KOb7s2/cOWE7ID3/mE4FHxVGsG/QE5VjdcfGPxpjlQQdbHhuaHIvbljp6cbixGY/0k+X1+/U9UdQuReptLz6YS2cEv0X3jilOLknlvEeGqXpSzM/ffBTvzthuzylh5f1bKbMKG5iFQ01uZnwnBfOpwyuQ+LH6LjvEtshMIDY1W+FLkSv6e5f4wO16lsSTly4yLz/I65Xxoe3rhrCgR0Fv71Zc+vBFpcmxB7Ce/ExOkKuKKBYRKxd9+RZ7Ic1Vf5ovRwE66zYYVrjO2b0B404mwWJG9oR6SkRYG/FAIxZ1DQVhv8CAwEAAaNTMFEwHQYDVR0OBBYEFIzkFDA7M+jmNXFHH2iI8S2mC7ySMB8GA1UdIwQYMBaAFIzkFDA7M+jmNXFHH2iI8S2mC7ySMA8GA1UdEwEB/wQFMAMBAf8wDQYJKoZIhvcNAQELBQADggGBAJHkwigtI1+Yrc/EoNBjI9LNhFnAO2VMjOCnZMfgMTnPn2PnPXfZPx0UB7vSB9AYxgmtXfrhuvcTwWHt2KNxXoaBv0HbD9ReslGdXzllVKof8/bmf/dbH7RTqIJ4tO8pVEv0SVPwJDDKLsujPli7l0Ej0tC+9CoTHyqBmCHEVFIVxQettQypJRgzpRFXQpXgNpo83iUeMaubte2IYfBDfIW8nrdb696Gak/5q10qCd/WwULN2ME35tRC56FqNMERAuNUjX17mMrHgdW9mNX4vjlvixcpCjNvaU5C74m27zRUcpx5VTEHGHnemzHSsBD5ZV6vu64YWoco0lCefcP1imE3FfocOSYB3waE9W5+LJeM/sFrNY2xX51TMDgY9w1ia+wFpaTVOau3W/pboEFchNK8U/v8TXTbVNztyHJ0i+mH2oUmj6D3AdCAkJ/aPfbUZkU+2i0/0QE9VenEupennRFx3u9q5J0T5KXv8DVYba0mVzgTalsV+B40pdmdxSX8hQ==',
// );
