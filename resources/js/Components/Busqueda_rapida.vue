<template>
    <div class="seccion-filtros">
        <div class="filtros">
            <input
                class="buscador_general"
                id="busquedaInput"
                type="text"
                placeholder="Busqueda rapida"
            />
            <img
                class="icons posicion"
                src="img/svg/search.svg"
                alt=""
                srcset=""
            />
        </div>
    </div>
</template>
<script>
export default {};
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
    border: 2px solid #c9c9c9;
    padding: 0px 5px 0px 25px;
    -ms-border-radius: 10px;
    -o-border-radius: 10px;
}

.buscador_general::placeholder {
    color: #c9c9c9;
    font-size: 13px;
    padding: 30px;
}

.posicion {
    position: absolute;
    margin: 0px 0px 0px 15px;
    width: 13px;
}
</style>
