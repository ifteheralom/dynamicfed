let trusted_sp_list = [
  "http://sp1.sust.com/simplesaml/module.php/saml/sp/metadata.php/default-sp",
  "http://sp2.sust.com/simplesaml/module.php/saml/sp/metadata.php/default-sp",
  "http://code.sust.com/simplesaml/module.php/saml/sp/metadata.php/default-sp",
];

let mailmeta = {
  entityid: "https://mail.service.com/service/extension/samlreceiver ",
  contacts: [],
  "metadata-set": "saml20-sp-remote",
  AssertionConsumerService: [
    {
      Binding: "urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST",
      Location: "https://mail.sust.com/service/extension/samlreceiver",
      index: 0,
    },
  ],
  SingleLogoutService: [],
  NameIDFormat: "urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified",
  "validate.authnrequest": false,
  certificate: "example.org.crt",
};
