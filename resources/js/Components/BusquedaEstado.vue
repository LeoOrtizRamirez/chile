<template>
    <select class="buscador_estado">
        <option value="">todos</option>
        <option value="">Vistos Recientemente</option>
        <option value="">No Leidos</option>
    </select>
</template>

<script>
export default {
    // name: BusquedaEstado,
};
</script>

<style lang="scss" scoped>
.buscador_estado {
    margin: 0px 10px 0px 250px;
    border-radius: 10px;
    border: 2px solid #c9c9c9;
    padding: 0px 5px 0px 20px;
    -ms-border-radius: 10px;
    width: 185px;
    -o-border-radius: 10px;
    color: #c9c9c9;
    font-size: 13px;
}
</style>
