<template>
    <div
        class="w-full border-b-2 bg-stone-200 shadow-lg border-stone-300 mb-10 px-20 py-10 flex justify-between items-center"
    >
        <div class="w-1/2">
            <h1 class="text-3xl text-stone-500 font-bold mb-1">
                EURL ADVANCED & WISE BUSINESS
            </h1>
            <h2 class="text-xl font-semibold mb-5">
                Kitchen equipment, Furniture & Home Appliance -Electronics and
                Gifts
            </h2>
            <p>
                EURL ADVANCED & WISE BUSINESS : Nous distribuons plus de 5 000
                produits et leurs accessoires au départ de nos sites d’alger ,
                Hassi messaoud (algerie ) . Nous proposons à la fois une vaste
                gamme produit 100 % algerien et une sélection élaborée. Tout
                ceci crée une relation de confiance avec les marques qui nous
                distributes, renommées algeriennes, françaises, italiennes et
                asiatiques . Nous restons en liaison étroite avec celles-ci et
                jouissons du statut de partenaire officiel. EURL AWB vous
                propose une large gamme de matériel frigorifique professionnel
                pour la cuisine, les restaurants et les bases de vie , Ainsi de
                l’Electroménager - CLIMATISATIONS …, Plus la gamme des Cadeaux
                d’Entreprises : comme les Smartphones, smart Montres,
                Electroniques , cadeaux Ramadan , cadeayx pour les festivités
                sport et loisirs …, Plus et plus , une Large gamme de matériel
                Informatique , et Mobilier de bureau , inclus les meubles pour
                les bases de vie , Espace VIP…,
            </p>
            <div class="w-full flex justify-around items-center mt-10">
                <a class="btn-link" href="#products">Check Our Products</a>
                <a class="btn-link" href="#contact">Contact Us</a>
            </div>
        </div>
        <div class="w-1/2">
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
    @apply px-5 py-2 border border-stone-400 rounded-lg w-1/3 text-center font-semibold bg-stone-300 text-lg hover:bg-stone-400 hover:text-stone-200;
}
</style>
