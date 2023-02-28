const express = require("express");
const app = express()
const bodyParser = require('body-parser')
const server = require("http").Server(app)
var cookieParser = require('cookie-parser')
app.use(cookieParser())
app.use(bodyParser.json())
app.set("view engine", "ejs")
app.set('views', __dirname + '/views');
app.use(express.static("public"))
app.use(express.urlencoded({extended:true}))
const nodemailer = require('nodemailer');
const cors = require('cors')({origin: true});

var admin = require("firebase-admin");
var serviceAccount = require("./scamshield-6f2b3-firebase-adminsdk-9b9cg-840668932b.json");
admin.initializeApp({
  credential: admin.credential.cert(serviceAccount),
  databaseURL: "https://scamshield-6f2b3-default-rtdb.firebaseio.com"
});
var db = admin.firestore();
let adminRef = db.collection("admin")
let users = db.collection("users")
let reports = db.collection("reports")


var transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
      user: 'scamshieldhq@gmail.com',
      pass: 'btnkfojieskjiftx'
    }
});

app.get("/", (req, res) => {

    res.render("index");
});
app.post('/api/admin-login', async (req, res)=>{
    const { uname, pword } = req.body
    adminRef.where("uname", "==", uname).where("pword", "==", pword).get().then((querySnapshot) => {
        if(querySnapshot.empty){
            return res.json ({ status: 'error', error: 'Invalid Username/Password'})
        }else{
            return res.json ({ status: 'ok', error: 'Valid Username/Password'})
        }
    })
});
app.get("/dashboard", (req, res) => {
    reports.get().then((querySnapshot) => {
        var id = querySnapshot.docs.map((doc) => ({data: doc.data(), id: doc.id}));
        const objectToArrayx = Object.entries(id)
        var datax = new Map(objectToArrayx)
        users.get().then((querySnapshot) => {
            var idx = querySnapshot.docs.map((doc) => ({data: doc.data(), id: doc.id}));
            const objectToArrayxx = Object.entries(idx)
            var dataxx = new Map(objectToArrayxx)

            reports.where("status", "==", "NV").get().then((querySnapshot) => {
                var nv = querySnapshot.docs.map((doc) => ({data: doc.data(), id: doc.id}));
                const objectToArrayxa = Object.entries(nv)
                var dataxa = new Map(objectToArrayxa)
                res.render('dashboard', {resultr: datax, resultd:dataxx, resultnv: dataxa});
            })


            
        })  
    })  
});
app.get("/view-report", (req, res) => {
    reports.get().then((querySnapshot) => {
        var id = querySnapshot.docs.map((doc) => ({data: doc.data(), id: doc.id}));
        const objectToArrayx = Object.entries(id)
        var datax = new Map(objectToArrayx)
        res.render('view-report', {result: datax});
    })  
});
app.get("/view-report/delete/", (req, res) => {
    const id = req.query.id;
    reports.doc(id).delete().then(() =>{
        res.redirect('/success') 
    });
    
});

app.get("/view-report/approve/", (req, res) => {
    const id = req.query.id;
    const email = req.query.email;
    var mailOptions = {
        from: 'scamshieldhq@gmail.com',
        to: email,
        subject: 'Scam Shield Report Approval',
        html: '<body class="" style="background-color: #eaebed; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; "> <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body"> <tr> <td>&nbsp;</td> <td class="container" style=" display: block; Margin: 0 auto !important; /* makes it centered */ max-width: 580px; padding: 10px; width: 580px; "> <div class="header" style="padding: 20px 0;"> <table style=" border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%; } table td { font-family: sans-serif; font-size: 14px; vertical-align: top; " role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td class="align-center" width="100%"> <a href="#"><img style=" border: none; -ms-interpolation-mode: bicubic; max-width: 100%;" src="https://i.ibb.co/2MTsWPc/introimg.png" height="40" alt="Postdrop"></a> </td> </tr> </table> </div> <div class="content"> <!-- START CENTERED WHITE CONTAINER --> <table role="presentation" class="main" style=" background: #ffffff; border-radius: 3px; width: 100%; "> <!-- START MAIN CONTENT AREA --> <tr> <td class="wrapper" style="box-sizing: border-box; padding: 20px; "> <table role="presentation" border="0" cellpadding="0" cellspacing="0"> <tr> <td> <h2 style="color: #06090f; font-family: sans-serif; font-weight: 400; line-height: 1.4; margin: 0; margin-bottom: 30px; ">Thank your for using Scam Shield to report fraudulent activities. <br>Your report has been Approved! </h2> <p style="line-height: 1.6em;font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px; ">Keep using Scam Shield <br> </p> </td> </tr> </table> </td> </tr> <!-- END MAIN CONTENT AREA --> </table> <!-- START FOOTER --> <!-- END FOOTER --> <!-- END CENTERED WHITE CONTAINER --> </div> </td> <td>&nbsp;</td> </tr> </table> </body></html>'
      };

    reports.doc(id).update({status: "VERIFIED"}).then(() =>{
        transporter.sendMail(mailOptions, function(error, info){
            if (error) {
              console.log(error);
            } else {
              console.log('Email sent: ' + info.response);
              res.redirect('/success') 
            }
          });
        
    }); 
});

app.get("/view-report/disapprove/", (req, res) => {
    const id = req.query.id;
    const email = req.query.email;
    var mailOptions = {
        from: 'scamshieldhq@gmail.com',
        to: email,
        subject: 'Scam Shield Report Disapproval',
        html: '<body class="" style="background-color: #eaebed; font-family: sans-serif; -webkit-font-smoothing: antialiased; font-size: 14px; line-height: 1.4; margin: 0; padding: 0; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; "> <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body"> <tr> <td>&nbsp;</td> <td class="container" style=" display: block; Margin: 0 auto !important; /* makes it centered */ max-width: 580px; padding: 10px; width: 580px; "> <div class="header" style="padding: 20px 0;"> <table style=" border-collapse: separate; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; width: 100%; } table td { font-family: sans-serif; font-size: 14px; vertical-align: top; " role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%"> <tr> <td class="align-center" width="100%"> <a href="#"><img style=" border: none; -ms-interpolation-mode: bicubic; max-width: 100%;" src="https://i.ibb.co/2MTsWPc/introimg.png" height="40" alt="Postdrop"></a> </td> </tr> </table> </div> <div class="content"> <!-- START CENTERED WHITE CONTAINER --> <table role="presentation" class="main" style=" background: #ffffff; border-radius: 3px; width: 100%; "> <!-- START MAIN CONTENT AREA --> <tr> <td class="wrapper" style="box-sizing: border-box; padding: 20px; "> <table role="presentation" border="0" cellpadding="0" cellspacing="0"> <tr> <td> <h2 style="color: #06090f; font-family: sans-serif; font-weight: 400; line-height: 1.4; margin: 0; margin-bottom: 30px; ">Thank your for using Scam Shield to report fraudulent activities. <br>Your report has been disapproved. After all our verification process, we could not find an authentic proof to support your request. If you have any question or would like to provide more proof, do well to message us at scamshieldhq@gmail.com </h2> <p style="line-height: 1.6em;font-family: sans-serif; font-size: 14px; font-weight: normal; margin: 0; margin-bottom: 15px; ">Keep using Scam Shield <br> </p> </td> </tr> </table> </td> </tr> <!-- END MAIN CONTENT AREA --> </table> <!-- START FOOTER --> <!-- END FOOTER --> <!-- END CENTERED WHITE CONTAINER --> </div> </td> <td>&nbsp;</td> </tr> </table> </body></html>'
      };

      reports.doc(id).update({status: "REJECTED"}).then(() =>{
        transporter.sendMail(mailOptions, function(error, info){
            if (error) {
              console.log(error);
            } else {
              console.log('Email sent: ' + info.response);
              res.redirect('/success') 
            }
          });
        
    }); 
       
});

app.get("/success", (req, res) => {
    res.render('success');
});
app.get("/view-users", (req, res) => {
    users.get().then((querySnapshot) => {
        var id = querySnapshot.docs.map((doc) => ({data: doc.data(), id: doc.id}));
        const objectToArrayx = Object.entries(id)
        var datax = new Map(objectToArrayx)
        res.render('view-users', {result: datax});
    })  
});

app.get("/logout", (req, res) => {
    res.redirect("/")
});

app.use((req, res) => {
    res.status(404).render("404");
});




server.listen(process.env.PORT || 3030);