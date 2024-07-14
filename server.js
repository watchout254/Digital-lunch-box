const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');

const app = express();
const port = 5000;

app.use(bodyParser.json());
app.use(cors());

app.post('/api/orders', (req, res) => {
    const orderData = req.body;
    console.log(orderData);

    // Here you would typically save the orderData to your database
    // For simplicity, we'll just respond with a success message
    res.json({ message: 'Order received successfully' });
});

app.listen(port, () => {
    console.log(`Server running on http://localhost:${port}`);
});
