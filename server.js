const https = require('https');
let fs = require('fs');
const express = require('express');
const axios = require('axios');
const app = express();

const server = require('http').createServer(app);

const io = require('socket.io')(server, {
    cors: { origin: "*" }
});

let usersData = {};
let userAgentData = {};

io.on('connection', (socket) => {

    console.log('Connected:', socket.id);

    usersData[socket.id] = [];
    userAgentData[socket.id] = [];

    socket.on('sendDataToServer', (data) => {
        if (data != null) {
            usersData[socket.id] = usersData[socket.id].concat(data);
        }
    });

    socket.on('userAgent', (data) => {
        if (data != null) {
            userAgentData[socket.id] = data;
        }
    });

    socket.on('disconnect', () => {

        const userData = usersData[socket.id];
        if (userData != null) {
            fs.writeFile(`./public/dataset/${socket.id}.json`, JSON.stringify(userData), function (err) {
                if (err) {
                    console.log(err);
                } else {
                    var url = userAgentData[socket.id].url;
                    var session = socket.id;
                    var os = userAgentData[socket.id].os;
                    var device = userAgentData[socket.id].device;
                    var size = userAgentData[socket.id].size;
                    var browser = userAgentData[socket.id].browser;
                    var country = '-';
                    var api = 'https://services-marketing.test/api/v1/record-tools/store?url=' + url + '&session=' + session + '&os=' + os + '&device=' + device + '&size=' + size + '&browser=' + browser + '&country=' + country;

                    const agent = new https.Agent({
                        rejectUnauthorized: false
                    });
                    axios.get(api, { httpsAgent: agent })
                        .then(response => {
                            console.log(response.data);
                        })
                        .catch(error => {
                            console.log(error);
                        });
                }
            });
        }
        console.log('Disconnected:', socket.id);
        delete usersData[socket.id];
    });
});

server.listen(3000, () => {
    console.log('server is running!');
});
