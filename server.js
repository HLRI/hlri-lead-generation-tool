let fs = require('fs');
const express = require('express');
const app = express();

const server = require('http').createServer(app);

const io = require('socket.io')(server, {
    cors: { origin: "*" }
});

io.on('connection', (socket) => {

    var dataJson = [];

    console.log('Connected');

    socket.on('sendDataToServer', (data) => {
        if(data != null){
            dataJson = dataJson.concat(data);
        }
    })

    socket.on('disconnect', (socket) => {

        if(dataJson != null){
            fs.writeFile("data.json", JSON.stringify(dataJson), function (err) {
                if (err) {
                    console.log(err);
                }
            });
        }

        console.log('Disconnected');
    })
});

server.listen(3000, () => {
    console.log('server is running!');
});