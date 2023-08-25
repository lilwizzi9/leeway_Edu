const express = require('express');
const bodyParser = require('body-parser');
const Web3 = require("web3")
const app = express();
app.use(bodyParser.json());
app.use(bodyParser.urlencoded({
    extended: true
}));
const port = 3000;
const projectID = '6c21dbe940244f23953f0acf3957b7f0';
const contractAddress = '0xF36495D4b287eA1BD5F25f74FFBA19bd8114E084';
// const contractAddress = '0xEE5b86e70eE40c7b002a99a9D07194455b5Ec695';
const web3 = new Web3('https://data-seed-prebsc-1-s1.binance.org');
const securitytokenwebc = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9webc11126';
const TX = require('ethereumjs-tx').Transaction;
// import Common from 'ethereumjs-common';
const minABI = [{
    "inputs": [],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "constructor"
}, {
    "anonymous": false,
    "inputs": [{
        "indexed": true,
        "internalType": "address",
        "name": "owner",
        "type": "address"
    }, {
        "indexed": true,
        "internalType": "address",
        "name": "spender",
        "type": "address"
    }, {
        "indexed": false,
        "internalType": "uint256",
        "name": "value",
        "type": "uint256"
    }],
    "name": "Approval",
    "type": "event"
}, {
    "anonymous": false,
    "inputs": [{
        "indexed": true,
        "internalType": "address",
        "name": "previousOwner",
        "type": "address"
    }, {
        "indexed": true,
        "internalType": "address",
        "name": "newOwner",
        "type": "address"
    }],
    "name": "OwnershipTransferred",
    "type": "event"
}, {
    "anonymous": false,
    "inputs": [{
        "indexed": true,
        "internalType": "address",
        "name": "from",
        "type": "address"
    }, {
        "indexed": true,
        "internalType": "address",
        "name": "to",
        "type": "address"
    }, {
        "indexed": false,
        "internalType": "uint256",
        "name": "value",
        "type": "uint256"
    }],
    "name": "Transfer",
    "type": "event"
}, {
    "constant": true,
    "inputs": [{
        "internalType": "address",
        "name": "owner",
        "type": "address"
    }, {
        "internalType": "address",
        "name": "spender",
        "type": "address"
    }],
    "name": "allowance",
    "outputs": [{
        "internalType": "uint256",
        "name": "",
        "type": "uint256"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
}, {
    "constant": false,
    "inputs": [{
        "internalType": "address",
        "name": "spender",
        "type": "address"
    }, {
        "internalType": "uint256",
        "name": "amount",
        "type": "uint256"
    }],
    "name": "approve",
    "outputs": [{
        "internalType": "bool",
        "name": "",
        "type": "bool"
    }],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
}, {
    "constant": true,
    "inputs": [{
        "internalType": "address",
        "name": "account",
        "type": "address"
    }],
    "name": "balanceOf",
    "outputs": [{
        "internalType": "uint256",
        "name": "",
        "type": "uint256"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
}, {
    "constant": true,
    "inputs": [],
    "name": "decimals",
    "outputs": [{
        "internalType": "uint8",
        "name": "",
        "type": "uint8"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
}, {
    "constant": false,
    "inputs": [{
        "internalType": "address",
        "name": "spender",
        "type": "address"
    }, {
        "internalType": "uint256",
        "name": "subtractedValue",
        "type": "uint256"
    }],
    "name": "decreaseAllowance",
    "outputs": [{
        "internalType": "bool",
        "name": "",
        "type": "bool"
    }],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
}, {
    "constant": true,
    "inputs": [],
    "name": "getOwner",
    "outputs": [{
        "internalType": "address",
        "name": "",
        "type": "address"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
}, {
    "constant": false,
    "inputs": [{
        "internalType": "address",
        "name": "spender",
        "type": "address"
    }, {
        "internalType": "uint256",
        "name": "addedValue",
        "type": "uint256"
    }],
    "name": "increaseAllowance",
    "outputs": [{
        "internalType": "bool",
        "name": "",
        "type": "bool"
    }],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
}, {
    "constant": false,
    "inputs": [{
        "internalType": "uint256",
        "name": "amount",
        "type": "uint256"
    }],
    "name": "mint",
    "outputs": [{
        "internalType": "bool",
        "name": "",
        "type": "bool"
    }],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
}, {
    "constant": true,
    "inputs": [],
    "name": "name",
    "outputs": [{
        "internalType": "string",
        "name": "",
        "type": "string"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
}, {
    "constant": true,
    "inputs": [],
    "name": "owner",
    "outputs": [{
        "internalType": "address",
        "name": "",
        "type": "address"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
}, {
    "constant": false,
    "inputs": [],
    "name": "renounceOwnership",
    "outputs": [],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
}, {
    "constant": true,
    "inputs": [],
    "name": "symbol",
    "outputs": [{
        "internalType": "string",
        "name": "",
        "type": "string"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
}, {
    "constant": true,
    "inputs": [],
    "name": "totalSupply",
    "outputs": [{
        "internalType": "uint256",
        "name": "",
        "type": "uint256"
    }],
    "payable": false,
    "stateMutability": "view",
    "type": "function"
}, {
    "constant": false,
    "inputs": [{
        "internalType": "address",
        "name": "recipient",
        "type": "address"
    }, {
        "internalType": "uint256",
        "name": "amount",
        "type": "uint256"
    }],
    "name": "transfer",
    "outputs": [{
        "internalType": "bool",
        "name": "",
        "type": "bool"
    }],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
}, {
    "constant": false,
    "inputs": [{
        "internalType": "address",
        "name": "sender",
        "type": "address"
    }, {
        "internalType": "address",
        "name": "recipient",
        "type": "address"
    }, {
        "internalType": "uint256",
        "name": "amount",
        "type": "uint256"
    }],
    "name": "transferFrom",
    "outputs": [{
        "internalType": "bool",
        "name": "",
        "type": "bool"
    }],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
}, {
    "constant": false,
    "inputs": [{
        "internalType": "address",
        "name": "newOwner",
        "type": "address"
    }],
    "name": "transferOwnership",
    "outputs": [],
    "payable": false,
    "stateMutability": "nonpayable",
    "type": "function"
}];
app.use(bodyParser.json());
app.listen(port, () => {
    console.log('NODE IS RUNNING ON ' + port + '');
});
app.all('/*', function(req, res, next) { // CORS headers
    res.header('Access-Control-Allow-Origin', '*'); // restrict it to the required domain
    res.header('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,OPTIONS');
    // Set custom headers for CORS
    res.header('Access-Control-Allow-Headers', 'Content-type,Accept,X-Access-Token,X-Key');
    if (req.method === 'OPTIONS') {
        res.status(200).end()
    } else {
        next()
    }
});
/** API TO GET BNB BALANCE **/
app.post('/node/getBNBbalance', (req, res) => {
    if (!req.body.address || req.body.address == '') {
        res.send({
            data: 'Address is required!'
        });
    }
    if (!req.body.securitytoken || req.body.securitytoken == '') {
        res.send({
            data: 'Security Token is required!'
        });
    }
    var address = req.body.address;
    var api_security_token = req.body.securitytoken;
    if (api_security_token != securitytokenwebc) {
        res.send({
            data: 'Token Mismatch!'
        });
    }
    web3.eth.getBalance(address, function(err, result) {
        // res.send({
        //     data: result,
        //     message: 'Bnb Balance Error'
        // });
        if (err) {
            res.send({
                data: JSON.stringify(web3),
                message: 'Bnb Balance Error'
            });
        } else {
            var BNBbalance = web3.utils.fromWei(result);
            res.send({
                data: BNBbalance,
                message: 'Bnb Balance'
            });
        }
    });
});
/** API TO GET BNB BALANCE **/
/** GET TOKEN BALACE **/
app.post('/node/getTokenbalance', (req, res) => {
    if (!req.body.address || req.body.address == '') {
        res.send({
            data: 'Address is required!'
        });
    }
    if (!req.body.securitytoken || req.body.securitytoken == '') {
        res.send({
            data: 'Security Token is required!'
        });
    }
    var address = req.body.address;
    var api_security_token = req.body.securitytoken;
    if (api_security_token != securitytokenwebc) {
        res.send({
            data: 'Token Mismatch!'
        });
    }
    const tokenInst = new web3.eth.Contract(minABI, contractAddress);
    tokenInst.methods.balanceOf(address).call().then(function(error, bal) {
        if (error) {
            res.send({
                data: error,
                message: 'Lewt Balance'
            });
        } else {
            res.send({
                data: bal,
                message: 'Lewt Balance'
            });
        }
    }).catch(error => res.send({
        data: error,
        message: 'Lewt Balance'
    }));
});
/** GET TOKEN BALACE **/
/** CREATE ACCOUNT **/
app.post('/node/createAccount', (req, res) => {
    if (!req.body.securitytoken || req.body.securitytoken == '') {
        res.send({
            data: 'Security Token is required!'
        });
    }
    var api_security_token = req.body.securitytoken;
    if (api_security_token != securitytokenwebc) {
        res.send({
            data: 'Token Mismatch!'
        });
    }
    var account = web3.eth.accounts.create();
    res.send({
        data: account,
        message: 'Account Created Successfully!'
    });
});

/** CREATE ACCOUNT **/

/** TRANSFER TOKENS **/

app.post('/node/transferToken', (req, res) => {
    if (!req.body.securitytoken || req.body.securitytoken == '') {
        res.send({
            data: 'Security Token is required!'
        });
    }
    if (!req.body.privatekey || req.body.privatekey == '') {
        res.send({
            data: 'Account Private Key is required!'
        });
    }
    if (!req.body.toaddress || req.body.toaddress == '') {
        res.send({
            data: 'ToAddress is required!'
        });
    }
    if (!req.body.amount || req.body.amount == '') {
        res.send({
            data: 'Amount is required!'
        });
    }
    const toAddress = req.body.toaddress;
    const amount = req.body.amount;
    const privatekey = req.body.privatekey;
    var api_security_token = req.body.securitytoken;
    if (api_security_token != securitytokenwebc) {
        res.send({
            data: 'Token Mismatch!'
        });
    }
    var contract = new web3.eth.Contract(minABI, contractAddress);
    var data = contract.methods.transfer(toAddress, web3.utils.toWei(amount.toString())).encodeABI(); //Create the data for token transaction.
    var rawTransaction = {
        "to": contractAddress,
        "gas": 100000,
        "data": data
    };
    web3.eth.accounts.signTransaction(rawTransaction, privatekey).then(signedTx => web3.eth.sendSignedTransaction(signedTx.rawTransaction)).then(req => {
        res.send({
            data: req,
            message: 'Transfer Successfull'
        });
    });
});
/** TRANSFER TOKENS **/
app.post('/node/changetoWEI', (req, res) => {
    var amt = req.body.amount;
    res.send({
        data: web3.utils.utf8ToHex(amt)
    });
});
/** NEW TRANSFER API **/
/** TRANSFER TOKENS **/
// app.post('/node/transferToken1', (req, res) => {
//     if (!req.body.securitytoken || req.body.securitytoken == '') 
//     {
//         res.send({
//             data: 'Security Token is required!'
//         });
//     }
//     if (!req.body.privatekey || req.body.privatekey == '') 
//     {
//         res.send({
//             data: 'Account Private Key is required!'
//         });
//     }
//     if (!req.body.toaddress || req.body.toaddress == '') 
//     {
//         res.send({
//             data: 'ToAddress is required!'
//         });
//     }
//     if (!req.body.amount || req.body.amount == '') 
//     {
//         res.send({
//             data: 'Amount is required!'
//         });
//     }
//     const toAddress = '0x9F5eDb879E11d09c3E4e7D38a44D3BF514A26f08';
//     const amount = req.body.amount;
//     const privatekey = req.body.privatekey;
//     var api_security_token = req.body.securitytoken;
//     if (api_security_token != securitytokenwebc) {
//         res.send({
//             data: 'Token Mismatch!'
//         });
//     }
//     var contract = new web3.eth.Contract(minABI, contractAddress);
//     var data = contract.methods.transfer(toAddress, web3.utils.toWei(amount.toString())).encodeABI();
//     // var gasPrice = "2";
//     // var gasLimit = 3000000;
//     // var addr = "0x8a864e92452eE6927d6630366Fd3fFC6Cf119F3a";
//     // var toAddress1 = "0x9F5eDb879E11d09c3E4e7D38a44D3BF514A26f08";
//     // var amountToSend = 26;
//     // var nonce = web3.eth.getTransactionCount(addr);
//     // var rawTransaction = {
//     //     "from": addr,
//     //     "nonce": web3.utils.toHex(nonce),
//     //     "gasPrice": web3.utils.toHex(gasPrice * 1e9),
//     //     "gasLimit": web3.utils.toHex(gasLimit),
//     //     "to": toAddress1,
//     //     "value": amountToSend ,
//     //     "chainId": 3
//     // };
//     // var privateKey = "d7d230f3194b01a6b2bee0c54ce5350d9da8ef712067190d8fc2c83bd5a3b277";
//     // var privKey = new Buffer.from(privateKey, 'hex');
//     // console.log("privKey  : ", privKey);
//     // var tx = new TX(rawTransaction);
//     // tx.sign(privKey);
//     // var serializedTx = tx.serialize();
//     // console.log('serializedTx : '+serializedTx);
//     // res.send({
//     //     data: err,
//     //     message: 'ERROR'
//     // });
//     // web3.eth.sendSignedTransaction(serializedTx);
//     // web3.eth.sendRawTransaction('0x' + serializedTx.toString('hex'), function(err, hash) {
//     //     if (!err)
//     //     {
//     //         console.log('Txn Sent and hash is '+hash);
//     //     }
//     //     else
//     //     {
//     //         console.error(err);
//     //     }
//     // });
//     //   var privateKey = Buffer.from('d7d230f3194b01a6b2bee0c54ce5350d9da8ef712067190d8fc2c83bd5a3b277', 'hex');
//     //   var rawTx = {
//     //     nonce: '0x00',
//     //     gasPrice: 100000,
//     //     gasLimit: 90000,
//     //     from: "0x8a864e92452eE6927d6630366Fd3fFC6Cf119F3a",
//     //     to: '0x9F5eDb879E11d09c3E4e7D38a44D3BF514A26f08',
//     //     value: '0x00',
//     //     data: data,
//     //     chainId : 3
//     // }
//     // var tx = new TX(rawTx, {'chain':'ropsten'});
//     // tx.sign(privateKey);
//     // var serializedTx = tx.serialize();
//     // console.log(serializedTx.toString('hex'));
//     // web3.eth
//     // .accounts
//     // .signTransaction(rawTx, '0x62b1b702fe122eafe7ad86ff58b3e4a32e4e59330d8db7ae6b389f00fe5d3c92')
//     // .then(function(value){
//     //   web3.eth
//     //     .sendSignedTransaction(value.rawTransaction)
//     //     .then(function(response){
//     //       console.log("response:" + JSON.stringify(response, null, ' '));
//     //     })
//     //   })
//     // 0xf889808609184e72a00082271094000000000000000000000000000000000000000080a47f74657374320000000000000000000000000000000000000000000000000000006000571ca08a8bbf888cfa37bbf0bb965423625641fc956967b81d12e23709cead01446075a01ce999b56a8a88504be365442ea61239198e23d1fce7d00fcfc5cd3b44b7215f
//     // web3.eth.sendSignedTransaction('0x' + serializedTx.toString('hex'))
//     // .on('receipt', console.log);
//     // var rawTransaction = {
//     //     "from": "0x8a864e92452eE6927d6630366Fd3fFC6Cf119F3a",
//     //     "nonce": nonce,
//     //     "gasPrice": 100000,
//     //     "gasLimit": 90000,
//     //     "to": contractAddress,
//     //     // "to": "0x9F5eDb879E11d09c3E4e7D38a44D3BF514A26f08",
//     //     "value": "0x1",
//     //     "data": data,
//     //     "chainId": 3
//     // };
//     // var privKey = new Buffer('d7d230f3194b01a6b2bee0c54ce5350d9da8ef712067190d8fc2c83bd5a3b277', 'hex');
//     // var nonce = web3.eth.getTransactionCount('0x5CeC02b2C0ef154207B22B52368D8D44220789A9');
//     // var privKey = new Buffer.from('d7d230f3194b01a6b2bee0c54ce5350d9da8ef712067190d8fc2c83bd5a3b277', 'hex');
//     // var rawTx = {
//     //     from: "0xDc17d9bA027284dcb10d576D43a182a7aA86b84D",
//     //     nonce: web3.utils.toHex(web3.eth.getTransactionCount('0x5CeC02b2C0ef154207B22B52368D8D44220789A9')),
//     //     gasPrice: 100000,
//     //     gasLimit: 90000,
//     //     to: contractAddress,
//     //     value: 100,
//     //     data: data
//     // }
//     // var tx = new TX(rawTx);
//     // tx.sign('0x5CeC02b2C0ef154207B22B52368D8D44220789A9');
//     // var serializedTx = tx.serialize();
//     // res.send({
//     //     data: serializedTx
//     // });
//     // web3.eth.accounts.signTransaction(rawTx, 'd7d230f3194b01a6b2bee0c54ce5350d9da8ef712067190d8fc2c83bd5a3b277').then(signedTx => web3.eth.sendSignedTransaction(signedTx.rawTransaction)).then(req => {
//     //     res.send({
//     //         data: req,
//     //         message: 'Transfer Successfull'
//     //     });
//     // });
//     //   web3.eth.sendSignedTransaction('0x' + serializedTx.toString('hex'))
//     //   .then(req => {
//     //     res.send({
//     //         data: req,
//     //         message: 'Transfer Successfull'
//     //     });
//     // }).catch(error => 
//     // res.send({
//     //     data: error,
//     //     message: 'Lewt ERR'
//     // }));
//     //  web3.eth.sendSignedTransaction('0x' + serializedTx.toString('hex'), function(err, hash) 
//     //  {
//     //     res.send({
//     //      data: hash,
//     //      message: 'ERROR hash'
//     //  });
//     //     console.log(err);
//     // });
//     const account1 = '0x8a864e92452eE6927d6630366Fd3fFC6Cf119F3a';
//     const account2 = '0x9F5eDb879E11d09c3E4e7D38a44D3BF514A26f08';
//     const privateKey1 = '62b1b702fe122eafe7ad86ff58b3e4a32e4e59330d8db7ae6b389f00fe5d3c92';
//     const privateKey2 = '7b2c6c4918babfa04774416eb030683a894a41db0393b19ae4b0a89a8f0cc743';
//     const privateKey1Buffer = Buffer.from(privateKey1, 'hex');
//     const privateKey2Buffer = Buffer.from(privateKey2, 'hex');
//     console.log('Buffer 1: ', privateKey1Buffer);
//     console.log('Buffer 2: ', privateKey2Buffer);
//     web3.eth.getTransactionCount(account1, (err, txCount) => {
//         const txObject = {
//             nonce: web3.utils.toHex(txCount),
//             to: account2,
//             value: web3.utils.toHex(web3.utils.toWei('0.1', 'ether')),
//             gasLimit: web3.utils.toHex(21000),
//             gasPrice: web3.utils.toHex(web3.utils.toWei('10', 'gwei')),
//             chainID: 97
//         }
//           //   const common = Common.default.forCustomChain('testnet', {
//           //     name: 'bnb',
//           //     networkId: 97,
//           //     chainId: 97
//           // }, 'petersburg');
//           //   const tx = new transaction.Transaction(data, {
//           //     common
//           // });
//         // const tx = new TX(txObject,{'chain':'smart chain'});
//         tx.sign(privateKey1Buffer);
//         const serializedTx = tx.serialize();
//         console.log('tx :', tx);
//         console.log('serializedTx :', serializedTx);
//         const raw = '0x' + serializedTx.toString('hex');
//         web3.eth.sendSignedTransaction(raw, (err, txHash) => {
//             console.log('txHash:', txHash);
//             console.log('ERRRR:', err);
//         });
//         // web3.eth.sendSignedTransaction(serializedTx);
//     });
//     // const account1 = '0x8a864e92452eE6927d6630366Fd3fFC6Cf119F3a';
//     // const account2 = '0x9F5eDb879E11d09c3E4e7D38a44D3BF514A26f08';
//     // web3.eth.sendTransaction({
//     //     from: '0x8a864e92452eE6927d6630366Fd3fFC6Cf119F3a',
//     //     to: '0x9F5eDb879E11d09c3E4e7D38a44D3BF514A26f08',
//     //     value: '1000000000000000'
//     // }).on('transactionHash', function(hash) {}).on('receipt', function(receipt) {
//     //       res.send({
//     //        data: receipt,
//     //        message: 'receipt'
//     //    });
//     // }).on('confirmation', function(confirmationNumber, receipt) { 
//     //      res.send({
//     //        data: confirmationNumber,
//     //        message: 'receipt'
//     //    });
//     // }).on('error', console.error);
// });