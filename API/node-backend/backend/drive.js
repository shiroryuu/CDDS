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
        // files.map((file) => {
        //   console.log(`${file.name} (${file.id}) [${file.mimeType}]`);
        // });
      } else {
        console.log('No files found.');
      }
    });
}


function downloadFiles(auth,fileId,cb){
    const drive = google.drive('v3');
    const filename = uuid.v4();
    const filepath = path.join(FILES_PATH, filename);

    let dest = fs.createWriteStream(filepath);
    drive.files.get({
        auth: auth,
        fileId: fileId
        // alt: 'media'
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

module.exports = { listFiles,downloadFiles }