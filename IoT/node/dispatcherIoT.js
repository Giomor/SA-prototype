// index.js

const http = require('http');
const url = require('url');
const mqtt = require('mqtt');
// declare server variables
const hostname = '127.0.0.1';
const port = 1337;
const client=mqtt.connect("mqtt://127.0.0.1");
const server = http.createServer((req, res) => {
  
  
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/plain');
  const queryObject = url.parse(req.url, true).query;
  
  client.publish("signal/"+queryObject.uid,'{"UID":22,"DevID":'+queryObject.devid+'}');
  //console.log("signal/"+queryObject.devid+""+queryObject.uid);
  res.end('');
});

server.listen(port, hostname, () => {
  console.log(`Server is running at http://${hostname}:${port}/`);
});
