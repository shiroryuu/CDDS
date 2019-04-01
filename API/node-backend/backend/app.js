const express = require('express');
const { google } = require('googleapis');
const path = require('path');
const readline = require('readline');
const fs = require('fs');
const opn  = require('opn');

const drive = require('./drive');
const chunk = require('./chunk');
const app = express();


const TOKEN_PATH = 'token.json';
const SCOPES = ['https://www.googleapis.com/auth/drive'];

const keyfile = path.join(__dirname, 'credentials.json');
const keys = JSON.parse(fs.readFileSync(keyfile));

const oAuth2Client = new google.auth.OAuth2(
    keys.web.client_id,
    keys.web.client_secret,
    keys.web.redirect_uris[0]
);

// const authUrl = oAuth2Client.generateAuthUrl({
    // access_type: 'offline',
    // scope: SCOPES,
// });

//HTTP Headers
app.use((req,res,next) => {
    res.setHeader("Access-Control-Allow-Origin","*");
    res.setHeader(
      "Access-Control-Allow-Headers",
      "Origin, X-Requested-With, Content-Type, Accept");
    res.setHeader(
      "Access-Control-Allow-Methods",
      "GET,POST,PATCH,PUT,DELETE,OPTIONS");
    next();
});

//Routes
app.get('/oauthcallback', (req, res) => {
  const code = req.query.code;
  console.log(code);
  oAuth2Client.getToken(code, (err, token) => {
    if (err) {
      console.error('Error getting oAuth tokens:');
      throw err;
    }
    oAuth2Client.credentials = token;
    console.log(token);
    res.send('Authentication successful! Please return to the console.');
    fs.writeFile(TOKEN_PATH, JSON.stringify(token), (err) => {
        if (err) console.error(err);
        console.log('Token stored to', TOKEN_PATH);
    });
  });
});

//return the list of files
app.get("/files",(req,res,next)=>{
    checkAccessToken(drive.listFiles,(resData)=>{
      let files = [];
      resData.map((file) =>{
        files.push({
              name: file.name,
              id: file.id,
              mimeType: file.mimeType
            });
      });
      res.status(200).json({
        files
      })
    });
});

app.get("/upload/:filename" ,(req,res,next)=>{
  const filename = req.params.filename;
  checkAccessToken(drive.uploadFile,filename, fileID=>{
    res.status(200).json({
      fileid: fileID
    });
  });
})

//download a file
app.get("/files/:file_id",(req,res,next)=>{
  const fileID = req.params.file_id;
  console.log(fileID);
  checkAccessToken(drive.downloadFiles,fileID,(resData)=>{
    res.status(200).json({
      message: "successfull",
      file: {
        name: resData.filename,
        path: resData.filepath
      }
  });
  });
});

app.get("/chunks/:filename", (req,res,next)=>{
  const filename = req.params.filename;
  chunk.chunking(filename,(chunk_hash)=>{
    res.status(200).json({
      hash: chunk_hash
    });
  });
});

//functions 
function checkAccessToken(callback,fileID,cb){  
  fs.readFile(TOKEN_PATH, (err, token) => {
    // if (err) return getAccessToken(oAuth2Client, callback);
    if (err) return getAccessToken();
    oAuth2Client.setCredentials(JSON.parse(token));
    callback(oAuth2Client,fileID,cb);
  });
}

// function getAccessToken(oAuth2Client, callback, cb){
function getAccessToken(){
  const authUrl = oAuth2Client.generateAuthUrl({
    access_type: 'offline',
    scope: SCOPES,
  });
  // console.log('Authorize this app by visiting this url:', authUrl);
  opn(authUrl, {wait: false} );

  // callback(oAuth2Client)
  // const rl = readline.createInterface({
  //   input: process.stdin,
  //   output: process.stdout,
  // });
  // rl.question('Enter the code from that page here: ', (code) => {
  //   rl.close();
  //   oAuth2Client.getToken(code, (err, token) => {
  //     if (err) return console.error('Error retrieving access token', err);
  //     oAuth2Client.setCredentials(token);
  //     console.log(token);
  //     // Store the token to disk for later program executions
  //     fs.writeFile(TOKEN_PATH, JSON.stringify(token), (err) => {
  //       if (err) console.error(err);
  //       console.log('Token stored to', TOKEN_PATH);
  //     });
  //     callback(oAuth2Client,cb);
  //   });
  // });
}
module.exports = app;