const { PDFParse } = require('pdf-parse');
const fs = require('fs');
const path = require('path');

async function main() {
  try {
    const outDir = path.join(__dirname, 'slides_img');
    if (!fs.existsSync(outDir)) {
      fs.mkdirSync(outDir, { recursive: true });
    }
    console.log('Reading PDF...');
    const buffer = fs.readFileSync('RateSmart Introduction.pdf');
    console.log('Loaded buffer. Initializing parser...');
    const parser = new PDFParse({ data: buffer });
    
    // Total pages is 24
    for (let i = 2; i <= 24; i++) {
      console.log(`Rendering page ${i}...`);
      const result = await parser.getScreenshot({ partial: [i], desiredWidth: 1200 });
      if (result.pages && result.pages[0]) {
        fs.writeFileSync(path.join(outDir, `page-${i}.png`), result.pages[0].data);
        console.log(`Saved page-${i}.png (${result.pages[0].data.length} bytes)`);
      }
    }
    await parser.destroy();
    console.log('All 24 pages extracted successfully!');
  } catch (err) {
    console.error('Error during extraction:', err);
  }
}

main();
