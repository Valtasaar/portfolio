const nodemailer = require('nodemailer');

const sendMail = async (req, res) => {
  let transporter = nodemailer.createTransport({
    host: "mail.hostland.ru",
    port: 465,
    secure: true,
    auth: {
      user: "info@daniweb.ru",
      pass: "Ejv7npuFSq"
    }
  });

  try {
    transporter.sendMail({
      from: 'info@daniweb.ru',
      to: 'daniil.kirien@gmail.com',
      subject: "Contact form",
      text: req.body.text,
      html: `
        <p>${req.body.text}</p> 
        <div>From: ${req.body.name}</div>
        <div>Email: ${req.body.email}</div>`
    })

    res.status(200).json({
      body: req.body
    })
  } catch (err) {
    console.log(err)
    res.status(500).json({
      error: err
    })
  }
}

module.exports = sendMail;
