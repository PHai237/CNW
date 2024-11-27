<div class="footer">
    <div class="line"></div>
    <footer>
        <p>TLU's Music Garden</p>
    </footer>
</div>

<style>
    html, body {
        height: 100%;
        margin: 0;
        background-color: #1e1e1e;
        font-family: "Georgia", serif;
    }

    body {
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    .footer {
        margin-top: auto;
        width: 100%;
    }

    .line {
        height: 4px;
        background: linear-gradient(90deg, #4b2e16, #7a5230);
        margin: 30px auto 20px;
        width: 75%;
        border-radius: 3px;
    }

    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        background: linear-gradient(135deg, #4b2e16, #2e1a0f);
        color: #f9d293;
        font-size: 28px;
        font-weight: bold;
        text-align: center;
        padding: 15px 0;
        box-shadow: 0 -3px 8px rgba(0, 0, 0, 0.6);
        border-top: 3px solid #7a5230;
    }

    footer p {
        text-transform: uppercase;
        letter-spacing: 2px;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8);
        margin: 0;
    }
</style>
</body>
</html>