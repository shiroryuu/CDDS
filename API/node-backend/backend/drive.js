const fs = require('fs');
const {google} = require('googleapis');
const path = require('path');
const uuid = require('uuid');

const FILES_PATH = path.join(__dirname,'./Files');
  
function listFiles(auth,cb) {
    const drive = google.drive({version: 'v3', auth});
    // drive.files.list({
    //   pageSize: 20,
    //   fields: 'nextPageToken, files(id, name, mimeType)',
    // }, (err, res) => {
    drive.files.list({
      fields: 'nextPageToken, files(id, name, mimeType)'
    }, (err, res) => {
      if (err) return console.log('The API returned an error: ' + err);
      const files = res.data.files;
      if (files.length) {
        // console.log('Files:');
        return cb(files);
      } else {
        console.log('No files found.');
      }
    });
}


function searchMimeType(auth,fileId,cb){
  const drive = google.drive('v3');
  drive.files.get({
      auth: auth,
      fileId: fileId,
  },{responseType: 'json'},
  function(err, res){
    return cb(res);
  });
}

function downloadFiles(auth,fileId,cb){
    const drive = google.drive('v3');
    const filename = uuid.v4();
    const filepath = path.join(FILES_PATH, filename);
    let dest = fs.createWriteStream(filepath);
    searchMimeType(auth,fileId,(result)=>{
      const mimeType = result.data.mimeType.split('/')[1].startsWith("vnd.google-apps");
      console.log(mimeType);
      if (mimeType){
        //download docs
        drive.files.export({
          auth: auth,
          fileId:fileId,
          mimeType: 'application/pdf'
        },{responseType: 'stream'},
        function(err,res){
          res.data
          .on('end', () => {
            console.log('Done downloading document.');
            return cb({filename,FILES_PATH});
           
          })
          .on('error', err => {
            console.error('Error downloading document.');
            
          })
          .pipe(dest);
        });
      } else {
        drive.files.get({
        auth: auth,
        fileId: fileId,
        alt: 'media'
        },{responseType: 'stream'},
        function(err, res){
        console.log(res);
        res.data
          .on('end', () => {
            console.log('Done');
            return cb({filename,FILES_PATH});
          })
          .on('error', err => {
            console.log('Error', err);
            return cb(err);
          })
          .pipe(dest);
        });
      }
    });
}


module.exports = { listFiles,downloadFiles }