/*
 * Copyright IBM Corp. All Rights Reserved.
 *
 * SPDX-License-Identifier: Apache-2.0
 */

"use strict";

const { Gateway, Wallets } = require("fabric-network");
const fs = require("fs");
const path = require("path");
let bodyParser = require("body-parser");
const express = require("express");
const { raw } = require("body-parser");
const { request } = require("http");
const app = express();
app.use(express.json());
// app.use(express.urlencoded({
//   extended: true
// }));
app.use(bodyParser.json());
app.use(bodyParser.raw());
app.use(bodyParser.text());
app.use(bodyParser.urlencoded({ extended: false }));

async function main() {
  try {
    // load the network configuration
    const ccpPath = path.resolve(
      __dirname,
      "..",
      "..",
      "test-network",
      "organizations",
      "peerOrganizations",
      "org1.example.com",
      "connection-org1.json"
    );
    let ccp = JSON.parse(fs.readFileSync(ccpPath, "utf8"));

    // Create a new file system based wallet for managing identities.
    const walletPath = path.join(process.cwd(), "wallet");
    const wallet = await Wallets.newFileSystemWallet(walletPath);
    console.log(`Wallet path: ${walletPath}`);

    // Check to see if we've already enrolled the user.
    const identity = await wallet.get("appUser");
    if (!identity) {
      console.log(
        'An identity for the user "appUser" does not exist in the wallet'
      );
      console.log("Run the registerUser.js application before retrying");
      return;
    }

    // Create a new gateway for connecting to our peer node.
    const gateway = new Gateway();
    await gateway.connect(ccp, {
      wallet,
      identity: "appUser",
      discovery: { enabled: true, asLocalhost: true },
    });

    // Get the network (channel) our contract is deployed to.
    const network = await gateway.getNetwork("mychannel");

    // Get the contract from the network.
    const contract = network.getContract("fabcar");

    app.get("/hello", function (req, res) {
      res.send("Hello from server");
    });
    /////This api is used to store the metadata of sp or idp.
    app.post("/storemetadata", async (req, res) => {
      try {
        let user = req.body.user;
        let metaData = req.body.metaData;
        console.log(user);
        console.log("//////////// ////");
        console.log(metaData);
        await contract.submitTransaction("StoreMetaData", user, metaData);
        res.send("Success");
      } catch (error) {
        console.error(`Failed to submit transaction storeMetadata: ${error}`);
        process.exit(1);
      }
    });
    //This api is used to show the all the metadata along with it's owner description stored in blokcchian. this was used to check whether the data is stored in blokcchian
    app.get("/showmetadata", async (req, res) => {
      try {
        // let user = req.body.user
        // let metaData = req.body.metaData
        let result = await contract.evaluateTransaction("AllMetaData");
        /// console.log(result.toString())
        res.send(JSON.stringify(result.toString()));
      } catch (error) {
        console.error(`Failed to evaluate transaction last: ${error}`);
        process.exit(1);
      }
    });
    //This api fetch the medatadata .If you give the entityid/url of sp or idp it gives you the metadata in string format
    app.get("/metadatafetch", async (req, res) => {
      try {
        let user = req.query.user;
        // let metaData = req.body.metaData
        console.log("user from metadatafetch", user);
        let result = await contract.evaluateTransaction("MetaDataFetch", user);
        console.log(result.toString());
        res.send(JSON.stringify(result.toString()));
      } catch (error) {
        console.error(`Failed to evaluate transaction last: ${error}`);
        process.exit(1);
      }
    });

    ////this api is used to store the code. suppose wwww.idp.sust.com generates a code "123456" for wwww.sp1.sust.com. here forWhichSp is www.sp1.sust.com, whichIdp is www.sust.com and code is 123456
    app.post("/storecode", async (req, res) => {
      try {
        let spentityid = req.body.spentityid;
        let idpentityid = req.body.idpentityid;
        let idpcode = req.body.idpcode;
        console.log(spentityid, idpentityid, idpcode);
        await contract.submitTransaction(
          "StoreCode",
          spentityid,
          idpentityid,
          idpcode
        );
        res.send("Success");
      } catch (error) {
        console.error(`Failed to submit transaction store Code: ${error}`);
        process.exit(1);
      }
    });
    //This api is used to show the all the codeData along with it's owner description stored in blokcchian. this was used to check whether the code  is stored in blokcchian

    app.get("/showcodedata", async (req, res) => {
      try {
        // let user = req.body.user
        // let metaData = req.body.metaData
        let result = await contract.evaluateTransaction("AllCodeData");
        console.log(result.toString());
        res.send(JSON.stringify(result.toString()));
      } catch (error) {
        console.error(`Failed to evaluate transaction last: ${error}`);
        process.exit(1);
      }
    });
    //This api is used to fetch the generated code which was stored in blokchain. for this we need idp entity along with for which sp the code was generated for
    app.get("/codefetch", async (req, res) => {
      try {
        let spentityid = req.query.spentityid;
        let idpentityid = req.query.idpentityid;

        let result = await contract.evaluateTransaction(
          "CodeFetch",
          spentityid,
          idpentityid
        );
        res.send(JSON.stringify(result.toString()));
      } catch (error) {
        console.error(`Failed to submit transaction store Code: ${error}`);
        process.exit(1);
      }
    });
    ///Ths api was used to delete the code which was stored in blokchian along with the entity id of idp and sp. suppose www.idp.sust.com stored 123456 against www.sp1.sust.com. if we delete it deletes the whole record
    app.get("/deletecode", async (req, res) => {
      try {
        let spentityid = req.query.spentityid;
        let idpentityid = req.query.idpentityid;

        await contract.submitTransaction(
          "DeleteCodeSp",
          spentityid,
          idpentityid
        );
        res.send("Success");
      } catch (error) {
        console.error(`Failed to submit transaction store Code: ${error}`);
        process.exit(1);
      }
    });
    //This api was used to store the  Trusted list of sp or idp... It needs two things entity idp of sp or idp who belongs to this TAL and another entity idp with whom sp/idp has been federated
    app.post("/storetallist", async (req, res) => {
      try {
        let entityId = req.body.entityId;
        let tal = req.body.tal;
        await contract.submitTransaction("StoreTalList", entityId, tal);
        res.send("Success");
      } catch (error) {
        console.error(`Failed to submit transaction store Code: ${error}`);
        process.exit(1);
      }
    });
    ///this api return the trusted anchor list in array. you have to give the entity id whose trusted list you want to see
    app.get("/tallistfetch", async (req, res) => {
      try {
        let entityId = req.params.entityId;
        // let metaData = req.body.metaData
        let result = await contract.evaluateTransaction(
          "TalListReturn",
          entityId
        );
        console.log(result.toString());
        let resultJson = JSON.parse(result.toString());
        let arr = [];
        for (var i in resultJson) {
          var name = resultJson[i].Tal;
          arr.push(name);
        }
        res.send(arr);
      } catch (error) {
        console.error(`Failed to evaluate transaction last: ${error}`);
        process.exit(1);
      }
    });

    // Disconnect from the gateway.
    await gateway.disconnect();
  } catch (error) {
    console.error(`Failed to submit transaction: ${error}`);
    process.exit(1);
  }
}
app.listen(8082);
console.log("app listening on port 8082!");

main();
