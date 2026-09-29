const { PDFParse } = require('pdf-parse');
const fs = require('fs');

async function main() {
  try {
    console.log('Reading PDF file...');
    const buffer = fs.readFileSync('RateSmart Introduction.pdf');
    console.log('Loaded buffer, size:', buffer.length);
    const parser = new PDFParse({ data: buffer });
    console.log('Parsing text...');
    const result = await parser.getText();
    console.log('Done parsing!');
    fs.writeFileSync('extracted_text.txt', result.text || '', 'utf8');
    console.log('Extracted text saved to extracted_text.txt. Length:', (result.text || '').length);
    
    // Also try getInfo
    const info = await parser.getInfo({ parsePageInfo: true });
    fs.writeFileSync('extracted_info.json', JSON.stringify(info, null, 2), 'utf8');
    console.log('Document info saved. Total pages:', info.total);

    await parser.destroy();
  } catch (err) {
    console.error('Extraction error:', err);
  }
}

main();
