const express = require('express')
const https = require('https')
const http = require('http')
const cors = require('cors')
const bodyParser = require('body-parser')
const sendMail = require('./mail')

const app = express()

app.use(bodyParser.json())
app.use(cors())

http.createServer(app).listen(5000)
https.createServer(app).listen(5443)

app.get('/', (req, res) => {
  res.json({
    message: 'Express server'
  });
});

app.post('/mail', (req, res) => {
  sendMail(req, res)
});
