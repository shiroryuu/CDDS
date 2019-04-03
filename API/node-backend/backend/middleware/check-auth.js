const path = require('path');
const fs = require('fs');
const { google } = require('googleapis');
const SCOPES = ['https://www.googleapis.com/auth/drive'];

const keyfile = path.join(__dirname,'/../', 'credentials.json');
const keys = JSON.parse(fs.readFileSync(keyfile));
const oAuth2Client = new google.auth.OAuth2(
    keys.web.client_id,
    keys.web.client_secret,
    keys.web.redirect_uris[0]
);
module.exports = (req,res,next)=>{
    try {
        const token_type = req.headers.authorization.split(" ")[0];
        const token = req.headers.authorization.split(" ")[1];
        const expDate = +req.headers.authorization.split(" ")[2];
        oAuth2Client.setCredentials({access_token: token, token_type,scope: SCOPES[0],expiry_date: expDate });
        // console.log(oAuth2Client);
        req.authClient = oAuth2Client;
        // req.auth = oAuth2Client;
        // console.log(token);
        next();
    }
    catch(error) {
        console.log(error);
    }
}