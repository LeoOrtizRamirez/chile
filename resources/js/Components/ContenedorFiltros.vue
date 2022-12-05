<template>
    <div class="contenedor-filtros">
        <BusquedaRapida @onInput="onInput"></BusquedaRapida>
        <BusquedaAvanzada></BusquedaAvanzada>
        <BusquedaEstado></BusquedaEstado>
    </div>
</template>

<script>
import BusquedaRapida from "@/components/BusquedaRapida.vue";
import BusquedaAvanzada from "@/components/BusquedaAvanzada.vue";
import BusquedaEstado from "@/components/BusquedaEstado.vue";
export default {
    components: {
        BusquedaRapida,
        BusquedaAvanzada,
        BusquedaEstado,
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
