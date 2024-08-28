//incluir dependencia
const mysql = require('mysql2');

//criar a conexao com bd mysql

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'store'
})

connection.connect(function(err) {
    console.log("Conexão com o bando de dados realizada com sucesso")
})

connection.query("SELECT * FROM clientes", function(err, rows, fields) {
    if(!err){
        console.log('Resultado: ', rows)
    }else{
        console.log('Erro: consulta não realizada com sucesso')
    }
})