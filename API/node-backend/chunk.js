const fs = require('fs');
const sha1 = require ('js-sha1');
//const crypto = require('crypto');
const home = '/home/arvind/Documents/BE Project/Cloud/Downloads'

var stream;
var file = `${home}/ch4_image_transforms.pdf`;
var fileSize = getFilesizeInBytes(file);
let chunks = [];

// console.log('file size is : ',fileSize); // file size
console.log(`file size is ${fileSize} B`);


// stream = fs.createReadStream(file, { highWaterMark: 128 * 1024 });
stream = fs.createReadStream(file, { highWaterMark: 1024*1024 });
console.log(`chunk size is 1MB`);
//var hash = crypto.createHash('sha1');
//hash.setEncoding('hex');


stream.on('error', err => {
    return cb(err);
});

stream.on("data", chunk=> {
    //console.log(chunk);
    // console.log(chunk.toString());
    console.log(sha1(chunk));
    chunks.push(sha1(chunk));
}); 
// console.log('hello');

stream.on("end", end=>{
    //console.log('end');
    console.log(`Hash of the array is ${ sha1(chunks)}`);
    console.log(`Total chunks is ${chunks.length}`)
});

function getFilesizeInBytes(filename) {
    var stats = fs.statSync(filename)
    var fileSizeInBytes = stats["size"]
    return fileSizeInBytes
}
