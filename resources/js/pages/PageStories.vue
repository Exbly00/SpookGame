<script setup>
import { useFetchJson } from "@/composables/useFetchJson";
import { fetchJson } from "@/utils/fetchJson";
import { ref } from "vue";

//Chargement des données
const { data, error, loading } = useFetchJson("stories");

//Gestion de l'utilisateur connecté
const authUserRef = ref(authUser);
const csrfToken = ref(
    document.head.querySelector('meta[name="csrf-token"]').content
);

//Fonction qui permet d'afficher ou masquer une histoire
async function updateStory(story) {
    const { request } = fetchJson({
        url: `stories/${story.id}`,
        method: "PUT",
        data: {
            title: story.title,
            description: story.description,
            is_visible: !story.is_visible,
        },
    });
    await request;

    //Rafraichissement des données
    const { request: storiesRequest } = fetchJson("stories");
    await storiesRequest.then((res) => {
        data.value = res;
    });
}
</script>

<template>
    <!-- Menu de connexion et déconnexion -->
    <div class="page">
        <div class="login-menu">
            <slot v-if="authUserRef === null">
                <a href="/login">Se connecter</a>
                <a href="/register">Créer un compte</a>
            </slot>
            <form v-else action="/logout" method="POST">
                <input type="hidden" name="_token" :value="csrfToken" />
                <button type="submit">Se déconnecter</button>
            </form>
        </div>
        <!-- Texte de la page d'accueil -->
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

        <!-- Affichage des histoires -->
        <div class="stories">
            <a
                :href="`#story-${story.id}`"
                v-for="story in data"
                class="card"
                :class="{ 'card-invisible': !story.is_visible }"
            >
                <div>{{ story.title }}</div>

                <img :src="`/storage/images/${story.first_chapter.image}`" />

                <p>
                    {{ story.description }}
                </p>

                <button
                    class="button"
                    @click.prevent="updateStory(story)"
                    v-if="authUserRef !== null"
                >
                    {{ story.is_visible ? "Masquer" : "Afficher" }}
                </button>
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

.login-menu {
    position: fixed;
    right: 20px;
    display: flex;
    gap: 12px;
    color: #fff;
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

.button {
    color: #fff;
    background-color: #000;
    padding: 12px 24px;
    border-radius: 12px;
    text-decoration: none;
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
    display: flex;
    flex-flow: column nowrap;
    background-color: #fff;
    padding: 20px;
    border-radius: 12px;
    max-width: 400px;
}

.card-invisible {
    background-color: #ccc;
}

.card div {
    text-align: center;
    font-family: "Metal Mania";
    font-size: 24px;
}

.card p {
    margin-bottom: 18px;
}

.card button {
    align-self: flex-end;
}

.card img {
    width: 100%;
    border-radius: 12px;
    margin: 12px 0;
}
</style>
