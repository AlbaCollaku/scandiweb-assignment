function handleProductTypeChange() {
    const type = document.getElementById('productType').value;
    const typeAttributes = document.getElementById('typeAttributes');
    
    typeAttributes.innerHTML = '';
    
    if (type === 'DVD') {
        typeAttributes.innerHTML = `
            <div>
                <label for="size">Size (MB):</label>
                <input type="number" id="size" name="size" required>
            </div>
        `;
    } else if (type === 'Book') {
        typeAttributes.innerHTML = `
            <div>
                <label for="weight">Weight (Kg):</label>
                <input type="number" id="weight" name="weight" required>
            </div>
        `;
    } else if (type === 'Furniture') {
        typeAttributes.innerHTML = `
            <div>
                <label for="height">Height (cm):</label>
                <input type="number" id="height" name="height" required>
            </div>
            <div>
                <label for="width">Width (cm):</label>
                <input type="number" id="width" name="width" required>
            </div>
            <div>
                <label for="length">Length (cm):</label>
                <input type="number" id="length" name="length" required>
            </div>
        `;
    }
}
