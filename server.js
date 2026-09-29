const http = require('http');
const fs = require('fs');
const path = require('path');
const url = require('url');

const PORT = 3000;
const ROOT_DIR = __dirname;

const MIME_TYPES = {
  '.html': 'text/html; charset=utf-8',
  '.css': 'text/css; charset=utf-8',
  '.js': 'text/javascript; charset=utf-8',
  '.json': 'application/json; charset=utf-8',
  '.png': 'image/png',
  '.jpg': 'image/jpeg',
  '.jpeg': 'image/jpeg',
  '.svg': 'image/svg+xml',
  '.ico': 'image/x-icon',
  '.pdf': 'application/pdf',
};

const server = http.createServer((req, res) => {
  const parsedUrl = url.parse(req.url, true);
  let pathname = decodeURIComponent(parsedUrl.pathname);

  // Enable CORS
  res.setHeader('Access-Control-Allow-Origin', '*');
  res.setHeader('Access-Control-Allow-Methods', 'GET, POST, OPTIONS');
  res.setHeader('Access-Control-Allow-Headers', 'Content-Type, X-CSRF-TOKEN');

  if (req.method === 'OPTIONS') {
    res.writeHead(200);
    res.end();
    return;
  }

  // API endpoint: /api/avm/calculate
  if (pathname === '/api/avm/calculate' && req.method === 'POST') {
    let body = '';
    req.on('data', chunk => { body += chunk; });
    req.on('end', () => {
      try {
        const data = body ? JSON.parse(body) : {};
        const area = parseFloat(data.area_m2) || 96;
        const shape = data.shape || 'rectangle';
        
        let shapeMultiplier = 1.0;
        if (shape === 'wide_back') shapeMultiplier = 1.05;
        if (shape === 'narrow_back') shapeMultiplier = 0.92;

        const baseUnitPrice = 101584000;
        const unitPrice = Math.round(baseUnitPrice * shapeMultiplier);
        const totalValue = unitPrice * area;

        res.writeHead(200, { 'Content-Type': 'application/json; charset=utf-8' });
        res.end(JSON.stringify({
          success: true,
          address: data.address || 'Số 631 QL21B, Bích Hoà, Thanh Oai, Hà Nội',
          area_m2: area,
          estimated_unit_price: unitPrice,
          estimated_unit_price_formatted: unitPrice.toLocaleString('vi-VN') + ' đ/m²',
          total_estimated_value: totalValue,
          total_estimated_value_formatted: totalValue.toLocaleString('vi-VN') + ' VNĐ',
          confidence_score: '94.8%',
          officer: 'Vũ Văn Quân - CEO RateSmart & TGĐ Thẩm định giá Hoa Sen'
        }));
      } catch (err) {
        res.writeHead(400, { 'Content-Type': 'application/json' });
        res.end(JSON.stringify({ success: false, error: err.message }));
      }
    });
    return;
  }

  // API endpoint: /api/contact
  if (pathname === '/api/contact' && req.method === 'POST') {
    let body = '';
    req.on('data', chunk => { body += chunk; });
    req.on('end', () => {
      res.writeHead(200, { 'Content-Type': 'application/json; charset=utf-8' });
      res.end(JSON.stringify({
        success: true,
        message: 'Cảm ơn Quý khách! Đội ngũ RateSmart & Lotus VFI đã tiếp nhận yêu cầu.'
      }));
    });
    return;
  }

  // Routing
  if (pathname === '/' || pathname === '/index.html') {
    pathname = '/prototype/index.html';
  } else if (pathname === '/presentation' || pathname === '/slide' || pathname === '/slides') {
    pathname = '/presentation/presentation.html';
  }

  const filePath = path.join(ROOT_DIR, pathname);

  // Prevent directory traversal
  if (!filePath.startsWith(ROOT_DIR)) {
    res.writeHead(403, { 'Content-Type': 'text/plain' });
    res.end('403 Forbidden');
    return;
  }

  fs.stat(filePath, (err, stats) => {
    if (err || !stats.isFile()) {
      res.writeHead(404, { 'Content-Type': 'text/html; charset=utf-8' });
      res.end('<h1>404 Not Found</h1><p><a href="/">Quay về trang chủ RateSmart</a></p>');
      return;
    }

    const ext = path.extname(filePath).toLowerCase();
    const contentType = MIME_TYPES[ext] || 'application/octet-stream';

    res.writeHead(200, { 'Content-Type': contentType });
    const stream = fs.createReadStream(filePath);
    stream.pipe(res);
  });
});

server.listen(PORT, '0.0.0.0', () => {
  console.log(`\n======================================================`);
  console.log(`🚀 RATESMART LOCAL SERVER ĐANG CHẠY TẠI:`);
  console.log(`👉 http://localhost:${PORT}`);
  console.log(`👉 Bộ Slide Thuyết Trình: http://localhost:${PORT}/presentation`);
  console.log(`======================================================\n`);
});
