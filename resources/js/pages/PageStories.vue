<script setup>
import { ref } from "vue";
import { useFetchJson } from "@/composables/useFetchJson";
import { fetchJson } from "@/utils/fetchJson";

const { data, error, isLoading } = useFetchJson("stories");

const createStoryOpen = ref(false);
const newStoryTitle = ref("");
const newStoryDescription = ref("");

function onCreateClick() {
    const { request } = fetchJson({
        url: "stories",
        method: "POST",
        data: {
            title: newStoryTitle.value,
            description: newStoryDescription.value,
        },
    });

    request.then((res) => {
        console.log(res);
        window.location.hash = `#editStory-${res.id}`;
    });
}
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

        <button class="add-button" @click="createStoryOpen = true">
            Créer une nouvelle aventure
        </button>

        <div class="stories">
            <a href="#story-1" v-for="story in data" class="card">
                <div>{{ story.title }}</div>

                <img src="/storage/images/story_1_chapter_1.jpg" />

                <p>
                    {{ story.description }}
                </p>
            </a>
        </div>

        <div v-if="createStoryOpen" class="popup">
            <div class="popup-content">
                <div class="popup-title">
                    <h3>Créer une nouvelle aventure</h3>
                    <button
                        class="popup-close"
                        @click="createStoryOpen = false"
                    >
                        x
                    </button>
                </div>

                <label for="title">Titre</label>
                <input
                    type="text"
                    id="title"
                    name="title"
                    v-model="newStoryTitle"
                />

                <label for="description">Description</label>
                <textarea
                    id="description"
                    name="description"
                    v-model="newStoryDescription"
                ></textarea>

                <div class="popup-actions">
                    <button @click="createStoryOpen = false">Annuler</button>
                    <button @click="onCreateClick">Créer</button>
                </div>
            </div>
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

.popup {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: fixed;
    left: 0;
    top: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.4);
}

.popup-content {
    display: flex;
    flex-flow: column nowrap;
    gap: 12px;
    background-color: #fff;
    padding: 24px;
    border-radius: 12px;
    min-width: 600px;
}

.popup-title {
    display: flex;
    justify-content: space-between;
    gap: 24px;
    font-weight: bold;
}

.popup-close {
    line-height: 1rem;
    width: 24px;
    height: 24px;
    font-weight: bold;
    border: 1px solid #666;
    border-radius: 50%;
}

.popup-actions {
    display: flex;
    justify-content: end;
    gap: 12px;
    margin-top: 12px;
}

.popup-actions button {
    border: 1px solid #666;
    border-radius: 8px;
    padding: 6px 12px;
}

input,
textarea {
    border: 1px solid #666;
    border-radius: 8px;
    padding: 6px 12px;
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
