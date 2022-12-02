<template>
    <div class="contenedor-filtros">
        <BusquedaRapida @onInput="onInput"></BusquedaRapida>
        <BusquedaAvanzada></BusquedaAvanzada>
    </div>
</template>

<script>
import BusquedaRapida from "@/components/BusquedaRapida.vue";
import BusquedaAvanzada from "@/components/BusquedaAvanzada.vue";
export default {
    components: {
        BusquedaRapida,
        BusquedaAvanzada,
    },
    methods: {
        onInput(value) {
            // debugger
            console.log();
            this.$emit("onInput", value);
        },
    },
};
</script>

<style lang="scss" scoped>
.contenedor-filtros {
    display: flex;
    flex-direction: row;
    align-items: center;
}
</style>
