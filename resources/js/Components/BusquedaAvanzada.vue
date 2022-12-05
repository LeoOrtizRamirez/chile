<template>
    <div class="">
        <button class="buscador_avanzado mb-3">
            <span class="material-symbols-outlined"> list </span>
            <span class="color-texto">Búsqueda avanzada</span>
        </button>
    </div>
</template>

<script>
export default {};
</script>

<style lang="scss" scoped>
.buscador_avanzado {
    display: flex;
    flex-direction: row;
    align-items: center;
    margin-top: 15px;
    padding: 0px 15px;
}

.material-symbols-outlined {
    margin: 15px 10px;
    color: rgb(58, 182, 0);
}

.color-texto {
    color: rgb(58, 182, 0);
    font-size: 13px;
}
</style>
