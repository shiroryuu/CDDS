# CDDS
CDDS (Cloud De-Duplication using SHA1) is an effort to reduce deduplication in cloud storage using third party services like google drive, dropbox, nextcloud etc.

## Inspiration

This project was made for our final year university project. Proprietary storage service providers like google drive, one drive do not use deduplication on a block level this results in reduced reduced free space as the duplicate data adds to the storage quota. This project overcomes the issues this issue as it will not upload the file twice on the storage server.

## Approach used

This project makes use of the middleware approach, it acts as bridge between the user(client) and the storage(server).

## Technologies Used

* nodejs (Main API)
* googleapis (G-Drive REST API)
* bootstrap (Frontend Theme)
* php (controller)
* mariadb (Database)
* Insomnia (Http client)
 

## Installation

Since this project relies on nodejs, you need to install the dependencies first:

```console
$ cd API/node-backend/
$ npm install
```

Download the API credentials from the google developers console and paste it on `API/node-backend/credentials.json` make sure the file name is `credentials.json`

## Running

```console
$ cd API/node-backend
$ node server.js
```
The nodejs API is completly independent of the frontend and the php controller. you can test the application using `curl` or http client like insomnia or postman

Example:
the Following command will fetch the files from your GDrive.

```console
$ curl http://localhost:3000/files
```
Note: The first time you will be prompted to signin with your account. So you might need to send the request again after loggin in with your google account.
## Contributors

* Arvind Hariharan Nair [:email:](mailTo:arvindhn602@gmail.com)
	* [Github profile](https://github.com/arvindnair001)
	* Contributions
		- REST API module
		- drive module
		- chunking and hashing module
* Shrey Jakhmola [:email:](mailTo:jakhmolashrey@gmail.com)
	* [Github profile](https://github.com/blu-dragon)
	* Contributions
		- php controller
		- Database Design
		- Frontend

## Ideas

We have completed the project and moved on with other projects. Even though we are out of time, we still have plenty of ideas that we wanted to implement, but couldn't do so due to time limit that was alloted to this project. 

- [ ] Integrate Drive UI with the application
- [ ] Add options for cloud storage like dropbox,onedrive, nextcloud etc.
- [x] Multiuser support. (feature branch)

## Resources

*   [Google Drive Rest API](https://developers.google.com/drive/api/v3/about-sdk)
*   [Nodejs Documentation](https://nodejs.org/api/)

