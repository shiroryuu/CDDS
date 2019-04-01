const fs = require('fs');
const path = require('path');
const crypto = require('crypto');


var location = path.join("backend/Files");

function getFilesizeInBytes(filename) {
    var stats = fs.statSync(filename)
    var fileSizeInBytes = stats["size"]
    return fileSizeInBytes
}

function chunking(filename, callback){
    let chunks = [];
    let file = location+'/'+filename;
    let stream = fs.createReadStream(file, { highWaterMark: 1024*1024 });
    let hash = crypto.createHash('sha1');

    stream.on("error", err =>{
        // return cb(err);
        console.log(err);
    });

    stream.on("data", chunk =>{
        hash.update(chunk);
    });
    
    stream.on("end", ()=>{
        // const finalhash = hash.digest('hex');
        return callback(hash.digest('hex'));
    });
}


module.exports = { chunking };
