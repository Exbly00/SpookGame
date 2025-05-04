<script setup>
import { useFetchJson } from "@/composables/useFetchJson";

const { data, error, loading } = useFetchJson("stories");
</script>

<template>
    <div class="page">
        <h1 class="title">SpookGame</h1>

        <h2 class="subtitle">Bienvenue dans les Profondeurs de l'Horreur</h2>

        <p class="paragraph">
            Prêt(e) à vivre une expérience interactive où chaque décision peut
            sceller ton destin ? 👻
        </p>

        <p class="paragraph">
            Ici, tu trouveras plusieurs histoires terrifiantes, chacune plus
            sombre que la précédente. À chaque étape, quatre choix s'offriront à
            toi… mais attention : toutes les routes ne mènent pas à une fin
            heureuse. Réfléchis vite, choisis bien. 🪦
        </p>

        <p class="paragraph">
            Un compte à rebours t'accompagnera tout au long de ton aventure pour
            mesurer ton sang-froid et ta rapidité. Combien de temps te
            faudra-t-il pour sortir vivant(e) ? Si tant est que ce soit
            possible… 🎃
        </p>

        <p class="paragraph">Choisis ton histoire…</p>

        <p class="paragraph">Et que le cauchemar commence. 💀</p>

        <div class="stories">
            <a href="#story-1" v-for="story in data" class="card">
                <div>{{ story.title }}</div>

                <img src="/storage/images/story_1_chapter_1.jpg" />

                <p>
                    {{ story.description }}
                </p>
            </a>
        </div>
    </div>
</template>

<style scoped>
.page {
    display: flex;
    flex-flow: column nowrap;
    align-items: center;
    background-image: url(/images/home.jpeg);
    background-position: center top;
    background-size: cover;
    min-height: 100vh;
    padding: 20px;
}

.title {
    font-family: "Metal Mania";
    color: #fff;
    font-size: 80px;
}

.subtitle {
    font-weight: bold;
    color: #fff;
    font-size: 22px;
    margin-bottom: 20px;
}

.paragraph {
    text-align: center;
    color: #fff;
    width: 100%;
    max-width: 800px;
    margin: 8px 0;
}

.add-button {
    background-color: #fff;
    padding: 12px 24px;
    border-radius: 12px;
    text-decoration: none;
    color: inherit;
    transition: transform 0.15s ease-in-out;
}

.add-button:hover {
    transform: scale(1.1);
}

.stories {
    display: flex;
    flex-flow: row wrap;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
}

.card {
    background-color: #fff;
    padding: 20px;
    border-radius: 12px;
    max-width: 400px;
}

.card div {
    text-align: center;
    font-family: "Metal Mania";
    font-size: 24px;
}

.card img {
    width: 100%;
    border-radius: 12px;
    margin: 12px 0;
}
</style>
