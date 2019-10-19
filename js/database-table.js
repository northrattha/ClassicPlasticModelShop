// var express = require('express') // เรียกใช้ Express

// import mysql
const mysql = require('mysql');

// create Connection
const db = mysql.createConnection({ //createPool
    host: 'localhost',
    user: 'root',
    password: '261342',
    database: 'classicmodels'
});

// Connect db
db.connect(function (err) {
    if (err) throw err;
    console.log("Connected!");
});

// const app = express() // สร้าง Object เก็บไว้ในตัวแปร app เพื่อนำไปใช้งาน
// // Select Data
// app.get('/users', (req, res) => {   // Router เวลาเรียกใช้งาน
//     var sql = 'SELECT * FROM products'  // คำสั่ง sql
//     var query = db.query(sql, (err, results) => { // สั่ง Query คำสั่ง sql
//         if (err) throw err  // ดัก error
//         console.log(results) // แสดงผล บน Console 
//         res.json(results)   // สร้างผลลัพธ์เป็น JSON ส่งออกไปบน Browser
//     })
// })

// app.listen('3000', () => {
//     console.log('start port 3000')
// })

// var query = [
//     {
//         "productName": "1969 Harley Davidson Ultimate Chopper",
//         "productScale": "1:10",
//         "productVendor": "Min Lin Diecast",
//         "productDescription": "This replica features working kickstand, front suspension, gear-shift lever, footbrake lever, drive chain, wheels and steering. All parts are particularly delicate due to their precise scale and require special care and attention.",
//         "buyPrice": 48.81,
//         "quantityInStock": 7933
//     },
//     {
//         "productName": "88 Harley Davidson Ultimate Chopper",
//         "productScale": "1",
//         "productVendor": "M",
//         "productDescription": "d, frer, footbrake lever, drive chain, wheels and steering. All parts are particularly delicate due to their precise scale and require special care and attention.",
//         "buyPrice": 48,
//         "quantityInStock": 9
//     }
// ];

var sql = 'SELECT productName, productScale, productVendor, productDescription, buyPrice, quantityInStock FROM products'  // คำสั่ง sql
var query = db.query(sql, function (err, results) {
    if (err) throw err;
    console.log(result);
});

var loopTag = $(".list-data").clone(true); // clone แถวที่ทำการลูปไว้ในตัวแปร
var newTag = ""; // สร้างตัวแปรไว้เก็บ html tags ที่สร้างมาใหม่  
$.each(query, function (i, k) { // วนลูปข้อมูล array ของ object
    var objHTML = loopTag; // ใช้ตัวแปร object ที่ clone มา
    objHTML
        .find("td:eq(0)").html(query[i].productName).end()
        .find("td:eq(1)").html(query[i].productScale).end()
        .find("td:eq(2)").html(query[i].productVendor).end()
        .find("td:eq(3)").html(query[i].productDescription).end()
        .find("td:eq(4)").html(query[i].buyPrice).end()
        .find("td:eq(5)").html(query[i].quantityInStock).end();
    newTag += $(objHTML)[0].outerHTML; // สร้าง tags ข้อมูลใหม่แต่ละแถว
});
$(".list-data").replaceWith(newTag); // แทนที่แถวที่จะทำการลูปด้วยข้อมูลใหม่