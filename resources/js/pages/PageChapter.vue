<script></script>

<template>
    <img src="/storage/images/story_1_chapter_1.jpg" class="bg-image" />

    <div class="menu">
        <p class="text">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Hic
            blanditiis delectus laborum, saepe accusantium dolorum
            necessitatibus quae ut dolor voluptas.
        </p>

        <ol class="choices">
            <li>
                <a href="" class="choice">Lorem ipsum dolor</a>
            </li>
            <li>
                <a href="" class="choice">Lorem ipsum dolor</a>
            </li>
            <li>
                <a href="" class="choice">Lorem ipsum dolor</a>
            </li>
            <li>
                <a href="" class="choice">Lorem ipsum dolor</a>
            </li>
        </ol>
    </div>
</template>

<style scoped>
.bg-image {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100vh;
    object-fit: cover;
    z-index: -1;
}

.menu {
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 24px;
    padding: 32px;
    position: fixed;
    bottom: 0;
    width: 100%;
}

.text {
    background-color: #fff;
    padding: 24px;
    border-radius: 12px;
    max-width: 1200px;
}

.choices {
    display: flex;
    flex-direction: row;
    gap: 36px;
    margin: 0;
}

.choices > li {
    display: flex;
}

.choice {
    background-color: #fff;
    padding: 24px;
    border-radius: 12px;
    text-decoration: none;
    color: inherit;
    transition: transform 0.15s ease-in-out;
}

.choice:hover {
    transform: scale(1.1);
}
</style>
