<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>

    @vite('resources/css/app.css')
</head>

<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
    }

    .contact-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        padding: 20px;
        gap: 0px; /* Změna na odstranění mezer mezi bloky */
        max-width: 1000px;
        margin: 0 auto;
    }

    .contact-info {
        grid-column: 1 / 3;
        display: flex;
        justify-content: space-around;
        background-color: #005d5d;
        padding: 20px;
        border-radius: 10px 10px 0 0; /* Zakulacení horních rohů pro spojení s formulářem */
    }

    .info-box {
        background-color: #fff;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        flex-basis: 22%;
    }

    .info-box p {
        margin-top: 10px;
        color: #333;
    }

    .info-box img {
        width: 40px;
        height: 40px;
    }

    .contact-form {
        grid-column: 1 / 3;
        background-color: #fff;
        padding: 30px;
        border-radius: 0 0 10px 10px; /* Zakulacení dolních rohů */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: -5px; /* Posun formuláře nahoru, aby se spojil s contact-info */
    }

    .contact-form h2 {
        color: #005d5d;
        margin-bottom: 10px;
    }

    .contact-form p {
        margin-bottom: 20px;
        color: #666;
    }

    .input-group {
        margin-bottom: 15px;
    }

    .input-group label {
        display: block;
        margin-bottom: 5px;
        color: #005d5d;
    }

    .input-group input, .input-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .input-group textarea {
        resize: none;
        height: 100px;
    }

    button {
    background-color: #005d5d;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    cursor: pointer;
    width: 100%;
}

button:hover {
    background-color: #004747;
}

    .icon img {
        width: 40px;
        height: 40px;
    }
</style>

<body>
    <x-header />
    <div class="contact-container">
        <div class="contact-info">
            <div class="info-box">
                <div class="icon">
                    <img src="location-icon.png" alt="Location icon">
                </div>
                <p><strong>OUR MAIN OFFICE</strong><br>Nobrain 99 Brodway St<br>New York, NY 1001</p>
            </div>
            <div class="info-box">
                <div class="icon">
                    <img src="phone-icon.png" alt="Phone icon">
                </div>
                <p><strong>PHONE NUMBER</strong><br>237-9876-4500<br>987-0576-4674 (Troll Free)</p>
            </div>
            <div class="info-box">
                <div class="icon">
                    <img src="fax-icon.png" alt="Fax icon">
                </div>
                <p><strong>FAX</strong><br>1-234-545-8799</p>
            </div>
            <div class="info-box">
                <div class="icon">
                    <img src="email-icon.png" alt="Email icon">
                </div>
                <p><strong>EMAIL</strong><br>jsemhladovy@gmail.com</p>
            </div>
        </div>

        <div class="contact-form">
            <h2>Get in touch</h2>
            <p>We believe sustainability is very important.</p>
            <form>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="Enter a valid email address" required>
                </div>
                <div class="input-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" placeholder="Enter your Name" required>
                </div>
                <div class="input-group">
                    <label for="message">Message</label>
                    <textarea id="message" placeholder="Enter your message.." required></textarea>
                </div>
                <button type="submit">SUBMIT</button>
            </form>
        </div>
    </div>
</body>
</html>