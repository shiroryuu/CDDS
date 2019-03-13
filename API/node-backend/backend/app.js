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
app.get('/oauth2callback', (req, res) => {
  const code = req.query.code;
  client.getToken(code, (err, tokens) => {
    if (err) {
      console.error('Error getting oAuth tokens:');
      throw err;
    }
    client.credentials = tokens;
    res.send('Authentication successful! Please return to the console.');
    server.close();
    drive.listFiles(client);
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
  chunk.chunking(filename,(chunk_arr,chunk_hash)=>{
    res.status(200).json({
      chunks: chunk_arr,
      hash: chunk_hash
    });
  });
});


//functions 
function checkAccessToken(callback,fileID,cb){
  const {client_secret, client_id, redirect_uris} = keys.installed;
  const oAuth2Client = new google.auth.OAuth2(
    client_id, client_secret, redirect_uris[0]
  );
  
  fs.readFile(TOKEN_PATH, (err, token) => {
    if (err) return getAccessToken(oAuth2Client, callback);
    oAuth2Client.setCredentials(JSON.parse(token));
    callback(oAuth2Client,fileID,cb);
  });
}

function getAccessToken(oAuth2Client, callback){
  const authUrl = oAuth2Client.generateAuthUrl({
    access_type: 'offline',
    scope: SCOPES,
  });
  console.log('Authorize this app by visiting this url:', authUrl);
  opn(authUrl, {wait: false});
  const rl = readline.createInterface({
    input: process.stdin,
    output: process.stdout,
  });
  rl.question('Enter the code from that page here: ', (code) => {
    rl.close();
    oAuth2Client.getToken(code, (err, token) => {
      if (err) return console.error('Error retrieving access token', err);
      oAuth2Client.setCredentials(token);
      // Store the token to disk for later program executions
      fs.writeFile(TOKEN_PATH, JSON.stringify(token), (err) => {
        if (err) console.error(err);
        console.log('Token stored to', TOKEN_PATH);
      });
      callback(oAuth2Client);
    });
  });
}
module.exports = app;