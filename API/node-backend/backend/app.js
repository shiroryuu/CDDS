const express = require('express');
const { google } = require('googleapis');
const path = require('path');
const readline = require('readline');
const fs = require('fs');
// const opn  = require('opn ');

const drive = require('./drive');
const chunk = require('./chunk');
const app = express();

const keyfile = path.join(__dirname, 'credentials.json');

const TOKEN_PATH = 'token.json';
const keys = JSON.parse(fs.readFileSync(keyfile));
const SCOPES = ['https://www.googleapis.com/auth/drive'];

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

const {client_secret, client_id, redirect_uris} = keys.installed;

// client = new google.auth.OAuth2(
//   keys.client_id,
//   keys.client_secret,
//   keys.redirect_uris
// );

// const authorizeUrl = client.generateAuthUrl({
//   access_type: 'offline',
//   scope: SCOPES,
// });



//Routes
app.use("/hello",(req,res,next)=>{
    console.log("hello");
    res.send("Hello ");
});

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

app.get("/files",(req,res,next)=>{
    //return the list of files
    // drive.listFiles();

    checkAccessToken(drive.listFiles);
    
    // drive.onInit(drive.listFiles, ()=>{
    //   res.status(200).json("successfull");
    // });
});

app.get("/files/:file_id",(req,res,next)=>{
  const fileID = req.params.file_id;
  console.log(fileID);
  res.status(200).json("successfull");
  //call Download function with the fileID
});


app.get("/chunks/:filename", (req,res,next)=>{
  const filename = req.params.filename;
  chunk.chunking(filename,(chunk_arr,chunk_hash)=>{
    // console.log(chunk_arr);
    // console.log(chunk_hash);
    res.status(200).json({
      chunks: chunk_arr,
      hash: chunk_hash
    });
  });
});

// app.get("/",(req,res,next)=>{
//     //fetch list of files
// });


//functions 
function checkAccessToken(callback){
  const oAuth2Client = new google.auth.OAuth2(
    client_id, client_secret, redirect_uris[0]
  );
  
  fs.readFile(TOKEN_PATH, (err, token) => {
    if (err) return getAccessToken(oAuth2Client, callback);
    oAuth2Client.setCredentials(JSON.parse(token));
    callback(oAuth2Client);
  });
}

function getAccessToken(oAuth2Client, callback){
  const authUrl = oAuth2Client.generateAuthUrl({
    access_type: 'offline',
    scope: SCOPES,
  });
  console.log('Authorize this app by visiting this url:', authUrl);
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