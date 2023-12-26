<template>
    <div
        class="w-full border-b-2 bg-stone-200 shadow-lg border-stone-300 mb-10 px-10 lg:px-20 py-10 flex justify-between items-center"
    >
        <div class="w-full lg:w-1/2">
            <h1 class="text-3xl text-stone-500 font-bold mb-1">SARL LOCAPP</h1>
            <h2 class="text-xl font-semibold mb-5">
                Plomberie, Outillage & Quincaillerie Générale, Hydraulique,
                Equipements HSE & Des Réseaux Anti-incendie
            </h2>
            <p>
                SARL LOCAPP , Nous sommes une entreprise spécialisée en Commerce
                de gros (commerce interentreprises) ,Telle que nos Produits et
                Service à offrir comme Suits : Plomberie / Outillage &
                Quincaillerie Générale / hydraulique / Equipements HSE & des
                réseaux anti-incendie. <br />
                Nous sommes basés à CITE Mokrani 02 - lot 261 - Hassi Messaoud ,
                et nous avons d’autres stocks à Touggourt , et Alger. <br />
                Nous sommes ravis de vous présenter notre entreprise et d'en
                apprendre plus sur votre activité. Nous pensons que nos produits
                et services peuvent vous aider à répondre à vos besoins.
            </p>
            <div
                class="w-full flex justify-around items-center gap-5 md:gap-0 mt-10"
            >
                <a class="btn-link" href="#products">Check Our Products</a>
                <a class="btn-link" href="#contact">Contact Us</a>
            </div>
        </div>
        <div class="w-1/2 hidden lg:block">
            <img src="/images/delivery.png" alt="" />
        </div>
    </div>
    <Products />
</template>

<script setup>
import Products from "./products/Products.vue";
</script>

<style scoped>
.btn-link {
    @apply px-5 py-2 border border-stone-400 rounded-lg w-1/2 md:w-1/3 text-center font-semibold bg-stone-300 text-sm md:text-lg hover:bg-stone-400 hover:text-stone-200;
}
</style>
