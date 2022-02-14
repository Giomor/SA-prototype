// index.js


import { parse } from 'url';
import { connect } from 'mqtt';
import express from 'express';
// declare server variables
const hostname = '127.0.0.1';
const port = 1337;
const client=connect("mqtt://127.0.0.1");
var app=express();
app.get("/iotrequest",(req,res)=>{
  const queryObject = parse(req.url, true).query;
  client.publish("signal/"+queryObject.uid,'{"UID":'+queryObject.uid+',"DevID":'+queryObject.devid+'}');
  res.status(200);
  res.send(null);
});
app.listen( port ,hostname,()=>{
  console.log(port);
});