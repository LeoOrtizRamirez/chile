<template>
    <div class="seccion-filtros">
        <div class="filtros">
            <input
                @input="onInput"
                class="buscador_general"
                id="busquedaInput"
                type="text"
                placeholder="Búsqueda rápida"
                v-model="searchText"
            />
            <span class="material-symbols-outlined posicion-color">
                search
            </span>
        </div>
    </div>
</template>

<script>
export default {
    name: "BusquedaRapida",
    data() {
        return {
            searchtext: "",
        };
    },

    methods: {
        onInput(event) {
            // debugger
            console.log(event);
            this.$emit("onInput", event.target.value);
        },
    },
};
</script>

<style lang="scss" scoped>
.seccion-filtros {
    position: relative;
}

.filtros {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    align-items: center;
}

.buscador_general {
    margin: 15px 25px 15px 5px;
    -moz-border-radius: 10px;
    -webkit-border-radius: 10px;
    border-radius: 10px;
    border: 2px solid #e6e6e6;
    padding: 0px 5px 0px 40px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
}

.buscador_general::placeholder {
    color: #e6e6e6;
    font-size: 13px;
    padding: 30px;
}

.posicion-color {
    position: absolute;
    margin: 0px 0px 0px 15px;
    width: 13px;
    color: #e6e6e6;
}
</style>
