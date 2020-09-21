<?php

// require_once('../simplesamlphp/lib/_autoload.php');

// $auth = new \SimpleSAML\Auth\Simple('default-sp');

// $auth->requireAuth();

// $attrs = $auth->getAttributes();
// echo $attrs[urlencode('eduPersonAffiliation')][0];
// print_r($attrs);
// echo urlencode('eduPersonAffiliation');
// phpinfo();

use SimpleSAML\Utils\Config\Metadata;

$metadata = (array(
  'entityid' => 'https://mail.sust.com/service/extension/samlreceiver ',
  'contacts' =>
  array(),
  'metadata-set' => 'saml20-sp-remote',
  'AssertionConsumerService' =>
  array(
    0 =>
    array(
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
      'Location' => 'https://mail.sust.com/service/extension/samlreceiver',
      'index' => 0,
    ),
  ),
  'SingleLogoutService' =>
  array(),
  'NameIDFormat' => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
  'validate.authnrequest' => false,
  'certificate' => 'example.org.crt',
));

echo print_r(json_encode($metadata));



// // Get cURL resource
// $curl = curl_init();
// // Set some options - we are passing in a useragent too here
// curl_setopt_array($curl, [
//   CURLOPT_RETURNTRANSFER => 1,
//   CURLOPT_URL => 'http://18.191.122.156:3000/',
//   CURLOPT_USERAGENT => 'Sample cURL Request'
// ]);
// // Send the request & save response to $resp
// $resp = curl_exec($curl);
// // Close request to clear up some resources
// curl_close($curl);
// $meta_list = json_decode($resp, true);
// $metaArray = [];

// foreach ($meta_list as $value) {
//   // Get cURL resource
//   $curl = curl_init();
//   // Set some options - we are passing in a useragent too here
//   curl_setopt_array($curl, [
//     CURLOPT_RETURNTRANSFER => 1,
//     CURLOPT_URL => $value,
//     CURLOPT_USERAGENT => 'Sample cURL Request'
//   ]);
//   $resp = curl_exec($curl);
//   $metaArray[$value] = json_decode($resp, true);
// }
// // print("<pre>" . print_r($metaArray, true) . "</pre>");
// echo print_r($metaArray[$meta_list[0]]);
