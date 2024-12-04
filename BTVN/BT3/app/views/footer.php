
<footer>
    <h3>
        <span class="char" style="--char-index: 0;">T</span>
        <span class="char" style="--char-index: 1;">L</span>
        <span class="char" style="--char-index: 2;">U</span>
        <span class="char" style="--char-index: 3;">'</span>
        <span class="char" style="--char-index: 4;">S</span>
        <span class="char" style="--char-index: 5;"> </span>
        <span class="char" style="--char-index: 6;">M</span>
        <span class="char" style="--char-index: 7;">U</span>
        <span class="char" style="--char-index: 8;">S</span>
        <span class="char" style="--char-index: 9;">I</span>
        <span class="char" style="--char-index: 10;">C</span>
        <span class="char" style="--char-index: 11;"> </span>
        <span class="char" style="--char-index: 12;">G</span>
        <span class="char" style="--char-index: 13;">A</span>
        <span class="char" style="--char-index: 14;">R</span>
        <span class="char" style="--char-index: 15;">D</span>
        <span class="char" style="--char-index: 16;">E</span>
        <span class="char" style="--char-index: 17;">N</span>
    </h3>
</footer>
<style>
    .line {
        height: 2px;
        background-color: black;
        margin: 50px 0 15px;
    }
    footer {
        position: absolute;
        width: 100%;
        bottom: 0;
        border-top: 3px solid black;
        text-align: center;
        color: black;
        font-size: 35px;
        font-weight: bold;
    }

    footer h3 .char {
        display: inline-block;
        --delay:calc((var(--char-index) + 1) * 200ms);
        animation: breathe 4000ms infinite both;
        animation-delay: var(--delay);
    }

    @keyframes breathe {
        0% {
            opacity: 0;
            transform: scale(0.9);
        }

        50% {
            opacity: 1;
            transform: scale(1);
        }

        100% {
            opacity: 0;
            transform: scale(0.9);
        }
    }
</style>
</body>
</html>