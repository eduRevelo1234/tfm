const http = require('http');
const httpProxy = require('http-proxy');

// Crear un nuevo servidor proxy
const proxy = httpProxy.createProxyServer({});

// Crear el servidor que escuche en la IP de tu computadora de Windows
const server = http.createServer(function(req, res) {
  // Redirigir todas las solicitudes a la IP de WSL (192.168.47.220:8000)
  proxy.web(req, res, { target: 'http://192.168.47.220:8000' });
});

// Escuchar en el puerto 8000 de tu IP de Windows
console.log('Proxy server listening on 192.168.3.251:8000');
server.listen(8000, '192.168.1.145');
