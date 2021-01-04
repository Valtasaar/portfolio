const express = require('express')
const cors = require('cors')
const bodyParser = require('body-parser')
const sendMail = require('./mail')

const app = express()

app.use(bodyParser.json())
app.use(cors())

const port = process.env.PORT || 5000

app.listen(port, () => {
  console.log(`Server started on port ${port}`);
})

app.get('/', (req, res) => {
  res.json({
    message: 'Express server'
  });
});

app.post('/mail', (req, res) => {
  sendMail(req, res)
});
