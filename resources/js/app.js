import './bootstrap';
import { createApp } from 'vue';
import Calcule from "./components/Calcule.vue";
const app = createApp({
    components: {
        Calcule,
    }
})

app.mount("#app");