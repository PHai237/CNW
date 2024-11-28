<div class="footer">
    <div class="line"></div>
    <footer>
        <p>FLOWER'S SHOP</p>
    </footer>
</div>

<style>
    /* Chiều cao 100% */
    html, body {
        height: 100%;
        margin: 0;
        background-color: #1e1e1e; /* Màu nền RPG */
        font-family: "Times New Roman", serif;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .footer {
        margin-top: auto;
        width: 100%;
        background: #2e1a0f;
        color: #f9d293;
        text-align: center;
        font-size: 40px;
        padding: 15px 0;
        border-top: 3px solid #7a5230;
    }

    .line {
        height: 3px;
        background: linear-gradient(90deg, #4b2e16, #7a5230);
        margin: 20px auto 10px;
        width: 80%;
        border-radius: 2px;
    }

    footer p {
        margin: 0;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
    }
</style>
