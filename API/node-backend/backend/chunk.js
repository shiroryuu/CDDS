const fs = require('fs');
const path = require('path');
const sha1 = require ('js-sha1');


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

    stream.on("error", err =>{
        // return cb(err);
        console.log(err);
    });

    stream.on("data", chunk =>{
        // console.log(sha1(chunk));
        chunks.push(sha1(chunk));
    });
    
    stream.on("end", ()=>{
        // console.log(`The hash of array is ${sha1(chunks)}`);
        // console.log(chunks);
        // console.log(`Total chunks is ${chunks.length}`);
        //return callback(chunks,sha1(chunks));
        return callback(sha1(chunks));
    });
}


module.exports = { chunking };
